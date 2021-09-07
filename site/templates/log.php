<?php
$lines = $log->getLines($page->name, $options = []);
$page->body .= render_php("{$config->paths->templates}inc/logs/$page->name/page.php", $args = array('page' => $page, 'lines' => $lines));
include __DIR__ . "/basic-page.php";
