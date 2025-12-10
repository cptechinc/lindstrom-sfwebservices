<?php namespace SfWebServices\Log;
// ProcessWire
use ProcessWire\WireData;
// SfWebServices
use SfWebServices\Log\Data\RequestRecord as Record;

/**
 * @property LogUtil $logutil
 */
class RequestLog extends WireData {

    public function __construct() {
        $this->logutil = new LogUtil();
        $this->logutil->logname = 'request';
        $this->logutil->init();
    }

    /**
     * @param  string $entry
     * @return Record
     */
    public function parseLogRecord($entry) {
        $data = explode("\t", $entry);

        $r = new Record();
        $r->timestamp = $data[0];
        $r->username  = $data[1];

        $logData = explode("|", $data[2]);

        $r->ipaddress = $logData[0];
        $r->parseDataFromUrlString($logData[1]);
        $r->requestMethod = $logData[2];

        if (array_key_exists(3, $logData)) {
            $query = [];
            parse_str($logData[3], $query);
            $r->query = $logData[3];
            $r->requestData->setArray($query);
        }
        if ($r->requestData->offsetExists('IDCLogin')) {
            $r->username = $r->requestData->string('IDCLogin');
        }
        return $r;
    }
}