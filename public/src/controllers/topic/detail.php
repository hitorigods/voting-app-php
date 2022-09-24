<?php

namespace controllers\topic\detail;

use db\CommentQuery;
use db\DataSource;
use db\TopicQuery;
use lib\Auth;
use lib\Massage;
use model\CommentModel;
use model\TopicModel;
use model\UserModel;
use Throwable;

function get() {
	$topic = new TopicModel;
	$topic->id = get_param('topic_id', null, false);

	TopicQuery::incrementViewCount($topic);

	$fetchedTopic = TopicQuery::fetchById($topic);
	$comments = CommentQuery::fetchByTopicId($topic);

	if (empty($fetchedTopic) || !$fetchedTopic->published) {
		Massage::push(Massage::ERROR, 'トピックが見つかりません。');
		redirect('404');
	}

	\view\topic\detail\index($fetchedTopic, $comments);
}

function post() {
	Auth::requireLogin();

	$comment = new CommentModel;
	$comment->topic_id = get_param('topic_id', null);
	$comment->agree = get_param('agree', null);
	$comment->body = get_param('body', null);

	$user = UserModel::getSession();
	$comment->user_id = $user->id;

	try {
		$db = new DataSource;
		$db->begin();

		$isSuccess = TopicQuery::incrementLikesOrDislikes($comment);
		if ($isSuccess && !empty($comment->body)) {
			$isSuccess = CommentQuery::insert($comment);
		}
	} catch (Throwable $e) {
		$isSuccess = false;
		Massage::push(Massage::DEBUG, $e->getMessage());
	} finally {
		if ($isSuccess) {
			$db->commit();
			Massage::push(Massage::INFO, 'コメントの登録に成功しました。');
		} else {
			$db->rollback();
			Massage::push(Massage::ERROR, 'コメントの登録に失敗しました。');
		}
	}

	redirect("topic/detail?topic_id={$comment->topic_id}");
}
