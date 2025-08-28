<?php

use ProcessWire\Page;
use ProcessWire\WireHttp;
use ProcessWire\WireInput;
use ProcessWire\WireLog;

/** @var Page $page */
/** @var WireInput $input */
/** @var WireLog $log */

$get = $input->get;

$options = [];

if ($input->get->offsetExists('filter')) {
    $options = [
        'dateFrom' => $get->offsetExists('fromDate') ? strtotime($get->text('fromDate')) : 0,
        'dateTo'   => $get->offsetExists('toDate') ? strtotime($get->text('toDate')) : time(),
    ];
}

$lines = $log->getLines($page->name, $options);

$firstKeys = explode('/', array_keys($lines)[0]);

$totalLogEntries = $firstKeys[1];

$page->body .= render_php("{$config->paths->templates}inc/logs/$page->name/page.php", ['page' => $page, 'lines' => $lines, 'input' => $input, 'config' => $config]);
$page->body .= render_php("{$config->paths->templates}inc/util/paginator.php", ['page' => $page, 'input' => $input, 'totalLogEntries' => $totalLogEntries]);
include __DIR__ . "/basic-page.php";
