<?php

namespace controllers\topic\detail;

use db\CommentQuery;
use db\TopicQuery;
use lib\Massage;
use model\TopicModel;

function get() {
	$topic = new TopicModel;
	$topic->id = get_param('topic_id', null, false);

	$fetchedTopic = TopicQuery::fetchById($topic);
	$comments = CommentQuery::fetchByTopicId($topic);

	if (!$fetchedTopic) {
		Massage::push(Massage::ERROR, 'トピックが見つかりません。');
		redirect('404');
	}

	\view\topic\detail\index($fetchedTopic, $comments);
}
