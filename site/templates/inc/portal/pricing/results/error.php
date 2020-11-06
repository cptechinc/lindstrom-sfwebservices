<?php
	$config = $args['config'];
	$page = $args['page'];
	$json = $args['json'];
	echo render_php("{$config->paths->templates}inc/util/alert.php", $args = array('type' => 'danger', 'title' => 'Error!', 'iconclass' => 'fa fa-warning fa-2x', 'message' => $json['message']));
?>
<hr>
<div class="form-group">
	<a href="<?= $page->url; ?>" class="btn btn-dark">New Quote</a>
</div>
