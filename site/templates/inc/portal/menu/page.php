<?php
	$page = $args['page'];
?>
<h3>Functions</h3>
<div class="list-group">
	<?php foreach ($page->children('template=portal-function') as $page) : ?>
		<a href="<?= $page->url; ?>" class="list-group-item list-group-item-action">
			<?= $page->title; ?>
		</a>
	<?php endforeach; ?>
</div>
