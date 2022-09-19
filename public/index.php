<?php
require_once 'config.php';

require_once 'src/partials/header.php';

$rpath = str_replace(BASE_CONTEXT_PATH, '', $URI);
$method = strtolower($_SERVER['REQUEST_METHOD']);

router($rpath, $method);

function router($rpath, $method) {
	if ($rpath === '') {
		$rpath = 'home';
	}

	$targetFile = BASE_SOURCE .  "controllers/{$rpath}.php";

	if (!file_exists($targetFile)) {
		require_once BASE_SOURCE . 'views/404.php';
		return;
	}
	require_once $targetFile;

	$fn = "\\controllers\\{$rpath}\\{$method}";
	$fn();
}

require_once 'src/partials/footer.php';
