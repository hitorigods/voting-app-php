<?php

namespace view\topic\edit;

function index($topic, $isEdit) {
	$pageTItle = $isEdit ? 'トピック編集' : 'トピック作成';

?>
	<div class="g-title">
		<h1 class="g-title_name"><?php echo $pageTItle; ?></h1>
	</div>

	<div class="g-form">
		<form action="<?php echo CURRENT_URI; ?>" method="POST">
			<input type="hidden" name="topic_id" value="<?php echo $topic->id; ?>">
			<div>
				<label>
					タイトル : <input type="text" name="title" value="<?php echo $topic->title; ?>">
				</label>
			</div>
			<div>
				<label>
					ステータス : <select name="published">
						<option value="1" <?php echo $topic->published ? 'selected' : ''; ?>>公開</option>
						<option value="0" <?php echo $topic->published ? '' : 'selected'; ?>>非公開</option>
					</select>
				</label>
			</div>
			<div>
				<button type="submit">送信</button>
			</div>
			<div>
				<a href="<?php the_url('topic/archive'); ?>">戻る</a>
			</div>
	</div>
<?php
}
?>
