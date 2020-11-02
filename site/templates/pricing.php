<?php
	$factory = $modules->get('SfWebServices');
	$rm = strtolower($input->requestMethod());
	$values = $input->$rm;
	$page->service = 'createquote';

	if ($values->username) {
		$username = $input->post->text('username');
		$password = $input->post->text('password');
		$user     = $sanitizer->username($username);

		if ($session->login($user, $password)) {
			// login successful
			$session->remove('errormsg');
			$session->redirect($page->url);
		} else {
			$session->errormsg = 'Incorrect username or password';
			$session->redirect($page->url);
		}
	}

	if ($values->text('IDCLogin')) {
		$session->customerNumber = $values->customerNumber;
		$factory->process($page->service, $input);
		$json = $factory->api['response']->get_json();
		$page->body .= render_php("{$config->paths->templates}inc/pricing/results.php", $args = array('page' => $page, 'config' => $config, 'json' => $json['data']));
		include __DIR__ . "/basic-page.php";
	} else {
		if ($user->isLoggedin()) {
			$data = array(
				'IDCLogin'       => $user->name,
				'customerNumber' => $session->customerNumber ? $session->customerNumber : $user->customerNumber
			);
			$factory->init_endpoint($page->service);
			$page->body .= render_php("{$config->paths->templates}inc/pricing/form.php", $args = array('endpoint' => $factory->api['request'], 'page' => $page, 'data' => $data));
		} else {
			$page->body .= render_php("{$config->paths->templates}inc/login.php", $args = array('page' => $page, 'config' => $config, 'user' => $user, 'errormsg' => $session->errormsg));
		}

		include __DIR__ . "/basic-page.php";
	}
