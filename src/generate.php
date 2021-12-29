#!/usr/bin/env php
<?php

namespace JohnBillion\WPHooksGenerator;

require_once 'vendor/autoload.php';

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

function hooks_parse_files( $files, $root, $ignore_hooks ) : array {
	$output = array();

	foreach ( $files as $filename ) {
		$file = new \WP_Parser\File_Reflector( $filename );
		$file_hooks = [];
		$path = ltrim( substr( $filename, strlen( $root ) ), DIRECTORY_SEPARATOR );
		$file->setFilename( $path );

		$file->process();

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
 *
 * @return array
 */
function export_hooks( array $hooks, string $path ) {
	$out = array();

	foreach ( $hooks as $hook ) {
		$doc      = \WP_Parser\export_docblock( $hook );
		$docblock = $hook->getDocBlock();

		$doc['long_description_html'] = $doc['long_description'];

		if ( $docblock ) {
			$doc['long_description'] = \WP_Parser\fix_newlines( $docblock->getLongDescription() );
		} else {
			$doc['long_description'] = '';
		}

		$out[] = array(
			'name'     => $hook->getName(),
			'file'     => $path,
			'type'     => $hook->getType(),
			'doc'      => $doc,
			'args'     => count( $hook->getNode()->args ) - 1,
		);
	}

	return $out;
}

$output = hooks_parse_files( $files, $source_dir, $ignore_hooks );

// Actions
$actions = array_values( array_filter( $output, function( array $hook ) : bool {
	return in_array( $hook['type'], [ 'action', 'action_reference' ], true );
} ) );

$actions = [
	'$schema' => 'https://raw.githubusercontent.com/johnbillion/wp-hooks-generator/0.7.0/schema.json',
	'hooks' => $actions,
];

$result = file_put_contents( $target_dir . '/actions.json', json_encode( $actions, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES ) );

// Filters
$filters = array_values( array_filter( $output, function( array $hook ) : bool {
	return in_array( $hook['type'], [ 'filter', 'filter_reference' ], true );
} ) );

$filters = [
	'$schema' => 'https://raw.githubusercontent.com/johnbillion/wp-hooks-generator/0.7.0/schema.json',
	'hooks' => $filters,
];

$result = file_put_contents( $target_dir . '/filters.json', json_encode( $filters, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES ) );

echo "Done\n";
