#!/usr/bin/env php
<?php
declare(strict_types=1);

namespace WPHooks\Generator;

use Symfony\Component\VarExporter\VarExporter;

require_once 'generate.php';

$project_name = getopt( '', [
	"project:",
] )['project'];

# ########################## Raw actions.

$php_code = VarExporter::export( $actions );
$php_code =
'<?php' . "\n\n" .
"// " . count( $actions ). " actions.\n" .
"\${$project_name}_actions = $php_code;\n";

$result = file_put_contents(
	"$target_dir/{$project_name}_actions_raw.php",
	$php_code
);

# ########################## Variable actions.

// unique hooks (only for one dimensional array).
//$actions = array_unique( $actions );

$variable_actions = iohna_get_variable_actions( $actions );

$php_code = VarExporter::export( $variable_actions );
$php_code =
'<?php' . "\n\n" .
"// " . count( $variable_actions ). " actions.\n" .
"\${$project_name}_variable_actions = $php_code;\n";

$result = file_put_contents(
	"$target_dir/{$project_name}_variable_actions.php",
	$php_code
);

echo "Done\n";
die;

function iohna_get_variable_actions( $actions ) {
	$result = [];

	// add regexp versions.
	$pattern       = '/{\$.*}/i'; // {$column_id}.
	$variable_part = '{$var}';
	foreach ( $actions as $action ) {
		$action_name = cleanupName( $action['name'] );
		$type        = $action['type'];

		if ( ( $type !== 'action' && // do_action()
			$type !== 'action_reference' // do_action_ref_array()
			) ||
			// not contains '{$'.
			strpos( $action_name, '{$' ) === false ||
			// actions names that calls to a function to get a fixed name aren't a variable hook:
			// - ( $this->get_hook_prefix() . 'created' ); => '{$this->get_hook_prefix()}created'
			// - ( $deferred_download_tracker->get_hook() );
			// - ( current_hook() );
			// https://regex101.com/r/KIuwR0/1
			regex_first_match( '/{\$.*(get|current)_hook.*().*}/i', $action_name )
		) {
			continue;
		}

		// skip '{$completely_variable_hook}'.
		if ( starts_with( $action_name, '{$' ) &&
			ends_with( $action_name, '}' )
		) {
			continue;
		}

		// registered_taxonomy_{$taxonomy} => registered_taxonomy_{$var}.
		$normalized_name   = preg_replace(
			$pattern, $variable_part, $action_name
		);

		$variable_part_pos = stripos( $normalized_name, $variable_part );

		$item_to_add['name'] = $action_name;

		if ( false !== $variable_part_pos ) {
			$item_to_add['prefix'] = substr(
				$normalized_name,
				0,
				$variable_part_pos
			);

			$item_to_add['suffix'] = substr(
				$normalized_name,
				$variable_part_pos + strlen( $variable_part )
			);
		}

		$result[] = $item_to_add;
	}

	return $result;
}

/** Restored function from \wp-hooks\parser\lib\class-hook-reflector.php
 * wp-hooks/parser ex johnbillion/wp-parser-lib
 * https://github.com/wp-hooks/parser
 *
 * @param string $name .
 *
 * @return string
 */
function cleanupName( $name ) {
	$matches = array();

	// quotes on both ends of a string
	if ( preg_match( '/^[\'"]([^\'"]*)[\'"]$/', $name, $matches ) ) {
		return $matches[1];
	}

	// two concatenated things, last one of them a variable
	if ( preg_match(
		'/(?:[\'"]([^\'"]*)[\'"]\s*\.\s*)?' . // First filter name string (optional)
		'(\$[^\s]*)' .                        // Dynamic variable
		'(?:\s*\.\s*[\'"]([^\'"]*)[\'"])?/',  // Second filter name string (optional)
		$name, $matches ) ) {

		if ( isset( $matches[3] ) ) {
			return $matches[1] . '{' . $matches[2] . '}' . $matches[3];
		} else {
			return $matches[1] . '{' . $matches[2] . '}';
		}
	}

	return $name;
}

/** Searches in the `input` string for the first match to the regular expression given in `pattern`.
 * Wrapper of preg_match()
 *
 * @since 3.25.0
 * @link https://stackoverflow.com/questions/4088836/phps-preg-match-and-preg-match-all-functions
 *
 * @param string     $pattern The pattern to search for, as a string.
 * @param string     $input   The input string.
 * @param array|null $matches Array filled with the results of search.
 *                            - $matches[0] will contain the text that matched the full pattern,
 *                            - $matches[1] will have the text that matched the first captured parenthesized subpattern, and so on.
 * @param int        $flags   `flags` can be a combination of the following flags: `PREG_OFFSET_CAPTURE` If this flag is passed, for every occurring match the appendant string offset (in bytes) will also be returned. Note that this changes the value of `matches` into an array where every element is an array consisting of the matched string at offset `0` and its string offset into `subject` at offset `1`.
 * @param int        $offset  Normally, the search starts from the beginning of the subject string. The optional parameter `offset` can be used to specify the alternate place from which to start the search (in bytes). Note : Using `offset` is not equivalent to passing `substr($subject, $offset)` to preg_match() in place of the subject string, because `pattern` can contain assertions such as ^ , $ or (?<=x).
 *
 * @return bool|int Returns 1 if the `pattern` matches the given input(`subject`), 0 if it does not, or `false` on failure.
 */
function regex_first_match(
	string $pattern,
	string $input,
	&$matches = null,
	int $flags = 0,
	int $offset = 0
) {
	return preg_match(
		$pattern,
		$input,
		$matches,
		$flags,
		$offset
	);
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
