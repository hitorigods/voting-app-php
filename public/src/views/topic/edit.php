<?php

namespace view\topic\edit;

function index($topic, $isEdit) {
	$pageTItle = $isEdit ? 'トピック編集' : 'トピック作成';

?>
	<div class="g-title">
		<h1 class="g-title_name"><?php echo $pageTItle; ?></h1>
	</div>

	<div class="g-form">
		<div class="c-form_inner u-inner">
			<form action="<?php echo CURRENT_URI; ?>" method="POST" autocomplete="off" class="c-form_form js-validate">
				<input type="hidden" name="topic_id" value="<?php echo $topic->id; ?>">
				<div class="c-form_block">
					<div class="c-form_cell">
						<label class="c-form_label">
							<span class="c-form_title">タイトル</span>
							<span class="c-form_input c-input">
								<input type="text" name="title" value="<?php echo $topic->title; ?>" required maxlength="30" tabindex="1" autofocus class="c-input_input js-validate_target">
								<span class="c-input_error js-validate_error"></span>
								<span class="c-input_note">※半角英数字</span>
							</span>
						</label>
					</div>
				</div>
				<div class="c-form_block">
					<div class="c-form_cell">
						<label class="c-form_label">
							<span class="c-form_title">ステータス</span>
							<span class="c-form_select c-select">
								<select name="published" tabindex="2" class="c-select_select">
									<option value="1" <?php echo $topic->published ? 'selected' : ''; ?>>公開</option>
									<option value="0" <?php echo $topic->published ? '' : 'selected'; ?>>非公開</option>
								</select>
							</span>
						</label>
					</div>
				</div>
				<div class="c-form_bottom">
					<button type="submit" tabindex="3" class="c-form_submit c-button c-button--type_submit">
						<span class="c-button_label">送信</span>
					</button>
					<p class="c-form_link c-link">
						<a href="<?php the_url('topic/archive'); ?>" class="c-link_box">
							<span class="c-link_label">戻る</span>
						</a>
					</p>
				</div>
			</form>
		</div>
	</div>
	<!--form-->
<?php
}
?>
