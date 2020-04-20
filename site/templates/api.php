<?php
	$page->body .= render_php("{$config->paths->templates}inc/menu/list.php", $args = array('items' => $page->children));
	include __DIR__ . "/basic-page.php";
