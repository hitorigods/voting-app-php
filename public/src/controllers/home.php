<?php

namespace controllers\home;

use db\TopicQuery;

function get() {
	$topics = TopicQuery::fetchPublishedTopics();
	\view\home\index($topics);
}
