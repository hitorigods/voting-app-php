<?php

namespace model;

use lib\Massage;

class TopicModel extends AbstractModel {

	public int $id;
	public string $title;
	public int $published;
	public int $views;
	public int $likes;
	public int $dislikes;
	public string $user_id;
	public int $del_flg;
	protected static $SESSION_NAME = '_topic';

	public function isValidId() {
		return static::validateId($this->id);
	}

	public static function validateId($value) {
		$response = true;

		if (empty($value) || !is_numeric($value)) {

			Massage::push(Massage::ERROR, 'パラメータが不正です。');
			$response = false;
		}

		return $response;
	}

	public function isValidTitle() {
		return static::validateTitle($this->title);
	}

	public static function validateTitle($value) {
		$response = true;

		if (empty($value)) {

			Massage::push(Massage::ERROR, 'タイトルを入力してください。');
			$response = false;
		} else {

			if (mb_strlen($value) > 30) {

				Massage::push(Massage::ERROR, 'タイトルは30文字以内で入力してください。');
				$response = false;
			}
		}

		return $response;
	}

	public function isValidPublished() {
		return static::validatePublished($this->published);
	}

	public static function validatePublished($value) {
		$response = true;

		if (!isset($value)) {

			Massage::push(Massage::ERROR, '公開するか選択してください。');
			$response = false;
		} else {
			// 0、または1以外の時
			if (!($value == 0 || $value == 1)) {

				Massage::push(Massage::ERROR, '公開ステータスが不正です。');
				$response = false;
			}
		}

		return $response;
	}
}
