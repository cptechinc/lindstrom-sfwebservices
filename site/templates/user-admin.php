<?php
	$html = $modules->get('HtmlWriter');

	if (!$user->isLoggedin()) {
		$session->navigate = 'template=user-admin';
		$session->redirect($pages->get('template=login')->url);
	}

	if ($user->hasRole('user-admin')) {
		$admin = $modules->get('SfWebServicesUserAdmin');

		if ($input->requestMethod('POST')) {
			$admin->process_input($input);
		}

		if ($session->useradmin_response_auth) {
			$page->body .= render_php("{$config->paths->templates}inc/user-admin/response.php", $args = array('page' => $page, 'config' => $config, 'response' => $session->useradmin_response_auth));
			$page->body .= $html->div('class=mb-3');
			$session->remove('useradmin_response_auth');
		}

		if ($session->useradmin_response_production) {
			$page->body .= render_php("{$config->paths->templates}inc/user-admin/response.php", $args = array('page' => $page, 'config' => $config, 'response' => $session->useradmin_response_production));
			$page->body .= $html->div('class=mb-3');
			$session->remove('useradmin_response_production');
		}

		if ($session->useradmin_response_access_api) {
			$page->body .= render_php("{$config->paths->templates}inc/user-admin/response.php", $args = array('page' => $page, 'config' => $config, 'response' => $session->useradmin_response_access_api));
			$page->body .= $html->div('class=mb-3');
			$session->remove('useradmin_response_access_api');
		}

		if ($session->useradmin_response_access_portal) {
			$page->body .= render_php("{$config->paths->templates}inc/user-admin/response.php", $args = array('page' => $page, 'config' => $config, 'response' => $session->useradmin_response_access_portal));
			$page->body .= $html->div('class=mb-3');
			$session->remove('useradmin_response_access_portal');
		}

		if ($input->get->user) {
			$userID = $input->get->text('user');
			$edituser = $users->get("name=$userID");
			$page->headline = "Editing User $userID";
			$page->body .= render_php("{$config->paths->templates}inc/user-admin/user-forms.php", $args = array('page' => $page, 'user' => $edituser));
		} elseif ($input->get->add) {
			$page->headline = "Adding New Webservice User";
			$page->body .= render_php("{$config->paths->templates}inc/user-admin/new.php", $args = array('page' => $page));
			$page->js .= render_php("{$config->paths->templates}inc/user-admin/new.js.php", $args = array());
		} else {
			$apiusers = $admin->get_users_webservice();
			$page->body .= render_php("{$config->paths->templates}inc/user-admin/list.php", $args = array('page' => $page, 'users' => $apiusers));
		}
	} else {
		$page->body .= render_php("{$config->paths->templates}inc/util/alert.php", $args = array('type' => 'danger', 'title' => 'Error!', 'iconclass' => 'fa fa-warning fa-2x', 'message' => 'You do not have permission to adminstrate users'));
	}
	include __DIR__ . "/basic-page.php";
