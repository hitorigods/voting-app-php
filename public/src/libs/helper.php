<?php
function get_param($key, $default, $isPost = true) {
	$array = $isPost ? $_POST : $_GET;
	return $array[$key] ?? $default;
}

function redirect($path) {
	if ($path === GO_HOME) {
		$path = getUrl('');
	} else if ($path === GO_REFERER) {
		$path = $_SERVER['HTTP_REFERER'];
	} else {
		$path = getUrl($path);
	}

	header("Location: {$path}");
	die();
}

function getUrl($path) {
	return BASE_CONTEXT_PATH . trim($path, '/');
}

function isAlnum($value) {
	return preg_match("/^[a-zA-Z0-9]+$/", $value);
}
