<?php include('./_head.php'); ?>
	<div class='container page pt-3'>
		<h2><?= $page->get('headline|title'); ?></h2>
		<?= $page->body; ?>
	</div>
<?php include('./_foot.php'); ?>
