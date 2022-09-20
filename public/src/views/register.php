<?php

namespace view\register;

function index() {
?>
	<div class="g-title">
		<h1 class="g-title_name">過去の投稿</h1>
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
			<label>
				ニックネーム : <input type="text" name="nickname">
			</label>
		</div>
		<div>
			<p>
				<a href="<?php the_url('login'); ?>">ログインはこちら</a>
			</p>
			<button type="submit">登録</button>
		</div>
	</form>
<?php } ?>
