<h1>LOGIN</h1>

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
		<button type="submit">ログイン</button>
	</div>
</form>
