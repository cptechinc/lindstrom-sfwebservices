<?php
	if (!$user->isLoggedin() || !$user->has_portal()) {
		$session->redirect($pages->get('template=portal-user')->url, $http301 = false);
	} else {
		$template = str_replace('.php', '', $page->pw_template) . '.php';

		if (file_exists("./$template")) {
			include("./$template");
		} else {
			$page->body .= render_php("{$config->paths->templates}inc/util/alert.php", $args = array('type' => 'danger', 'title' => 'Error!', 'iconclass' => 'fa fa-warning fa-2x', 'message' => "Template $template does not exist"));
			include __DIR__ . "/basic-page.php";
		}
	}
