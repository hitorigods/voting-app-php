<?php

namespace view\topic\edit;

function index($topic, $isEdit) {
	$pageTItle = $isEdit ? 'トピック編集' : 'トピック作成';

?>
	<div class="g-title">
		<div class="g-title_inner u-inner">
			<h1 class="g-title_name"><?php echo $pageTItle; ?></h1>
		</div>
	</div>
	<!--title-->

	<div class="g-content">
		<div class="c-form">
			<div class="c-form_inner u-inner">
				<div class="c-form_content">
					<div class="c-form_frame">
						<form action="<?php echo CURRENT_URI; ?>" method="POST" autocomplete="off" class="c-form_form js-validate">
							<input type="hidden" name="topic_id" value="<?php echo $topic->id; ?>">
							<div class="c-form_table c-table">
								<table class="c-table_table">
									<tbody class="c-table_tbody">
										<tr class="c-table_row">
											<th class="c-table_head">
												<span class="c-table_title">タイトル</span>
											</th>
											<td class="c-table_body">
												<label class="c-form_label">
													<span class="c-form_input c-input">
														<input type="text" name="title" value="<?php echo $topic->title; ?>" required maxlength="30" tabindex="1" autofocus class="c-input_input js-validate_target">
														<span class="c-form_error js-validate_error"></span>
													</span>
												</label>
											</td>
										</tr>
										<tr class="c-table_row">
											<th class="c-table_head">
												<span class="c-table_title">ステータス</span>
											</th>
											<td class="c-table_body">
												<span class="c-form_select c-select">
													<select name="published" tabindex="2" class="c-select_select">
														<option value="1" <?php echo $topic->published ? 'selected' : ''; ?>>公開</option>
														<option value="0" <?php echo $topic->published ? '' : 'selected'; ?>>非公開</option>
													</select>
												</span>
											</td>
										</tr>
									</tbody>
								</table>

								<div class="c-form_bottom">
									<p class="c-form_submit c-button c-button--type_submit">
										<button type="submit" tabindex="3" class="c-button_box">
											<span class="c-button_label">送信</span>
										</button>
									</p>
									<p class="c-form_link c-link c-link--layout_back">
										<a href="<?php the_url('topic/archive'); ?>" class="c-link_box">
											<span class="c-link_label">戻る</span>
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
<?php
}
?>
