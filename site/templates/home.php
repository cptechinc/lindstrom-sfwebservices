<?php $session->redirect($pages->get('/tests/')->url); ?>

<?php include('./_head.php'); ?>
	<div class='container page pt-3'>
		<?php if ($page->show_title) : ?>
			<h2><?= $page->get('headline|title'); ?></h2>
		<?php endif; ?>
		<?= $page->body; ?>
	</div>
<?php include('./_foot.php'); ?>
