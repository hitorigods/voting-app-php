<?php

namespace controllers\register;

use lib\Auth;
use lib\Massage;
use model\UserModel;

function get() {
	require_once BASE_SOURCE . 'views/register.php';
}

function post() {
	$user = new UserModel;
	$user->id = get_param('id', '');
	$user->pwd = get_param('pwd', '');
	$user->nickname =  get_param('nickname', '');

	if (Auth::regist($user)) {
		Massage::push(Massage::INFO,  "{$user->nickname}さん、ようこそ。");
		redirect(GO_HOME);
	} else {
		redirect(GO_REFERER);
	}
}
