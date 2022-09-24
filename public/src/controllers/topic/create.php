<?php

namespace controllers\topic\create;

use Throwable;

use db\TopicQuery;
use lib\Auth;
use lib\Massage;
use model\TopicModel;
use model\UserModel;

function get() {
	Auth::requireLogin();

	$topic = TopicModel::getSessionAndFlush();

	if (empty($topic)) {
		$topic = new TopicModel;
		$topic->id = -1;
		$topic->title = '';
		$topic->published = 1;
	}

	\view\topic\edit\index($topic, false);
}

function post() {
	Auth::requireLogin();

	$topic = new TopicModel;
	$topic->id = get_param('topic_id', null);
	$topic->title = get_param('title', null);
	$topic->published = get_param('published', null);

	try {
		$user = UserModel::getSession();
		$isSuccess = TopicQuery::insert($topic, $user);
	} catch (Throwable $e) {
		Massage::push(Massage::DEBUG, $e->getMessage());
		$isSuccess = false;
	}

	if ($isSuccess) {
		Massage::push(Massage::INFO, 'トピックの登録に成功しました。');
		redirect('topic/archive');
	} else {
		Massage::push(Massage::ERROR, 'トピックの登録に失敗しました。');
		TopicModel::setSession($topic);
		redirect(GO_REFERER);
	}
}
