<?php

namespace model;

use lib\Massage;

class UserModel extends AbstractModel {
	public string $id;
	public string $password;
	public string $nickname;
	public int $del_flg;

	protected static $SESSION_NAME = '_user';

	public static function validateId($value) {
		$isValid = true;

		if (empty($value)) {
			Massage::push(Massage::ERROR, 'ユーザーIDを入力してください。');
			$isValid = false;
		} else {
			if (strlen($value) > 10) {
				Massage::push(Massage::ERROR, 'ユーザーIDは10桁以下で入力してください。');
				$isValid = false;
			}
			if (!isAlnum($value)) {
				Massage::push(Massage::ERROR, 'ユーザーIDは半角英数字で入力してください。');
				$isValid = false;
			}
		}

		return $isValid;
	}

	public function isValidId() {
		return static::validateId($this->id);
	}

	public static function validatePassword($value) {
		$isValid = true;

		if (empty($value)) {
			Massage::push(Massage::ERROR, 'パスワードを入力してください。');
			$isValid = false;
		} else {
			if (strlen($value) < 4) {
				Massage::push(Massage::ERROR, 'パスワードは4桁以上で入力してください。');
				$isValid = false;
			}
			if (!isAlnum($value)) {
				Massage::push(Massage::ERROR, 'パスワードは半角英数字で入力してください。');
				$isValid = false;
			}
		}

		return $isValid;
	}

	public function isValidPassword() {
		return static::validatePassword($this->pwd);
	}

	public static function validateNickname($value) {
		$isValid = true;

		if (empty($value)) {
			Massage::push(Massage::ERROR, 'ニックネームを入力してください。');
			$isValid = false;
		} else {
			if (mb_strlen($value) > 10) {
				Massage::push(Massage::ERROR, 'ニックネームは10桁以下で入力してください。');
				$isValid = false;
			}
		}

		return $isValid;
	}

	public function isValidNickname() {
		return static::validateNickname($this->nickname);
	}
}
