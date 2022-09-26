<?php

namespace partial;

function topic_article($topic, $url, $withStatus = false) {
	$publishedLabel = $topic->published ? '公開' : '非公開';
	$publishedType = $topic->published ? 'enable' : 'disable';
?>
	<li class="c-list_item">
		<?php if ($url) {
			echo "<a href='{$url}' class='c-list_box'>";
		} else {
			echo '<div class="c-list_box">';
		}
		?>
		<div class="c-list_column">
			<div class="c-list_head">
				<?php if ($withStatus && isset($topic->published)) : ?>
					<p class="c-list_group c-list_group--type_<?php echo $publishedType; ?>"><?php echo $publishedLabel; ?></p>
				<?php endif; ?>
				<?php if (!empty($topic->title)) { ?>
					<h2 class="c-list_title"><?php echo $topic->title; ?></h2>
				<?php } ?>
			</div>
			<div class="c-list_body">
				<div class="c-list_count c-counts c-counts--size_small">
					<ul class="c-counts_items">
						<li class="c-counts_item c-counts_item--type_view">
							<div class="c-counts_box">
								<p class="c-counts_number"><?php echo (!empty($topic->views)) ? $topic->views : 0; ?></p>
								<p class="c-counts_label">Views</p>
							</div>
						</li>
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
			</div>
		</div>
		<?php if ($url) {
			echo '</a>';
		} else {
			echo '</div>';
		}
		?>
	</li>
<?php } ?>
