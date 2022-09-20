<?php

namespace partial;

use lib\Auth;
use lib\Massage;

function header() {
?>
	<!DOCTYPE html>
	<html lang="ja">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>投票アプリ</title>

		<link rel="stylesheet" href="<?php echo BASE_CSS_PATH; ?>style.css">
	</head>

	<body>
		<header>
			<div>
				<?php
				if (Auth::isLogin()) {
					echo 'ログイン中です。';
				} else {
					echo 'ログインしていません。';
				}
				?>
			</div>

			<nav>
				<ul>
					<li><a href="<?php the_url('/') ?>">HOME</a></li>
					<?php if (Auth::isLogin()) : ?>
						<li><a href="<?php the_url('topic/create') ?>">投稿</a></li>
						<li><a href="<?php the_url('topic/archive') ?>">過去の投稿</a></li>
						<li><a href="<?php the_url('logout') ?>">ログアウト</a></li>
					<?php else : ?>
						<li><a href="<?php the_url('login') ?>">ログイン</a></li>
						<li><a href="<?php the_url('register') ?>">新規登録</a></li>
					<?php endif; ?>
				</ul>
			</nav>

			<?php Massage::flush(); ?>
		</header>

		<main>
		<?php } ?>
