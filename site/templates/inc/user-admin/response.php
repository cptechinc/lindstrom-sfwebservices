<?php
	foreach ($args as $variable => $value) {
		$$variable = $value;
	}
	$type  = $response->has_success() ? 'success' : 'danger';
	$title = $response->has_success() ? 'Success!' : 'Error!';
	$title = $response->has_success() ? 'Success!' : 'Error!';
	$icon  = $response->has_success() ? 'fa-floppy-o text-dark' : 'fa-warning';
?>
<?= render_php("{$config->paths->templates}inc/util/alert.php", $args = array('type' => $type, 'title' => $title, 'iconclass' => "fa $icon fa-2x", 'message' => $response->message)); ?>
