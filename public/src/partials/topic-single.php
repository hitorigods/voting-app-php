<?php

namespace partial;

use lib\Auth;

function topic_single($topic, $isFromHome) {
?>
	<div class="c-single">
		<div class="c-single_inner u-inner">
			<div class="c-single_column">
				<div class="c-single_visual">
					<?php topic_chart($topic); ?>
				</div>

				<div class="c-single_content">
					<?php topic_main($topic, $isFromHome); ?>
					<?php comment_form($topic); ?>
				</div>
			</div>
			<!--article-->
		</div>
	</div>
	<!--single-->
<?php
}

function topic_chart($topic) {
?>
	<canvas data-chart-likes="<?php echo $topic->likes; ?>" data-chart-dislikes=<?php echo $topic->dislikes; ?>" class="c-single_graph js-chart"></canvas>
	<style>
		.c-single_graph {
			width: 300px;
			height: 300px;
			background-color: #ddd;
		}
	</style>
<?php }

function topic_main($topic, $isFromHome) {
?>
	<div class="c-single_head">
		<?php if ($isFromHome) : ?>
			<h2 class="c-single_title">
				<a href="<?php the_url("topic/detail?topic_id={$topic->id}"); ?>">
					<?php echo $topic->title; ?>
				</a>
			</h2>
		<?php else : ?>
			<h1 class="c-single_title"><?php echo $topic->title; ?></h1>
		<?php endif; ?>
		<p class="c-single_note">
			<?php if (!empty($topic->nickname)) { ?>
				<span class="c-single_note_text">Posted by <?php echo $topic->nickname; ?></span>
			<?php } ?>
			<?php if (isset($topic->views)) { ?>
				<span class="c-single_note_text"><?php echo $topic->views; ?> views</span>
			<?php } ?>
		</p>
	</div>
	<div class="c-single_count c-counts c-counts--layout_single">
		<ul class="c-counts_items">
			<?php if (!empty($topic->likes)) { ?>
				<li class="c-counts_item c-counts_item--type_like">
					<div class="c-counts_box">
						<p class="c-counts_number"><?php echo $topic->likes; ?></p>
						<p class="c-counts_label">賛成</p>
					</div>
				</li>
			<?php } ?>
			<?php if (!empty($topic->dislikes)) { ?>
				<li class="c-counts_item c-counts_item--type_dislike">
					<div class="c-counts_box">
						<p class="c-counts_number"><?php echo $topic->dislikes; ?></p>
						<p class="c-counts_label">反対</p>
					</div>
				</li>
			<?php } ?>
		</ul>
	</div>
<?php
}

function comment_form($topic) {
?>
	<div class="c-single_form">
		<?php if (Auth::isLogin()) : ?>
			<h3 class="c-single_title2">あなたは賛成？それとも反対？</h3>
			<div class="c-form2">
				<form action="<?php echo the_url('topic/detail'); ?>" method="POST" class="c-form2_form">
					<input type="hidden" name="topic_id" value="<?php echo $topic->id; ?>">
					<div class="c-form2_block">
						<textarea name="" class="c-form2_textarea"></textarea>
					</div>
					<div class="c-form2_buttom">
						<div class="c-form2_radio c-radio">
							<ul class="c-radio_items">
								<li class="c-radio_item">
									<label class="c-radio_label">
										<input type="radio" name="" checked class="c-radio_input">
										<span class="c-radio_value">賛成</span>
									</label>
								</li>
								<li class="c-radio_item">
									<label class="c-radio_label">
										<input type="radio" name="" class="c-radio_input">
										<span class="c-radio_value">反対</span>
									</label>
								</li>
							</ul>
						</div>
						<div class="c-button2">
							<button class="c-form2_submit c-button2_box">
								<span class="c-button2_label">送信</span>
							</button>
						</div>
					</div>
				</form>
			</div>
			<!--form2-->
		<?php else : ?>
			<h3 class="c-single_title2">ログインしてアンケートに参加しよう！</h3>
			<p class="c-single_link c-button2">
				<a href="<?php echo the_url('login'); ?>" class="c-button2_box">
					<span class="c-button2_label">ログインはこちら</span>
				</a>
			</p>
		<?php endif; ?>
	</div>
<?php
}
?>
