<?php

namespace view\home;

function index($topics) {
	$topics = escape($topics);
	$topic = array_shift($topics);
?>
	<div class="g-title">
		<h1 class="g-title_name">投票アプリ</h1>
	</div>
	<?php
	\partial\topic_single($topic, true);
	?>
	<div class="c-articles">
		<?php if (count($topics) > 0) : ?>
			<ul class="c-articles_items">
				<?php
				foreach ($topics as $topic) {
					$url = get_url("topic/detail?topic_id={$topic->id}");
					\partial\topic_article($topic, $url, false);
				}
				?>
			</ul>
		<?php else : ?>
			<div class="c-articles_none">
				<p class="c-articles_lead">トピックを投稿してみよう。</p>
			</div>
		<?php endif; ?>
	</div>
<?php } ?>
