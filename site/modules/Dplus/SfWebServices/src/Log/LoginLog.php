<?php namespace SfWebServices\Log;
// ProcessWire
use ProcessWire\WireData;
// SfWebServices
use SfWebServices\Log\Data\LoginRecord as Record;

/**
 * @property LogUtil $logutil
 */
class LoginLog extends WireData {
    const DATE_SWITCHED_TO_NEW_FORMAT = '12/10/2025';

    public function __construct() {
        $this->logutil = new LogUtil();
        $this->logutil->logname = 'login';
        $this->logutil->init();
    }

    /**
     * @param  string $entry
     * @return Record
     */
    public function parseLogRecord($entry) {
        $data = explode("\t", $entry);

        if (strtotime($data[0]) < mktime(13, 15, 0, 12, 10, 2025)) {
            return $this->parseLogRecordOld($data);
        }
        return $this->parseLogRecordNew($data);
    }

    /**
     * @param  array $data
     * @return Record
     */
    private function parseLogRecordNew(array $data) {
        $r = new Record();
        $r->timestamp = $data[0];
        $r->username  = $data[1];

        $logData = explode("|", $data[2]);

        $r->ipaddress = $logData[0];
        $r->loginSuccess = $logData[1] == 'true';
        $r->parseDataFromUrlString($logData[2]);
        $r->requestMethod = $logData[3];

        if (array_key_exists(4, $logData)) {
            $query = [];
            parse_str($logData[4], $query);
            $r->query = $logData[4];
            $r->requestData->setArray($query);
        }
        return $r;
    }

    /**
     * @param  array $data
     * @return Record
     */
    private function parseLogRecordOld(array $data) {
        $r = new Record();
        $r->requestMethod = 'GET';
        $r->timestamp = $data[0];
        $r->username  = $data[1];
        $r->parseDataFromUrlString($data[2]);

        if (array_key_exists(3, $data)) {
            $extra = explode('|', $data[3]);
            $r->ipaddress = $extra[0];
            $r->loginSuccess = $extra[1] == true;
        }
        return $r;
    }
}