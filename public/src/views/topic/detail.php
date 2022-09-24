<?php

namespace view\topic\detail;

function index($topic, $comments) {
	$topic = escape($topic);
	$comments = escape($comments);

	\partial\topic_single($topic, false);

	if (!empty($comments)) :
?>
		<div class="c-comments">
			<ul class="c-comments_items">
				<?php foreach ($comments as $comment) :
					$agreeLabel = $comment->agree ? '賛成' : '反対';
					$agreeType = $comment->agree ? 'agree' : 'disagree';
				?>
					<li class="c-comments_item">
						<div class="c-comments_box">
							<div class="c-comments_head">
								<p class="c-comments_type c-comments_group--type_<?php echo $agreeType; ?>"><?php echo $agreeLabel; ?></p>
								<?php if ($comment->body) : ?>
									<h2 class="c-comments_title"><?php echo $comment->body; ?></h2>
								<?php endif; ?>
							</div>
							<div class="c-comments_body">
								<?php if ($comment->user_id) : ?>
									<p class="c-comments_lead">Commented by <?php echo $comment->nickname; ?></p>
								<?php endif; ?>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<!--comments-->
<?php
	endif;
}
?>
