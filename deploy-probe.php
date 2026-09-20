<?php
// TEMPORARY deploy diagnostic — delete after use.
// Auth: caller must send k = sha256(DB_PASSWORD) — derived server-side,
// no secret stored in this file.
$cfg = @file_get_contents(__DIR__ . '/wp-config.php');
preg_match("/DB_PASSWORD['\"]?\s*,\s*'([^']*)'/", (string) $cfg, $m);
if (!hash_equals(hash('sha256', $m[1] ?? 'none'), $_GET['k'] ?? '')) {
    http_response_code(403);
    exit('no');
}

header('Content-Type: text/plain; charset=utf-8');
echo "PHP: ", PHP_VERSION, "\n\n";

echo "-- wp-config defines --\n";
foreach (['WP_CACHE', 'WP_DEBUG', 'WP_DEBUG_LOG', 'WP_DEBUG_DISPLAY', 'DISABLE_WP_CRON'] as $d) {
    echo $d, ': ',
        preg_match("/define\s*\(\s*['\"]" . $d . "['\"]\s*,\s*([^)]+)\)/", (string) $cfg, $mm)
            ? trim($mm[1]) : '(absent)', "\n";
}

echo "\n-- server plugins --\n";
echo implode("\n", array_values(array_diff(scandir(__DIR__ . '/wp-content/plugins'), ['.', '..']))), "\n";

echo "\n-- server themes --\n";
echo implode("\n", array_values(array_diff(scandir(__DIR__ . '/wp-content/themes')), ['.', '..'])), "\n";

echo "\n-- medidove-child files --\n";
echo implode("\n", array_values(array_diff(scandir(__DIR__ . '/wp-content/themes/medidove-child'), ['.', '..']))), "\n";

echo "\n-- key files --\n";
foreach ([
    'wp-content/advanced-cache.php',
    'wp-content/w3tc-config/master.php',
    'wp-content/db.php',
    'wp-content/object-cache.php',
    'wp-content/cache',
    'wp-content/plugins/w3-total-cache/w3-total-cache.php',
] as $f) {
    $p = __DIR__ . '/' . $f;
    echo $f, ': ', file_exists($p) ? (is_dir($p) ? 'dir' : 'file ' . filesize($p) . 'b') : 'MISSING', "\n";
}

echo "\n-- deployed template-helper md5 --\n";
echo @md5_file(__DIR__ . '/wp-content/themes/medidove/inc/template-helper.php'), "\n";
echo "-- child functions.php md5 --\n";
echo @md5_file(__DIR__ . '/wp-content/themes/medidove-child/functions.php'), "\n";
echo "-- .htaccess md5 --\n";
echo @md5_file(__DIR__ . '/.htaccess'), "\n";

echo "\n-- debug.log tail --\n";
$log = __DIR__ . '/wp-content/debug.log';
echo file_exists($log) ? substr((string) file_get_contents($log), -4000) : '(no debug.log)';
