#!/usr/bin/env php
<?php
declare(strict_types=1);

namespace JohnBillion\WPHooksGenerator;

use DOMDocument;

require_once file_exists( 'vendor/autoload.php' ) ? 'vendor/autoload.php' : dirname( __DIR__, 4 ) . '/vendor/autoload.php';

$options = getopt( '', [
	"input:",
	"output:",
	"project:",

	"ignore-files::",
	"ignore-hooks::",
] );

if ( empty( $options['input' ] ) || empty( $options['output'] ) ) {
	printf(
		"Usage: %s --input=src --output=hooks --project=project [--ignore-files=ignore/this,ignore/that] [--ignore-hooks=this_hook,that_hook] \n",
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

$project_name = $options['project'];

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

/** @var array<int,string> */
$files = \WP_Parser\get_wp_files( $source_dir );
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
 * @param array<int,string> $files
 * @param string            $root
 * @param array<int,string> $ignore_hooks
 * @return array
 */
function hooks_parse_files( array $files, string $root, array $ignore_hooks ) : array {
	$output = array();

	foreach ( $files as $filename ) {
		if ( !is_readable( $filename ) ) {
			continue;
		}
		$file = new \WP_Parser\File_Reflector( $filename );
		$file_hooks = [];
		$path = ltrim( substr( $filename, strlen( $root ) ), DIRECTORY_SEPARATOR );
		$file->setFilename( $path );

		// should throw things, but for some reason returns errors instead, so we just collect them manually
		ob_start();
		$file->process();
		$processing_errors = ob_get_clean();
		if ( !empty( $processing_errors ) ) {
			fwrite( STDERR, $filename . PHP_EOL );
			fwrite( STDERR, $processing_errors . PHP_EOL );
		}

		if ( ! empty( $file->uses['hooks'] ) ) {
			$file_hooks = array_merge( $file_hooks, export_hooks( $file->uses['hooks'], $path ) );
		}

		foreach ( $file->getFunctions() as $function ) {
			if ( ! empty( $function->uses ) && ! empty( $function->uses['hooks'] ) ) {
				$file_hooks = array_merge( $file_hooks, export_hooks( $function->uses['hooks'], $path ) );
			}
		}

		foreach ( $file->getClasses() as $class ) {
			foreach ( $class->getMethods() as $method ) {
				if ( ! empty( $method->uses ) && ! empty( $method->uses['hooks'] ) ) {
					$file_hooks = array_merge( $file_hooks, export_hooks( $method->uses['hooks'], $path ) );
				}
			}
		}

		$output = array_merge( $output, $file_hooks );
	}

	$output = array_filter( $output, function( array $hook ) use ( $ignore_hooks ) : bool {
		if ( ! empty( $hook['doc'] ) && ! empty( $hook['doc']['description'] ) ) {
			if ( 0 === strpos( $hook['doc']['description'], 'This filter is documented in ' ) ) {
				return false;
			}
			if ( 0 === strpos( $hook['doc']['description'], 'This action is documented in ' ) ) {
				return false;
			}
		}

		if ( in_array( $hook['name'], $ignore_hooks, true ) ) {
			return false;
		}

		return true;
	} );

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
	return export_hooks_2( $hooks, $path );
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
 * @param \WP_Parser\Hook_Reflector[] $hooks Array of hook references.
 * @param string                      $path  The file path.
 * @return array<int,array<string,mixed>>
 */
function export_hooks_2( array $hooks, string $path ) : array {
	$out = array();

	foreach ( $hooks as $hook ) {
		$result = [];

		$name = $hook->getName();
		$type = $hook->getType();;

		if ( ( $type !== 'action' && // do_action()
			$type !== 'action_reference' // do_action_ref_array()
			) ||
			// not contains '{$'.
			strpos( $name, '{$' ) === false
		) {
			continue;
		}

		// classes\actions\ActionScheduler_Action.php
		// do_action_ref_array( $hook, array_values( $this->get_args() ) );
		// includes\class-wc-deprecated-action-hooks.php
		// do_action( $old_hook, $order_id, $item_id, $item->legacy_package_key );
		// '{$taxonomy}_add_form'
		if ( starts_with( $name, '{$' ) &&
			ends_with( $name, '}' )
		) {
			continue;
		}

		$doc      = \WP_Parser\export_docblock( $hook );

		$result['name'] = $name;
		$result['file'] = $path;
		$result['type'] = $type;
		$result['doc'] = $doc;
		$result['args'] = count( $hook->getNode()->args ) - 1;

		$out[] = $result;
	}

	return $out;
}

/** String starts with?
 *
 * @param string       $haystack .
 * @param string|array $needles .
 *
 * @return bool
 */
function starts_with( string $haystack, $needles ) {
	$needles = ! is_array( $needles ) ? [ $needles ] : $needles; // array of one element.
	foreach ( $needles as $needle ) {
		$length = strlen( $needle );
		if ( substr( $haystack, 0, $length ) === $needle ) {
			return true;
		}
	}
	return false;
}

/** String ends with?
 *
 * @param string       $haystack .
 * @param string|array $needles .
 *
 * @return bool
 */
function ends_with( string $haystack, $needles ) {
	$needles = ! is_array( $needles ) ? [ $needles ] : $needles; // array of one element.
	foreach ( $needles as $needle ) {
		if ( substr_compare( $haystack, $needle, -strlen( $needle ) ) === 0 ) {
			return true;
		}
	}
	return false;
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

foreach ( $actions as $key => $action ) {
	$actions[$key] = $action['name'];
}
// unique hooks (only for one dimensional array).
$actions = array_unique( $actions );

// add regexp versions.
$pattern       = '/{\$.*}/i'; // {$column_id}.
$variable_part = '{$var}';
$index         = 0; // to add an index key and see how many there are.
foreach ( $actions as $action_name ) {
	// registered_taxonomy_{$taxonomy} => registered_taxonomy_{$var}.
	$normalized_name   = preg_replace( $pattern, $variable_part, $action_name );

	$variable_part_pos = stripos( $normalized_name, $variable_part );

	$actions_final["$index."]['name'] = $action_name;

	if ( false !== $variable_part_pos ) {
		$actions_final["$index."]['prefix'] =
			substr(
				$normalized_name,
				0,
				$variable_part_pos
			);

		$actions_final["$index."]['suffix'] =
			substr(
				$normalized_name,
				$variable_part_pos + strlen( $variable_part )
			);
	}

	$index++;
}


// $actions = [
// 	'$schema' => 'https://raw.githubusercontent.com/wp-hooks/generator/0.9.0/schema.json',
// 	'hooks' => $actions,
// ];

// $result = file_put_contents(
// 	$target_dir . '/actions.json',
// 	json_encode( $actions, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES )
// );

use Symfony\Component\VarExporter\VarExporter;

$php_code = VarExporter::export( $actions_final );
$php_code =
'<?php' . "\n\n" .
"\${$project_name}_variable_actions = $php_code;\n";

$result = file_put_contents(
	"$target_dir/{$project_name}_actions.php",
	$php_code
);


// // Filters
// $filters = array_values( array_filter( $output, function( array $hook ) : bool {
// 	return in_array( $hook['type'], [ 'filter', 'filter_reference' ], true );
// } ) );

// $filters = [
// 	'$schema' => 'https://raw.githubusercontent.com/wp-hooks/generator/0.9.0/schema.json',
// 	'hooks' => $filters,
// ];

// $result = file_put_contents(
// 	$target_dir . '/filters.json',
// 	json_encode( $filters, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES )
// );

echo "Done\n";
