<?php
ini_set('display_errors', 'On');

require_once ($_SERVER['SERVER_NAME'] === 'localhost') ? '__env.local.php' : '__env.production.php';
require_once 'config.php';

// Library
require_once BASE_SOURCE . 'libs/helper.php';
require_once BASE_SOURCE . 'libs/auth.php';
require_once BASE_SOURCE . 'libs/router.php';

// Model
require_once BASE_SOURCE . 'models/abstract.php';
require_once BASE_SOURCE . 'models/user.php';
require_once BASE_SOURCE . 'models/topic.php';
require_once BASE_SOURCE . 'models/comment.php';

// Message
require_once BASE_SOURCE . 'libs/message.php';

// DB
require_once BASE_SOURCE . 'db/datasource.php';
require_once BASE_SOURCE . 'db/user.query.php';
require_once BASE_SOURCE . 'db/topic.query.php';
require_once BASE_SOURCE . 'db/comment.query.php';

// Partial
require_once BASE_SOURCE . 'partials/topic-articles.php';
require_once BASE_SOURCE . 'partials/topic-single.php';
require_once BASE_SOURCE . 'partials/header.php';
require_once BASE_SOURCE . 'partials/footer.php';

// View
require_once BASE_SOURCE . 'views/home.php';
require_once BASE_SOURCE . 'views/login.php';
require_once BASE_SOURCE . 'views/register.php';
require_once BASE_SOURCE . 'views/topic/archive.php';
require_once BASE_SOURCE . 'views/topic/detail.php';
require_once BASE_SOURCE . 'views/topic/edit.php';

use function lib\route;

session_start();

try {
	\partial\header();

	$url = parse_url(CURRENT_URI);
	$rpath = preg_replace("/^\//", '', $url['path']);
	// $rpath = str_replace(BASE_CONTEXT_PATH, '', $url['path']);
	$method = strtolower($_SERVER['REQUEST_METHOD']);

	route($rpath, $method);

	\partial\footer();
} catch (Throwable $e) {
	die('<h1 class="g-caution">致命的なエラーが発生しました。</h1>');
}
