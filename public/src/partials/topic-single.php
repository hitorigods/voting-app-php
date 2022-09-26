<?php

namespace partial;

use lib\Auth;

function topic_single($topic, $isFromHome) {
?>
	<section class="c-single">
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
		</div>
	</section>
	<!--single-->
<?php
}

function topic_chart($topic) {
?>
	<canvas data-graph-likes="<?php echo $topic->likes; ?>" data-graph-dislikes="<?php echo $topic->dislikes; ?>" class="c-single_graph js-graph"></canvas>
<?php }

function topic_main($topic, $isFromHome) {
?>
	<div class="c-single_head">
		<div class="c-single_title c-heading">
			<?php if ($isFromHome) : ?>
				<a href="<?php the_url("topic/detail?topic_id={$topic->id}"); ?>" class="c-heading_box">
					<h2 class="c-heading_name"><?php echo $topic->title; ?></h2>
				</a>
			<?php else : ?>
				<div href="<?php the_url("topic/detail?topic_id={$topic->id}"); ?>" class="c-heading_box">
					<h1 class="c-heading_name"><?php echo $topic->title; ?></h1>
				</div>
			<?php endif; ?>
		</div>
		<!--heading-->
		<p class="c-single_note">
			<?php if (!empty($topic->nickname)) { ?>
				<span class="c-single_text">by <?php echo $topic->nickname; ?></span>
			<?php } ?>
			<?php if (isset($topic->views)) { ?>
				<span class="c-single_text"><strong class="c-single_number"><?php echo $topic->views; ?></strong> views</span>
			<?php } ?>
		</p>
	</div>
	<div class="c-single_count c-counts c-counts--layout_single">
		<ul class="c-counts_items">
			<li class="c-counts_item c-counts_item--type_like">
				<div class="c-counts_box">
					<p class="c-counts_number"><?php echo (!empty($topic->likes)) ? $topic->likes : 0; ?></p>
					<p class="c-counts_label">賛成</p>
				</div>
			</li>
			<li class="c-counts_item c-counts_item--type_dislike">
				<div class="c-counts_box">
					<p class="c-counts_number"><?php echo (!empty($topic->dislikes)) ? $topic->dislikes : 0; ?></p>
					<p class="c-counts_label">反対</p>
				</div>
			</li>
		</ul>
	</div>
	<!--counts-->
<?php
}

function comment_form($topic) {
?>
	<div class="c-single_bottom">
		<?php if (Auth::isLogin()) : ?>
			<div class="c-single_title2 c-heading2">
				<div class="c-heading2_label">
					<h3 class="c-heading2_name">あなたは賛成？それとも反対？</h3>
				</div>
			</div>
			<!--heading2-->
			<div class="c-single_form c-form">
				<form action="<?php echo the_url('topic/detail'); ?>" method="POST" autocomplete="off" class="c-form_form js-validate">
					<input type="hidden" name="topic_id" value="<?php echo $topic->id; ?>">

					<div class="c-form_block">
						<div class="c-form_textarea c-textarea">
							<textarea name="body" rows="5" maxlength="100" class="c-textarea_textarea"></textarea>
						</div>
						<div class="c-form_radio c-radio">
							<ul class="c-radio_items">
								<li class="c-radio_item">
									<label class="c-radio_label">
										<input type="radio" name="agree" value="1" required checked class="c-radio_input">
										<span class="c-radio_icon"></span>
										<span class="c-radio_name">賛成</span>
									</label>
								</li>
								<li class="c-radio_item">
									<label class="c-radio_label">
										<input type="radio" name="agree" value="0" required class="c-radio_input">
										<span class="c-radio_icon"></span>
										<span class="c-radio_name">反対</span>
									</label>
								</li>
							</ul>
						</div>
						<div class="c-single_submit">
							<p class="c-single_button c-button">
								<button type="submit" class="c-button_box">
									<span class="c-button_label">送信</span>
								</button>
							</p>
						</div>
					</div>
				</form>
			</div>
			<!--form2-->
		<?php else : ?>
			<div class="c-single_title2 c-heading2">
				<div class="c-heading2_label">
					<h3 class="c-heading2_name">ログインして<br class="u-show_media">アンケートに参加しよう！
					</h3>
				</div>
			</div>
			<!--heading2-->
			<div class="c-single_submit">
				<p class="c-single_button c-button">
					<a href="<?php echo the_url('login'); ?>" class="c-button_box">
						<span class="c-button_label">ログインはこちら</span>
					</a>
				</p>
			</div>
		<?php endif; ?>
	</div>
<?php
}
?>
