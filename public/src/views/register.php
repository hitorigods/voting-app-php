<?php

namespace view\register;

function index() {
?>
	<div class="g-title">
		<div class="g-title_inner u-inner">
			<h1 class="g-title_name">新規登録</h1>
		</div>
	</div>
	<!--title-->

	<div class="g-content">
		<div class="c-form">
			<div class="c-form_inner u-inner">
				<div class="c-form_content">
					<div class="c-form_frame">
						<form action="<?php echo CURRENT_URI; ?>" method="POST" autocomplete="off" class="c-form_form js-validate">
							<div class="c-form_table c-table">
								<table class="c-table_table">
									<tbody class="c-table_tbody">
										<tr class="c-table_row">
											<th class="c-table_head">
												<span class="c-table_title">ユーザーID</span>
											</th>
											<td class="c-table_body">
												<label class="c-form_label">
													<span class="c-form_input c-input">
														<input type="text" name="id" required minlength="4" maxlength="20" pattern="[a-zA-Z0-9]+" tabindex="1" autofocus class="c-input_input js-validate_target">
														<span class="c-form_error js-validate_error"></span>
														<span class="c-form_note">※半角英数字</span>
													</span>
												</label>
											</td>
										</tr>
										<tr class="c-table_row">
											<th class="c-table_head">
												<span class="c-table_title">パスワード</span>
											</th>
											<td class="c-table_body">
												<label class="c-form_label">
													<span class="c-form_input c-input">
														<input type="password" name="pwd" required minlength="4" pattern="[a-zA-Z0-9]+" tabindex="2" class="c-input_input js-validate_target">
														<span class="c-form_error js-validate_error"></span>
														<span class="c-form_note">※半角英数字</span>
													</span>
												</label>
											</td>
										</tr>
										<tr class="c-table_row">
											<th class="c-table_head">
												<span class="c-table_title">ニックネーム</span>
											</th>
											<td class="c-table_body">
												<label class="c-form_label">
													<span class="c-form_input c-input">
														<input type="text" name="nickname" required tabindex="3" maxlength="20" class="c-input_input js-validate_target">
														<span class="c-form_error js-validate_error"></span>
														<span class="c-form_note">※半角英数字</span>
													</span>
												</label>
											</td>
										</tr>
										<div class="c-form_block">
									</tbody>
								</table>

								<div class="c-form_bottom">
									<p class="c-form_submit c-button c-button--type_submit">
										<button type="submit" tabindex="4" class="c-button_box">
											<span class="c-button_label">登録</span>
										</button>
									</p>
									<p class="c-form_link c-link">
										<a href="<?php the_url('login'); ?>" class="c-link_box">
											<span class="c-link_label">ログインはこちら</span>
										</a>
									</p>
								</div>
							</div>
							<!--table-->
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--form-->
	</div>
	<!--content-->
<?php } ?>
