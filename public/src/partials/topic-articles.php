<?php

namespace partial;

function topic_article($topic, $url, $withStatus = false) {
	$publishedLabel = $topic->published ? '公開' : '非公開';
	$publishedType = $topic->published ? 'open' : 'close';
?>
	<li class="c-articles_item">
		<?php if ($url) {
			echo "<a href='{$url}' class='c-articles_box'>";
		} else {
			echo '<div class="c-articles_box">';
		}
		?>
		<div class="c-articles_head">
			<?php if ($withStatus && isset($topic->published)) : ?>
				<p class="c-articles_group c-articles_group--type_<?php echo $publishedType; ?>"><?php echo $publishedLabel; ?></p>
			<?php endif; ?>
			<?php if (!empty($topic->title)) { ?>
				<h2 class="c-articles_title"><?php echo $topic->title; ?></h2>
			<?php } ?>
		</div>
		<div class="c-articles_body">
			<div class="c-articles_count c-counts">
				<ul class="c-counts_items">
					<?php if (!empty($topic->views)) { ?>
						<li class="c-counts_item c-counts_item--type_view">
							<div class="c-counts_box">
								<p class="c-counts_number"><?php echo $topic->views; ?></p>
								<p class="c-counts_label">Views</p>
							</div>
						</li>
					<?php } ?>
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
			<!--counts-->
		</div>
		<?php if ($url) {
			echo '</a>';
		} else {
			echo '</div>';
		}
		?>
	</li>
<?php } ?>
