<?php

namespace controllers\topic\edit;

use Throwable;

use db\TopicQuery;
use lib\Auth;
use lib\Massage;
use model\TopicModel;
use model\UserModel;

function get() {
	Auth::requireLogin();

	$topic = new TopicModel;
	$topic->id = get_param('topic_id', null, false);

	$user = UserModel::getSession();
	Auth::requirePermission($topic->id, $user);

	$fetchedTopic = TopicQuery::fetchById($topic);

	\view\topic\edit\index($fetchedTopic, true);
}

function post() {
	Auth::requireLogin();

	$topic = new TopicModel;
	$topic->id = get_param('topic_id', null);
	$topic->title = get_param('title', null);
	$topic->published = get_param('published', null);

	$user = UserModel::getSession();
	Auth::requirePermission($topic->id, $user);

	try {
		$isSuccess = TopicQuery::update($topic);
	} catch (Throwable $e) {
		Massage::push(Massage::DEBUG, $e->getMessage());
		$isSuccess = false;
	}

	if ($isSuccess) {
		Massage::push(Massage::INFO, 'トピックの更新に成功しました。');
		redirect('topic/archive');
	} else {
		Massage::push(Massage::ERROR, 'トピックの更新に失敗しました。');
		redirect(GO_REFERER);
	}
}
