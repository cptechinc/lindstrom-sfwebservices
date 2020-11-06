<?php
	if ($user->isLoggedIn()) {
		if ($user->has_portal()) {
			$session->redirect($page->parent->url, $http301 = false);
		} else {
			$page->body .= render_php("{$config->paths->templates}inc/util/alert.php", $args = array('type' => 'danger', 'title' => 'Error!', 'iconclass' => 'fa fa-warning fa-2x', 'message' => "You don't have Permissions to this App"));
			include __DIR__ . "/basic-page.php";
		}
	} else {
		$page->body .= render_php("{$config->paths->templates}inc/login.php", $args = array('page' => $page, 'config' => $config, 'user' => $user, 'errormsg' => $session->errormsg));
		include __DIR__ . "/basic-page.php";
	}
