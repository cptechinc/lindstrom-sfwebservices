<?php include('./_head.php'); ?>
	<div class="jumbotron jumbotron-pagetitle">
		<h1 class="display-4"><?= $page->get('headline|title'); ?></h1>
	</div>
	<div class='container page pt-3'>
		<?= $page->body; ?>
	</div>
<?php include('./_foot.php'); ?>
