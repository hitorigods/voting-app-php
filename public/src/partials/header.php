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

			use lib\Auth;
			use lib\Massage;

			if (Auth::isLogin()) {
				echo 'ログイン中です。';
			} else {
				echo 'ログインしていません。';
			}
			?>
		</div>

		<nav>
			<ul>
				<li><a href="/">HOME</a></li>
				<?php if (!Auth::isLogin()) { ?>
					<li><a href="/login">ログイン</a></li>
					<li><a href="/register">新規登録</a></li>
				<?php } ?>
				<?php if (Auth::isLogin()) { ?>
					<li><a href="/logout">ログアウト</a></li>
				<?php } ?>
			</ul>
		</nav>

		<div>
			<ul>
				<?php Massage::flush(); ?>
			</ul>
		</div>
	</header>
