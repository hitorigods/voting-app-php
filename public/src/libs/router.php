<?php

namespace lib;

use Throwable;

function route($rpath, $method) {
	try {
		if ($rpath === '') {
			$rpath = 'home';
		}


		$targetFile = BASE_SOURCE .  "controllers/{$rpath}.php";

		if (!file_exists($targetFile)) {
			require_once BASE_SOURCE . 'views/404.php';
			return;
		}
		require_once $targetFile;

		$rpath = str_replace('/', '\\', $rpath);

		$fn = "\\controllers\\{$rpath}\\{$method}";
		$fn();
	} catch (Throwable $e) {
		Massage::push(Massage::DEBUG, $e->getMessage());
		Massage::push(Massage::ERROR, '存在しないURLです。');
		redirect('404');
	}
}
