<?php

namespace view\topic\archive;

function index($topics) {
	$topics = escape($topics);
?>
	<div class="g-title">
		<div class="g-title_inner u-inner">
			<h1 class="g-title_name">過去の投稿</h1>
		</div>
	</div>
	<!--title-->

	<div class="c-list">
		<div class="c-list_inner u-inner">
			<?php if (count($topics) > 0) : ?>
				<ul class="c-list_items">
					<?php
					foreach ($topics as $topic) {
						$url = get_url("topic/edit?topic_id={$topic->id}");
						\partial\topic_article($topic, $url, true);
					}
					?>
				</ul>
			<?php else : ?>
				<div class="c-list_none">
					<p class="c-list_lead">トピックを投稿してみよう！</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<!--list-->
<?php

}
