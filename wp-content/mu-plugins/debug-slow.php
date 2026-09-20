<?php
// Temporary: log slow HTTP API calls and WP phase timings
$GLOBALS['__req_t0'] = microtime(true);
$GLOBALS['__last_mark'] = $GLOBALS['__req_t0'];

function __mark($name) {
	$now = microtime(true);
	error_log(sprintf("MARK %-20s +%6.2fs  total %6.2fs", $name, $now - $GLOBALS['__last_mark'], $now - $GLOBALS['__req_t0']));
	$GLOBALS['__last_mark'] = $now;
}

foreach (['plugins_loaded','after_setup_theme','init','wp_loaded','wp','admin_init'] as $h) {
	add_action($h, function() use ($h) { __mark($h); }, 9999);
}

add_filter('pre_http_request', function($pre, $args, $url) {
	$GLOBALS['__http_' . md5($url)] = microtime(true);
	return $pre;
}, 1, 3);

add_action('http_api_debug', function($response, $context, $class, $args, $url) {
	$k = '__http_' . md5($url);
	$dur = isset($GLOBALS[$k]) ? round(microtime(true) - $GLOBALS[$k], 2) : -1;
	error_log("HTTPAPI {$dur}s {$url}");
}, 10, 5);

add_action('shutdown', function() {
	error_log('REQTOTAL ' . round(microtime(true) - $GLOBALS['__req_t0'], 2) . 's ' . ($_SERVER['REQUEST_URI'] ?? ''));
});
