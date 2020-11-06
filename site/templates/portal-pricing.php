<?php
	$factory = $modules->get('SfWebServices');
	$rm = strtolower($input->requestMethod());
	$values = $input->$rm;
	$page->service = $page->apiservice;

	if ($values->text('IDCLogin')) {
		$session->customerNumber = $values->customerNumber;
		$factory->process($page->service, $input);
		$json = $factory->api['response']->get_json();
		$page->body .= render_php("{$config->paths->templates}inc/pricing/results.php", $args = array('page' => $page, 'config' => $config, 'json' => $json['data']));
		include __DIR__ . "/basic-page.php";
	} else {
		$data = array(
			'IDCLogin'       => $user->name,
			'customerNumber' => $session->customerNumber ? $session->customerNumber : $user->customerNumber
		);
		$factory->init_endpoint($page->service);
		$page->body .= render_php("{$config->paths->templates}inc/portal/pricing/form.php", $args = array('endpoint' => $factory->api['request'], 'page' => $page, 'config' => $config, 'data' => $data));

		include __DIR__ . "/basic-page.php";
	}
