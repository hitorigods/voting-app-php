<?php
require_once 'config.php';

// Library
require_once BASE_SOURCE . 'libs/helper.php';
require_once BASE_SOURCE . 'libs/auth.php';
require_once BASE_SOURCE . 'libs/router.php';

// Model
require_once BASE_SOURCE . 'models/abstract.php';
require_once BASE_SOURCE . 'models/user.php';

// Message
require_once BASE_SOURCE . 'libs/message.php';

// DB
require_once BASE_SOURCE . 'db/datasource.php';
require_once BASE_SOURCE . 'db/user.query.php';

use function lib\router;

session_start();

try {
	require_once BASE_SOURCE . 'partials/header.php';

	$rpath = str_replace(BASE_CONTEXT_PATH, '', CURRENT_URI);
	$method = strtolower($_SERVER['REQUEST_METHOD']);

	router($rpath, $method);

	require_once BASE_SOURCE . 'partials/footer.php';
} catch (Throwable $e) {
	die('<h1>致命的なエラーが発生しました。</h1>');
}
