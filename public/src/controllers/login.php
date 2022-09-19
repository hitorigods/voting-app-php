<?php

namespace controllers\login;

function get() {
	require_once BASE_SOURCE . 'views/login.php';
}

function post() {
	echo 'POST LOGIN';
}
