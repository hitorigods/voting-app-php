<?php

namespace view\register;

function index() {
?>
	<div class="g-title">
		<h1 class="g-title_name">新規登録</h1>
	</div>
	<!--title-->

	<div class="g-content">
		<div class="c-form">
			<div class="c-form_inner u-inner">
				<form action="<?php echo CURRENT_URI; ?>" method="POST" autocomplete="off" class="c-form_form js-validate">
					<div class="c-form_block">
						<div class="c-form_cell">
							<label class="c-form_label">
								<span class="c-form_title">ユーザーID</span>
								<span class="c-form_input c-input">
									<input type="text" name="id" required minlength="4" maxlength="20" pattern="[a-zA-Z0-9]+" tabindex="1" autofocus class="c-input_input js-validate_target">
									<span class="c-input_error js-validate_error"></span>
									<span class="c-input_note">※半角英数字</span>
								</span>
							</label>
						</div>
					</div>
					<div class="c-form_block">
						<div class="c-form_cell">
							<label class="c-form_label">
								<span class="c-form_title">パスワード</span>
								<span class="c-form_input c-input">
									<input type="password" name="pwd" required minlength="4" pattern="[a-zA-Z0-9]+" tabindex="2" class="c-input_input js-validate_target">
									<span class="c-input_error js-validate_error"></span>
									<span class="c-input_note">※半角英数字</span>
								</span>
							</label>
						</div>
					</div>
					<div class="c-form_block">
						<div class="c-form_cell">
							<label class="c-form_label">
								<span class="c-form_title">ニックネーム</span>
								<span class="c-form_input c-input">
									<input type="text" name="nickname" required tabindex="3" maxlength="20" class="c-input_input js-validate_target">
									<span class="c-input_error js-validate_error"></span>
								</span>
							</label>
						</div>
					</div>
					<div class="c-form_bottom">
						<button type="submit" tabindex="4" class="c-form_submit c-button c-button--type_submit">
							<span class="c-button_label">登録</span>
						</button>
						<p class="c-form_link c-link">
							<a href="<?php the_url('login'); ?>" class="c-link_box">
								<span class="c-link_label">ログインはこちら</span>
							</a>
						</p>
					</div>
				</form>
			</div>
		</div>
		<!--form-->
	</div>
	<!--content-->
<?php } ?>
