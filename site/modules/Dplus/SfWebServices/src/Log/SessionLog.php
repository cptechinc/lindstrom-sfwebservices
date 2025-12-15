<?php namespace SfWebServices\Log;
// ProcessWire
use ProcessWire\WireData;

/**
 * @property LogUtil $logutil
 */
class SessionLog extends WireData {

    public function __construct() {
        $this->logutil = new LogUtil();
        $this->logutil->logname = 'session';
        $this->logutil->init();
    }
}