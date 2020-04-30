<?php
	if ($input->get->logout) {
		$session->logout();
		$session->redirect($page->url);
	}

	if ($user->isLoggedin()) {
		$session->redirect($pages->get('/')->url);
	}

	if ($input->requestMethod('POST')) {
		$username = $input->post->text('username');
		$password = $input->post->text('password');
		$user = $sanitizer->username($username);

		if ($session->login($user, $password)) {
			// login successful
			$session->remove('errormsg');
			$session->redirect($pages->get('/')->url);
		} else {
			$session->errormsg = 'Incorrect username or password';
			$session->redirect($page->url);
		}
	}
	$page->body .= render_php("{$config->paths->templates}inc/login.php", $args = array('page' => $page, 'config' => $config, 'user' => $user, 'errormsg' => $session->errormsg));
	include __DIR__ . "/blank-page.php";
