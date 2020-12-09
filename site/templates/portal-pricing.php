<?php
	$factory = $modules->get('SfWebServices');
	$factory->authtypePortal();
	$rm = strtolower($input->requestMethod());
	$values = $input->$rm;
	$page->service = $page->apiservice;

	if ($values->text('IDCLogin')) {
		$factory->process($page->service, $input);
		$json = $factory->api['response']->get_json();
		$json['customer'] = $modules->get('QueryCustomer')->getCustomer($user->customerNumber);
		$page->body .= render_php("{$config->paths->templates}inc/portal/pricing/results.php", $args = array('page' => $page, 'config' => $config, 'json' => $json));
	} else {
		$data = array(
			'IDCLogin'       => $user->name,
			'IDCPassword'    => $session->password,
			'customerNumber' => $user->customerNumber,
			'requestUOM'     => 'EA'
		);
		$factory->init_endpoint($page->service);
		$page->body .= render_php("{$config->paths->templates}inc/portal/pricing/form.php", $args = array('endpoint' => $factory->api['request'], 'page' => $page, 'config' => $config, 'data' => $data));
	}

	include __DIR__ . "/basic-page.php";
