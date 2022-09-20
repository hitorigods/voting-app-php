<?php

namespace view\login;

function index() {
?>
	<div class="g-title">
		<h1 class="g-title_name">ログイン</h1>
	</div>

	<form action="<?php echo CURRENT_URI; ?>" method="POST">
		<div>
			<label>
				ユーザーID : <input type="text" name="id">
			</label>
		</div>
		<div>
			<label>
				パスワード : <input type="password" name="pwd">
			</label>
		</div>
		<div>
			<p>
				<a href="<?php the_url('register'); ?>">アカウント登録はこちら</a>
			</p>
			<button type="submit">ログイン</button>
		</div>
	</form>
<?php } ?>
