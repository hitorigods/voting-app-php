<?php

namespace view\login;

function index() {
?>
	<div class="g-title">
		<div class="g-title_inner u-inner">
			<h1 class="g-title_name">ログイン</h1>
		</div>
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
					<div class="c-form_bottom">
						<button type="submit" tabindex="3" class="c-form_submit c-button c-button--type_submit">
							<span class="c-button_label">ログイン</span>
						</button>
						<p class="c-form_link c-link">
							<a href="<?php the_url('register'); ?>" class="c-link_box">
								<span class="c-link_label">アカウント登録はこちら</span>
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
