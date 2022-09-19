<h1>REGISTER</h1>

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
		<button type="submit">登録</button>
	</div>
</form>
