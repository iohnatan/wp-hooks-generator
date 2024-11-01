#!/usr/bin/env php
<?php
declare(strict_types=1);

namespace WPHooks\Generator;

use DOMDocument;
use phpDocumentor\Reflection\DocBlockFactory;
use PhpParser\Node;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\FindingVisitor;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;

require_once file_exists( 'vendor/autoload.php' ) ? 'vendor/autoload.php' : dirname( __DIR__, 4 ) . '/vendor/autoload.php';

$options = getopt( '', [
	"input:",
	"output:",
	"ignore-files::",
	"ignore-hooks::",
] );

if ( empty( $options['input' ] ) || empty( $options['output'] ) ) {
	printf(
		"Usage: %s --input=src --output=hooks [--ignore-files=ignore/this,ignore/that] [--ignore-hooks=this_hook,that_hook] \n",
		$argv[0]
	);
	exit( 1 );
}

// Read ignore-files from cli args:
if ( ! empty( $options['ignore-files'] ) ) {
	$options['ignore-files'] = explode( ',', $options['ignore-files'] );
}

// Read ignore-hooks from cli args:
if ( ! empty( $options['ignore-hooks'] ) ) {
	$options['ignore-hooks'] = explode( ',', $options['ignore-hooks'] );
}

$config = ( file_exists( 'composer.json' ) ? json_decode( file_get_contents( 'composer.json' ) ) : false );

if ( ! empty( $config ) && ! empty( $config->extra ) && ! empty( $config->extra->{"wp-hooks"} ) ) {
	// Read ignore-files from Composer config:
	if ( empty( $options['ignore-files'] ) && ! empty( $config->extra->{"wp-hooks"}->{"ignore-files"} ) ) {
		$options['ignore-files'] = array_values( $config->extra->{"wp-hooks"}->{"ignore-files"} );
	}

	// Read ignore-hooks from Composer config:
	if ( empty( $options['ignore-hooks'] ) && ! empty( $config->extra->{"wp-hooks"}->{"ignore-hooks"} ) ) {
		$options['ignore-hooks'] = array_values( $config->extra->{"wp-hooks"}->{"ignore-hooks"} );
	}
}

if ( empty( $options['ignore-files'] ) ) {
	$options['ignore-files'] = [];
}

if ( empty( $options['ignore-hooks'] ) ) {
	$options['ignore-hooks'] = [];
}

$source_dir = $options['input'];
$target_dir = $options['output'];
$ignore_files = $options['ignore-files'];
$ignore_hooks = $options['ignore-hooks'];

if ( ! file_exists( $source_dir ) ) {
	printf(
		'The source directory "%s" does not exist.' . "\n",
		$source_dir
	);
	exit( 1 );
}

if ( ! file_exists( $target_dir ) ) {
	printf(
		'The target directory "%s" does not exist. Please create it first.' . "\n",
		$target_dir
	);
	exit( 1 );
}

echo "Scanning for files...\n";

/**
 * @param string $directory
 *
 * @return array|\WP_Error
 */
function get_wp_files( $directory ) {
	$iterableFiles = new \RecursiveIteratorIterator(
		new \RecursiveDirectoryIterator( $directory )
	);
	$files = array();

	foreach ( $iterableFiles as $file ) {
		if ( 'php' !== $file->getExtension() ) {
			continue;
		}

		$files[] = $file->getPathname();
	}

	return $files;
}

/** @var array<int,string> */
$files = get_wp_files( $source_dir );
$files = array_values( array_filter( $files, function( string $file ) use ( $ignore_files ) : bool {
	foreach ( $ignore_files as $i ) {
		if ( false !== strpos( $file, $i ) ) {
			return false;
		}
	}

	return true;
} ) );

printf(
	"Found %d files. Parsing hooks...\n",
	count( $files )
);

/**
 * Fixes newline handling in parsed text.
 *
 * DocBlock lines, particularly for descriptions, generally adhere to a given character width. For sentences and
 * paragraphs that exceed that width, what is intended as a manual soft wrap (via line break) is used to ensure
 * on-screen/in-file legibility of that text. These line breaks are retained by phpDocumentor. However, consumers
 * of this parsed data may believe the line breaks to be intentional and may display the text as such.
 *
 * This function fixes text by merging consecutive lines of text into a single line. A special exception is made
 * for text appearing in `<code>` and `<pre>` tags, as newlines appearing in those tags are always intentional.
 *
 * @param string $text
 *
 * @return string
 */
function fix_newlines( $text ) {
	// Non-naturally occurring string to use as temporary replacement.
	$replacement_string = '{{{{{}}}}}';

	// Replace newline characters within 'code' and 'pre' tags with replacement string.
	$text = preg_replace_callback(
		"/(?<=<pre><code>)(.+)(?=<\/code><\/pre>)/s",
		function ( $matches ) use ( $replacement_string ) {
			return preg_replace( '/[\n\r]/', $replacement_string, $matches[1] );
		},
		$text
	);

	// Merge consecutive non-blank lines together by replacing the newlines with a space.
	$text = preg_replace(
		"/[\n\r](?!\s*[\n\r])/m",
		' ',
		$text
	);

	// Restore newline characters into code blocks.
	$text = str_replace( $replacement_string, "\n", $text );

	return $text;
}

