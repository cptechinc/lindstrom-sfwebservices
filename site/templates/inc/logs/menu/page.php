<?php
	$page = $args['page'];
?>
<h3>Logs</h3>
<div class="list-group">
	<?php foreach ($page->children('template=log') as $page) : ?>
		<a href="<?= $page->url; ?>" class="list-group-item list-group-item-action">
			<?= $page->title; ?>
		</a>
	<?php endforeach; ?>
</div>
