<?php namespace SfWebServices\Log;

use ProcessWire\WireData;
use ProcessWire\WireArray;
use ProcessWire\WireLog;
use SfWebServices\Log\Data\LogRecordList;

/**
 * @property WireLog $log
 * @property string  $logname
 * @property array   $options
 */
class LogUtil extends WireData {
    public function __construct() {
        $this->log = $this->wire('log');
        $this->logname = '';
        $this->options = [];
        $this->init();
    }


/* =============================================================
    Inits
============================================================= */
    public function init() {
        $this->initOptions();
    }

    private function initOptions() {
        $input = $this->input;

        if ($input->get->offsetExists('filter') === false) {
            $this->options = [];
            return;
        }
        $options = [
            'dateFrom' => $this->parseDateFrom(),
            'dateTo'   => $this->parseDateTo(),
        ];
        $this->options = $options;
    }

/* =============================================================
    Fetching
============================================================= */
    public function fetchLines() {
        return $this->parseLogLines($this->fetchLogLines($this->options));
    }

    public function fetchAllLines() {
        $options = $this->options;
        $options['limit'] = 0;
        return $this->parseLogLines($this->fetchLogLines($options));
    }

    private function parseLogLines(array $lines) {
        $list = new LogRecordList();
        $list->setArray(($lines));
        $list->data('totalCount', $list->count());

        if ($list->count() > 0) { // Parse Total Count from First item's key
            $keys = explode('/', $list->getKeys()[0]);
            $list->data('totalCount', $keys[1]);
        }
        return $list;
    }

    private function fetchLogLines(array $options) {
        return $this->log->getLines($this->logname, $options);
    }

/* =============================================================
    Options Parsing
============================================================= */
    private function parseDateFrom() {
        return $this->input->get->offsetExists('fromDate') ? strtotime($this->input->get->text('fromDate')) : 0;
    }

    private function parseDateTo() {
        $date = $this->input->get->offsetExists('toDate') ? date('m/d/Y', strtotime($this->input->get->text('toDate'))) : date('m/d/Y');
        $datetime = strtotime($date);
        $timestamp = mktime(11, 59, 59, date('m', $datetime), date('d', $datetime), date('Y', $datetime));
        return $timestamp;
    }

}