<?php
	$factory = $modules->get('SfWebServices');

	if ($input->requestMethod('POST')) {
		header ("Content-Type:text/xml");
		$factory->process($page->service, $input);
		echo $factory->api['response']->get_xml();
	} else {
		$factory->init_endpoint($page->service);
		$page->body .= render_php("{$config->paths->templates}inc/services/form.php", $args = array('endpoint' => $factory->api['request'], 'page' => $page));
		include __DIR__ . "/basic-page.php";
	}
