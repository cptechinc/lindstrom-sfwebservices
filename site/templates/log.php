<?php
$lines = $log->getLines($page->name, $options = []);
$page->body .= render_php("{$config->paths->templates}inc/logs/$page->name/page.php", $args = array('page' => $page, 'lines' => $lines));
$page->body .= render_php("{$config->paths->templates}inc/util/paginator.php", $args = array('page' => $page, 'input' => $input, 'totalLogEntries' => $log->getTotalEntries($page->name)));
include __DIR__ . "/basic-page.php";
