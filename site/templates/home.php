<?php
	$html = $modules->get('HtmlWriter');
	$page->body = $html->h2('', 'Test API');
	$page->body .= render_php("{$config->paths->templates}inc/menu/list.php", $args = array('items' => $pages->get('template=api, name=tests')->children()));
	include __DIR__ . "/basic-page.php";
