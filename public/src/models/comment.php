<?php

namespace model;

use lib\Massage;

class CommentModel extends AbstractModel {

	public int $id;
	public int $topic_id;
	public string $user_id;
	public int $del_flg;
	public string $body;
	public string $agree;
	public string $nickname;

	public function isValidAgree() {
		return static::validateAgree($this->agree);
	}

	public static function validateAgree($value) {

		$response = true;

		if (!isset($value)) {
			Massage::push(Massage::ERROR, '賛成か反対か選択してください。');

			if (!($value == 0 || $value == 1)) {
				Massage::push(Massage::ERROR, '賛成か反対、どちらかの値を選択してください。');
			}

			$response = false;
		}

		return $response;
	}

	public function isValidBody() {
		return static::validateBody($this->body);
	}

	public static function validateBody($value) {
		$response = true;

		if (mb_strlen($value) > 100) {

			Massage::push(Massage::ERROR, 'コメントは100文字以内で入力してください。');
			$response = false;
		}

		return $response;
	}

	public function isValidTopicId() {
		return TopicModel::validateId($this->topic_id);
	}
}
