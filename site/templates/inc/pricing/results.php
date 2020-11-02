<?php
	$config = $args['config'];
	$page = $args['page'];
	$json = $args['json'];
	$quote = $json['quote'];
	$availability = $json['availability'];
?>
<h2>Quote Results</h2>
<hr>
<div class="form-group">
	<a href="<?= $page->url; ?>" class="btn btn-dark">New Quote</a>
</div>
<div class="row">
	<div class="col-sm-6">
		<?= render_php("{$config->paths->templates}inc/pricing/results/header.php", $args = array('quote' => $quote)); ?>
	</div>
	<div class="col-sm-6">
		<H3>Availability</H3>
		<?= render_php("{$config->paths->templates}inc/pricing/results/avail.php", $args = array('availability' => $json['availability'])); ?>
	</div>
</div>
