<?php

namespace lib;

use Throwable;

use db\UserQuery;
use model\UserModel;

class Auth {
	public static function login($id = '', $pwd = '') {
		try {
			if (!(UserModel::validateId($id)
				* UserModel::validatePassword($pwd))) {
				return false;
			}

			$isSuccess = false;

			$user = UserQuery::fetchById($id);

			if (!empty($user) && $user->del_flg !== 1) {
				if (password_verify($pwd, $user->pwd)) {
					$isSuccess = true;
					UserModel::setSession($user);
				} else {
					Massage::push(Massage::ERROR, 'パスワードが一致しません。');
				}
			} else {
				Massage::push(Massage::ERROR, 'ユーザーが見つかりません。');
			}
		} catch (Throwable $e) {
			$isSuccess = false;
			Massage::push(Massage::DEBUG, $e->getMessage());
			Massage::push(Massage::ERROR, 'ログイン処理でエラーが発生しました。');
		}

		return $isSuccess;
	}

	public static function regist($user) {
		try {
			if (!($user->isValidId()
				* $user->isValidPassword()
				* $user->isValidNickname())) {
				return false;
			}

			$isSuccess = false;

			$existUser = UserQuery::fetchById($user->id);

			if (!empty($existUser)) {
				Massage::push(Massage::ERROR, 'ユーザーが既に存在しています。');
				return false;
			}

			$isSuccess = UserQuery::insert($user);

			if ($isSuccess) {
				UserModel::setSession($user);
			}
		} catch (Throwable $e) {
			$isSuccess = false;
			Massage::push(Massage::DEBUG, $e->getMessage());
			Massage::push(Massage::ERROR, 'ユーザー登録でエラーが発生しました。');
		}

		return $isSuccess;
	}

	public static function isLogin() {
		try {
			$user = UserModel::getSession();
		} catch (Throwable $e) {
			$user = UserModel::clearSession();
			Massage::push(Massage::DEBUG, $e->getMessage());
			Massage::push(Massage::ERROR, 'エラーが発生しました。再度ログインしてください。');
		}

		if (isset($user)) {
			return true;
		} else {
			return false;
		}
	}

	public static function logout() {
		try {
			UserModel::clearSession();
		} catch (Throwable $e) {
			Massage::push(Massage::DEBUG, $e->getMessage());
			return false;
		}
		return true;
	}
}
