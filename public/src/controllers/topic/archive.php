<?php

namespace controllers\topic\archive;

use db\TopicQuery;
use lib\Auth;
use lib\Massage;
use model\UserModel;

function get() {
	Auth::requireLogin();

	$user = UserModel::getSession();

	$topics = TopicQuery::fetchByUserId($user);

	if ($topics === false) {
		Massage::push(Massage::ERROR, 'ログインしてください。');
		redirect('login');
	}

	\view\topic\archive\index($topics);
}
