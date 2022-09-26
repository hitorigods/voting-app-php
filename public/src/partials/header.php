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

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Archivo:wght@100;300;400;500;700;900&family=Roboto:wght@100;300;400;500;700;900&family=Zen+Kaku+Gothic+Antique:wght@300;400;500;700;900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo BASE_CSS_PATH; ?>style.min.css">
	</head>

	<body class="g-body">
		<header class="g-header">
			<div class="g-header_inner u-inner">
				<div class="g-header_main">
					<p class="g-header_title">
						<a href="<?php the_url('/') ?>">投票アプリ</a>
					</p>
				</div>
				<div class="g-header_side">
					<nav class="g-header_nav g-nav">
						<ul class="g-nav_items">
							<?php if (Auth::isLogin()) : ?>
								<li class="g-nav_item">
									<a href="<?php the_url('topic/create') ?>" class="g-nav_box">
										<span class="g-nav_name">投稿</span>
									</a>
								</li>
								<li class="g-nav_item">
									<a href="<?php the_url('topic/archive') ?>" class="g-nav_box">
										<span class="g-nav_name">過去の投稿</span>
									</a>
								</li>
								<li class="g-nav_item">
									<a href="<?php the_url('logout') ?>" class="g-nav_box">
										<span class="g-nav_name">ログアウト</span>
									</a>
								</li>
							<?php else : ?>
								<li class="g-nav_item">
									<a href="<?php the_url('login') ?>" class="g-nav_box">
										<span class="g-nav_name">ログイン</span>
									</a>
								</li>
								<li class="g-nav_item">
									<a href="<?php the_url('register') ?>" class="g-nav_box">
										<span class="g-nav_name">新規登録</span>
									</a>
								</li>
							<?php endif; ?>
						</ul>
					</nav>
					<!--nav-->
					<p class="g-header_status">
						<?php
						if (Auth::isLogin()) {
							echo 'ログインしています。';
						} else {
							echo 'ログインしてアンケートに参加しよう！';
						}
						?>
					</p>
				</div>
			</div>
		</header>
		<!--header-->

		<?php Massage::flush(); ?>

		<main class="g-main">
		<?php } ?>
