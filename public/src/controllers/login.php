<?php

namespace controllers\login;

use lib\Auth;
use lib\Massage;
use model\UserModel;

function get() {
	require_once BASE_SOURCE . 'views/login.php';
}

function post() {
	$id = get_param('id', '');
	$pwd = get_param('pwd', '');

	if (Auth::login($id, $pwd)) {
		$user = UserModel::getSession();
		Massage::push(Massage::INFO,  "{$user->nickname}さん、ようこそ。");
		redirect(GO_HOME);
	} else {
		redirect(GO_REFERER);
	}
}
