<?php
	$page   = $args['page'];
	$config = $args['config'];
	$json   = $args['json'];

	if ($json['error']) {
		$body = render_php("{$config->paths->templates}inc/portal/pricing/results/error.php", $args);
	} else {
		$args['json'] = $json['data'];
		$args['customer'] = $json['customer'];
		$body = render_php("{$config->paths->templates}inc/portal/pricing/results/success.php", $args);
	}
?>

<div class="row">
	<div class="col-sm-4">
		<img src="<?= $config->applogo->url; ?>" alt="">
	</div>
	<div class="col-sm-8">.
		<?= $body; ?>
	</div>
</div>
