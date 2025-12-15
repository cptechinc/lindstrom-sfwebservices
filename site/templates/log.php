<?php

use ProcessWire\Page;
use ProcessWire\WireHttp;
use ProcessWire\WireInput;
use ProcessWire\WireLog;
use SfWebServices\Log\LogUtil;
use SfWebServices\Log\LoginLog;
use SfWebServices\Log\RequestLog;
use SfWebServices\Log\SessionLog;



/** @var Page $page */
/** @var WireInput $input */
/** @var WireLog $log */


$dpLog = new SessionLog();

if ($page->name == 'login') {
	$dpLog = new LoginLog();
}

if ($page->name == 'request') {
	$dpLog = new RequestLog();
}

$get = $input->get;

if ($get->offsetExists('prune')) {
	$log->prune($page->name, 365);
}

if ($get->offsetExists('download')) {
	$lines = $dpLog->logutil->fetchAllLines();
	$dir = $files->tempDir('download');
	$newFile = $dir->get() . $page->name . '.txt';
	$content = implode("\n", array_values($lines->getArray()));
	file_put_contents($newFile, $content);

	$http = new WireHttp();
	$http->sendFile($newFile, ['forceDownload' => true]);
	exit;
}

$lines = $dpLog->logutil->fetchLines();

$page->body .= render_php("{$config->paths->templates}inc/logs/$page->name/page.php", ['page' => $page, 'lines' => $lines, 'input' => $input, 'config' => $config, 'LOG' => $dpLog]);
$page->body .= render_php("{$config->paths->templates}inc/util/paginator.php", ['page' => $page, 'input' => $input, 'totalLogEntries' => $lines->data('totalCount')]);
include __DIR__ . "/basic-page.php";
