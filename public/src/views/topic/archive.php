<?php

namespace view\topic\archive;

function index($topics) {
	$topics = escape($topics);
?>
	<div class="g-title">
		<h1 class="g-title_name">過去の投稿</h1>
	</div>

	<div class="c-articles">
		<?php if (count($topics) > 0) : ?>
			<ul class="c-articles_items">
				<?php
				foreach ($topics as $topic) {
					$url = get_url("topic/edit?topic_id={$topic->id}");
					\partial\topic_article($topic, $url, true);
				}
				?>
			</ul>
		<?php else : ?>
			<div class="c-articles_none">
				<p class="c-articles_lead">トピックを投稿してみよう。</p>
			</div>
		<?php endif; ?>
	</div>
<?php

}
