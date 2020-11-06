<?php
	$page->hidenav = true;

	if (!$user->isLoggedin() || !$user->has_portal()) {
		$session->redirect($pages->get('template=portal-user')->url, $http301 = false);
	} else {
		$page->body .= render_php("{$config->paths->templates}inc/portal/menu/page.php", $args = array('page' => $page, 'config' => $config));
		include __DIR__ . "/basic-page.php";
	}
