<?php
function get_param($key, $default, $isPost = true) {
	$array = $isPost ? $_POST : $_GET;
	return $array[$key] ?? $default;
}

function redirect($path) {
	if ($path === GO_HOME) {
		$path = get_url('');
	} else if ($path === GO_REFERER) {
		$path = $_SERVER['HTTP_REFERER'];
	} else {
		$path = get_url($path);
	}

	header("Location: {$path}");
	die();
}

function get_url($path) {
	return BASE_CONTEXT_PATH . trim($path, '/');
}

function the_url($path) {
	echo  get_url($path);
}

function is_alnum($value) {
	return preg_match("/^[a-zA-Z0-9]+$/", $value);
}

function escape($data) {
	if (is_array($data)) {
		foreach ($data as $prop => $val) {
			$data[$prop] = escape($val);
		}
		return $data;
	} else if (is_object($data)) {
		foreach ($data as $prop => $val) {
			$data->$prop = escape($val);
		}
		return $data;
	} else {
		return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
	}
}
