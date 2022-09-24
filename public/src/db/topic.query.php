<?php

namespace db;

use db\DataSource;
use model\TopicModel;

class TopicQuery {
	public static function fetchByUserId($user) {
		if (!$user->isValidId()) {
			return false;
		}

		$db = new DataSource;
		$sql = 'SELECT * FROM topics WHERE user_id = :id AND del_flg != 1 ORDER BY updated_at DESC;';

		$result = $db->select($sql, [
			':id' => $user->id
		], DataSource::CLS, TopicModel::class);

		return $result;
	}

	public static function fetchPublishedTopics() {
		$db = new DataSource;
		$sql = 'SELECT t.*, u.nickname FROM topics t
		INNER JOIN users u
			ON t.user_id = u.id
		WHERE t.del_flg != 1
			AND u.del_flg != 1
			AND t.published = 1
		ORDER BY t.updated_at DESC';

		$result = $db->select($sql, [], DataSource::CLS, TopicModel::class);

		return $result;
	}

	public static function fetchById($topic) {
		if (!$topic->isValidId()) {
			return false;
		}

		$db = new DataSource;
		$sql = 'SELECT t.*, u.nickname FROM topics t
		INNER JOIN users u
			ON t.user_id = u.id
		WHERE t.id = :id
			AND t.del_flg != 1
			AND u.del_flg != 1
		ORDER BY t.updated_at DESC';

		$result = $db->selectOne($sql, [
			':id' => $topic->id
		], DataSource::CLS, TopicModel::class);

		return $result;
	}

	public static function incrementViewCount($topic) {
		if (!$topic->isValidId()) {
			return false;
		}

		$db = new DataSource;
		$sql = 'UPDATE topics SET views = views + 1 WHERE id = :id';

		$result = $db->execute($sql, [
			':id' => $topic->id
		]);
	}

	public static function isUserOwnTopic($topic_id, $user) {
		if (!(TopicModel::validateId($topic_id) && $user->isValidId())) {
			return false;
		}

		$db = new DataSource;
		$sql = 'SELECT count(1) AS count FROM topics t
		WHERE t.id = :topic_id
			AND t.user_id = :user_id
			AND t.del_flg != 1';

		$result = $db->selectOne($sql, [
			':topic_id' => $topic_id,
			':user_id' => $user->id
		]);

		return !empty($result) && $result['count'] != 0;
	}

	public static function update($topic) {
		if (!($topic->isValidId()
			* $topic->isValidTitle()
			* $topic->isValidPublished()
		)) {
			return false;
		}

		$db = new DataSource;
		$sql = 'UPDATE topics SET published = :published, title = :title WHERE id = :id;';

		return $db->execute($sql, [
			':published' => $topic->published,
			':title' => $topic->title,
			':id' => $topic->id,
		]);
	}

	public static function insert($topic, $user) {
		if (!($user->isValidId()
			* $topic->isValidTitle()
			* $topic->isValidPublished()
		)) {
			return false;
		}

		$db = new DataSource;
		$sql = 'INSERT INTO topics(title, published, user_id) VALUES (:title, :published, :user_id);';

		return $db->execute($sql, [
			':title' => $topic->title,
			':published' => $topic->published,
			':user_id' => $user->id,
		]);
	}

	public static function incrementLikesOrDislikes($comment) {
		if (!($comment->isValidTopicId()
			* $comment->isValidAgree()
		)) {
			return false;
		}

		$db = new DataSource;

		if ($comment->agree) {
			$sql = 'UPDATE topics SET likes = likes + 1 WHERE id = :topic_id;';
		} else {
			$sql = 'UPDATE topics SET dislikes = dislikes + 1 WHERE id = :topic_id;';
		}

		return $db->execute($sql, [
			':topic_id' => $comment->topic_id,
		]);
	}
}
