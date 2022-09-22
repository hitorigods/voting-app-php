<?php

namespace controllers\topic\detail;

use db\CommentQuery;
use db\TopicQuery;
use lib\Massage;
use model\TopicModel;

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
