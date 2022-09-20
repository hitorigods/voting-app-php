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
	// public static function insert($user) {
	// 	$db = new DataSource;
	// 	$sql = 'INSERT INTO users(id, pwd, nickname) VALUES (:id, :pwd, :nickname);';

	// 	$user->pwd = password_hash($user->pwd, PASSWORD_DEFAULT);

	// 	return $db->execute($sql, [
	// 		':id' => $user->id,
	// 		':pwd' => $user->pwd,
	// 		':nickname' => $user->nickname,
	// 	]);
	// }
}
