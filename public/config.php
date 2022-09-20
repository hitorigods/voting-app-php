<?php
define('CURRENT_URI', $_SERVER['REQUEST_URI']);

define('BASE_CONTEXT_PATH', '/');
define('BASE_ASSETS_PATH', BASE_CONTEXT_PATH . 'assets/');
define('BASE_IMAGE_PATH', BASE_ASSETS_PATH . 'img/');
define('BASE_CSS_PATH', BASE_ASSETS_PATH . 'css/');
define('BASE_JS_PATH', BASE_ASSETS_PATH . 'js/');
define('BASE_SOURCE', __DIR__ . '/src/');

define('GO_HOME', 'home');
define('GO_REFERER', 'referer');

define('DEBUG', true);
