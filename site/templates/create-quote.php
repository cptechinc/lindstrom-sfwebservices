<?php
	$endpoint = $modules->get('CreateQuote');
	$endpoint->url = $page->url;

	echo $pages->get("template=service,service=$page->service")->url;

	//$page->body .= render_php("{$config->paths->templates}inc/quote/form.php", $args = array('endpoint' => $endpoint));

	//include __DIR__ . "/basic-page.php";
