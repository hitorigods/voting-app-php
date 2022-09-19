<?php

namespace controllers\logout;

use lib\Auth;
use lib\Massage;

function get() {
	if (Auth::logout()) {
		Massage::push(Massage::INFO, 'ログアウトが成功しました。');
	} else {
		Massage::push(Massage::ERROR, 'ログアウトが失敗しました。');
	}

	redirect(GO_HOME);
}
