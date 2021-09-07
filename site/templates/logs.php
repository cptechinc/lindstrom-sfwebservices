<?php
$page->body .= render_php("{$config->paths->templates}inc/logs/menu/page.php", $args = array('page' => $page));
include __DIR__ . "/basic-page.php";