/**
 * @param array<int,string> $files
 * @param string            $root
 * @param array<int,string> $ignore_hooks
 * @return array
 */
function hooks_parse_files( array $files, string $root, array $ignore_hooks ) : array {
	$output = array();

	// Create a new parser instance
	$parser = ( new ParserFactory() )->createForNewestSupportedVersion();

	$tag_types = [];

	$funcs = [
		'do_action',
		'apply_filters',
		'do_action_ref_array',
		'apply_filters_ref_array',
	];

	foreach ( $files as $filename ) {
		// Parse the PHP file
		$contents = file_get_contents($filename);

		if ($contents === false) {
			throw new \Exception('Failed to read file ' . $filename);
		}

		$stmts = $parser->parse($contents);

		if (!is_array($stmts)) {
			throw new \Exception('Failed to parse file ' . $filename);
		}

		// Create a new FindingVisitor instance
		$visitor = new FindingVisitor(
			fn ( Node $node ) => ( $node instanceof Node\Stmt\Expression && $node->expr instanceof Node\Expr\FuncCall )
		);

		// Traverse the AST and resolve names
		$traverser = new NodeTraverser();
		$traverser->addVisitor( $visitor );
		$traverser->traverse($stmts);

		/** @var array<Node\Stmt\Expression> $stmts */
		$found = $visitor->getFoundNodes();

		// Process the parsed statements to find calls to do_action() and apply_filters()
		foreach ($found as $stmt) {
			/** @var Node\Expr\FuncCall $expr */
			$expr = $stmt->expr;
			$funcName = $expr->name;

			if (! ($funcName instanceof Node\Name)) {
				continue;
			}

			$funcNameStr = $funcName->toString();

			if ( ! in_array( $funcNameStr, $funcs, true ) ) {
				continue;
			}

			$hook = $expr->args[0];

			if ( ! $hook instanceof Node\Arg ) {
				continue;
			}

			$printer = new Standard();
			$hook_name = $printer->prettyPrintExpr($hook->value);
			$hook_name = preg_replace( '/^"(.*)"$/', '$1', $hook_name );
			$hook_name = preg_replace( "/^'(.*)'$/", '$1', $hook_name );
			$docblock = $stmt->getDocComment();

			if ( $docblock && str_starts_with($docblock->getText(), '/** This action is documented in') ) {
				continue;
			}

			if ( $docblock && str_starts_with($docblock->getText(), '/** This filter is documented in') ) {
				continue;
			}

			if ( in_array( $hook_name, $ignore_hooks, true ) ) {
				continue;
			}

			$relativename = str_replace( "{$root}/", '', $filename );

			$doc = [
				'description' => '',
				'long_description' => '',
				'tags' => [],
				'long_description_html' => '',
			];

			$dbt = $docblock ? $docblock->getText() : '';
			$aliases = null;

			if ( !empty($dbt)) {
				$dbf = DocBlockFactory::createInstance([
					// 'since' => \phpDocumentor\Reflection\DocBlock\Tags\Since::class,
				]);
				$db = $dbf->create( $dbt );

				$tags = [];

				foreach ( $db->getTags() as $tag ) {
					$content = '';

					$tag_types[ get_class($tag) ] = true;

					if ( ! method_exists( $tag, 'getVersion' ) && method_exists( $tag, 'getDescription' ) ) {
						$content = (string) $tag->getDescription();
						$content = preg_replace( '#\n\s+#', ' ', $content );
					}

					if ( empty( $content ) ) {
						// continue;
					}

					$tag_data = [
						'name' => $tag->getName(),
						'content' => fix_newlines($content),
					];

					if ( $tag instanceof \phpDocumentor\Reflection\DocBlock\Tags\InvalidTag && $tag->getName() === 'since' ) {
						$tag_data['content'] = (string) $tag;
						$tag_data['description'] = (string) $tag;
					} elseif ( $tag instanceof \phpDocumentor\Reflection\DocBlock\Tags\Since ) {
						// Version string.
						$version = $tag->getVersion();

						if ( ! empty( $version ) ) {
							$tag_data['content'] = $version;
						}

						// Description string.
						$description = preg_replace( '/[\n\r]+/', ' ', strval( $tag->getDescription() ) );

						if ( ! empty( $description ) ) {
							$tag_data['description'] = $description;
						}
					} elseif ( $tag instanceof \phpDocumentor\Reflection\DocBlock\Tags\Param ) {
						$tag_data['types'] = explode( '|', (string) $tag->getType() );
						$tag_data['variable'] = '$' . $tag->getVariableName();
					} elseif ( $tag instanceof \phpDocumentor\Reflection\DocBlock\Tags\Link ) {
						$tag_data['link'] = $tag->getLink();
					} elseif ( $tag instanceof \phpDocumentor\Reflection\DocBlock\Tags\Generic ) {
						//
					} elseif ( $tag instanceof \phpDocumentor\Reflection\DocBlock\Tags\See ) {
						$tag_data['refers'] = $tag->getReference();
					} elseif ( $tag instanceof \phpDocumentor\Reflection\DocBlock\Tags\Deprecated ) {
						//
					} else {
						throw new \Exception( 'Unknown tag type: ' . get_class( $tag ) );
					}

					$tags[] = $tag_data;
				}

				$long = fix_newlines( (string) $db->getDescription() );
				$markdown = \Parsedown::instance();
				$html = $markdown->text((string) $db->getDescription());
				$html = str_replace( "\n", ' ', $html );

				$doc = [
					'description' => str_replace( "\n", ' ', $db->getSummary() ),
					'long_description' => $long,
					'tags' => $tags,
					'long_description_html' => $html,
				];

				$aliases = parse_aliases( $html );
			}

			$out = [];

			$out['name'] = $hook_name;

			if ( $aliases ) {
				$out['aliases'] = $aliases;
			}

			$out['file'] = $relativename;

			switch ( $funcNameStr ) {
				case 'do_action':
					$out['type'] = 'action';
					break;
				case 'apply_filters':
					$out['type'] = 'filter';
					break;
				case 'do_action_ref_array':
					$out['type'] = 'action_reference';
					break;
				case 'apply_filters_ref_array':
					$out['type'] = 'filter_reference';
					break;
			}

			$out['doc'] = $doc;
			$out['args'] = count( $expr->args ) - 1;

			$output[] = $out;
		}
	}

	usort( $output, function( array $a, array $b ) : int {
		return strcmp( $a['name'], $b['name'] );
	} );

	return $output;
}

