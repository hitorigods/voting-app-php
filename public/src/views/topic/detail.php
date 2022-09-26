<?php

namespace view\topic\detail;

function index($topic, $comments) {
	$topic = escape($topic);
	$comments = escape($comments);
?>
	<div class="g-content">
		<?php
		\partial\topic_single($topic, false);
		?>
		<?php
		if (!empty($comments)) :
		?>
			<div class="c-list">
				<div class="c-list_inner u-inner">
					<ul class="c-list_items">
						<?php foreach ($comments as $comment) :
							$agreeLabel = $comment->agree ? '賛成' : '反対';
							$agreeType = $comment->agree ? 'enable' : 'disable';
						?>
							<li class="c-list_item">
								<div class="c-list_box">
									<div class="c-list_column">
										<div class="c-list_head">
											<p class="c-list_group c-list_group--type_<?php echo $agreeType; ?>"><?php echo $agreeLabel; ?></p>
											<h2 class="c-list_title"><?php echo $comment->body; ?></h2>
										</div>
										<div class="c-list_body">
											<?php if ($comment->user_id) : ?>
												<p class="c-list_text">by <strong><?php echo $comment->nickname; ?></strong></p>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<!--list-->
		<?php
		endif;
		?>
	</div>
	<!--content-->
<?php
}
?>
