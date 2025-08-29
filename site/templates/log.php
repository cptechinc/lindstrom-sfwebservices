<?php

use ProcessWire\Page;
use ProcessWire\WireHttp;
use ProcessWire\WireInput;
use ProcessWire\WireLog;

/** @var Page $page */
/** @var WireInput $input */
/** @var WireLog $log */

$get = $input->get;

if ($get->offsetExists('prune')) {
    $log->prune($page->name, 365);
}

$options = [];

if ($input->get->offsetExists('filter')) {
    $options = [
        'dateFrom' => $get->offsetExists('fromDate') ? strtotime($get->text('fromDate')) : 0,
        'dateTo'   => $get->offsetExists('toDate') ? strtotime($get->text('toDate')) : time(),
    ];
}

$lines = $log->getLines($page->name, $options);

if ($get->offsetExists('download')) {
    $options['limit'] = 0;
    $lines = $log->getLines($page->name, $options);
    $dir = $files->tempDir('download');
    $newFile = $dir->get() . $page->name . '.txt';
    $content = implode("\n", array_values($lines));
    file_put_contents($newFile, $content);

    $http = new WireHttp();
    $http->sendFile($newFile, ['forceDownload' => true]);
    exit;
}

$totalLogEntries = 0;

if (count($lines) > 0) {
    $firstKeys = explode('/', array_keys($lines)[0]);

    $totalLogEntries = $firstKeys[1];
}


$page->body .= render_php("{$config->paths->templates}inc/logs/$page->name/page.php", ['page' => $page, 'lines' => $lines, 'input' => $input, 'config' => $config]);
$page->body .= render_php("{$config->paths->templates}inc/util/paginator.php", ['page' => $page, 'input' => $input, 'totalLogEntries' => $totalLogEntries]);
include __DIR__ . "/basic-page.php";
