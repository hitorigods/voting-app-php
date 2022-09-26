<?php

namespace view\home;

function index($topics) {
	$topics = escape($topics);
	$topic = array_shift($topics);
?>
	<div class="g-title">
		<div class="g-title_inner u-inner">
			<h1 class="g-title_name">投票アプリ</h1>
		</div>
	</div>
	<!--title-->

	<div class="g-content">
		<?php
		\partial\topic_single($topic, true);
		?>
		<div class="c-list">
			<div class="c-list_inner u-inner">
				<?php if (count($topics) > 0) : ?>
					<ul class="c-list_items">
						<?php
						foreach ($topics as $topic) {
							$url = get_url("topic/detail?topic_id={$topic->id}");
							\partial\topic_article($topic, $url, false);
						}
						?>
					</ul>
				<?php else : ?>
					<div class="c-list_none">
						<p class="c-list_lead">トピックを投稿してみよう。</p>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<!--list-->
	</div>
	<!--content-->
<?php } ?>
