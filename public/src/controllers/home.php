<?php

namespace controllers\home;

function get() {
	require_once BASE_SOURCE . 'views/home.php';
}

function post() {
	echo 'POST HOME';
}