/**
 * @param \WP_Parser\Hook_Reflector[] $hooks Array of hook references.
 * @param string                      $path  The file path.
 * @return array<int,array<string,mixed>>
 */
function export_hooks( array $hooks, string $path ) : array {
	$out = array();

	foreach ( $hooks as $hook ) {
		$doc      = \WP_Parser\export_docblock( $hook );
		$docblock = $hook->getDocBlock();

		$doc['long_description_html'] = $doc['long_description'];

		if ( $docblock ) {
			$doc['long_description'] = \WP_Parser\fix_newlines( $docblock->getLongDescription() );
			$doc['long_description'] = str_replace(
				'  - ',
				"\n  - ",
				$doc['long_description']
			);
			$doc['long_description'] = preg_replace_callback(
				'# ([1-9])\. #',
				function( array $matches ) : string {
					return "\n {$matches[1]}. ";
				},
				$doc['long_description']
			);

			foreach ( $docblock->getTags() as $i => $tag ) {
				$content = '';

				if ( ! method_exists( $tag, 'getVersion' ) ) {
					$content = $tag->getDescription();
					$content = \WP_Parser\format_description( preg_replace( '#\n\s+#', ' ', $content ) );
				}

				if ( empty( $content ) ) {
					continue;
				}

				$doc['tags'][ $i ]['content'] = $content;
			}
		} else {
			$doc['long_description'] = '';
		}

		$aliases = parse_aliases( $doc['long_description_html'] );

		$result = [];

		$result['name'] = $hook->getName();

		if ( $aliases ) {
			$result['aliases'] = $aliases;
		}

		$result['file'] = $path;
		$result['type'] = $hook->getType();
		$result['doc'] = $doc;
		$result['args'] = count( $hook->getNode()->args ) - 1;

		$out[] = $result;
	}

	return $out;
}

/**
 * @return array<int, string>
 */
function parse_aliases( string $html ) : array {
	if ( false === strpos( $html, 'Possible hook names include' ) ) {
		return [];
	}

	$aliases = [];

	$html = explode( 'Possible hook names include', $html, 2 );
	$html = explode( '</ul>', end( $html ) );

	$dom = new DOMDocument();
	$dom->loadHTML( reset( $html ) );

	foreach ( $dom->getElementsByTagName( 'li' ) as $li ) {
		$aliases[] = $li->nodeValue;
	}

	sort( $aliases );

	return $aliases;
}

$output = hooks_parse_files( $files, $source_dir, $ignore_hooks );

// Actions
$actions = array_values( array_filter( $output, function( array $hook ) : bool {
	return in_array( $hook['type'], [ 'action', 'action_reference' ], true );
} ) );

$actions = [
	'$schema' => 'https://raw.githubusercontent.com/wp-hooks/generator/0.9.0/schema.json',
	'hooks' => $actions,
];

$result = file_put_contents( $target_dir . '/actions.json', json_encode( $actions, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES ) );

// Filters
$filters = array_values( array_filter( $output, function( array $hook ) : bool {
	return in_array( $hook['type'], [ 'filter', 'filter_reference' ], true );
} ) );

$filters = [
	'$schema' => 'https://raw.githubusercontent.com/wp-hooks/generator/0.9.0/schema.json',
	'hooks' => $filters,
];

$result = file_put_contents( $target_dir . '/filters.json', json_encode( $filters, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES ) );

echo "Done\n";
