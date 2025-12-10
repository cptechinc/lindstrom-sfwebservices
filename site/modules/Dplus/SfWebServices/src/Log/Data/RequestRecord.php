<?php namespace SfWebServices\Log\Data;
// ProcessWire
use ProcessWire\WireData;
use ProcessWire\WireInputData;

/**
 * @property string         $timestamp
 * @property string         $ipaddress
 * @property string         $username
 * @property string         $url
 * @property string         $endpoint
 * @property string         $requestMethod
 * @property WireInputData  $requestData
 * @property string         $query
 * @property bool           $loginSuccess
 */
class RequestRecord extends WireData {
    const SENSITIVE_REQUEST_DATA = [
        'IDCPassword'
    ];

    public function __construct() {
        $this->requestData = new WireInputData();
    }


    public function parseDataFromUrlString($urlString) {
        $url   = parse_url($urlString);
        $this->url = $urlString;

        if (array_key_exists('host', $url) === false) {
            return;
        }
        $this->url = $url['scheme'] . '://' . $url['host'] . $url['path'];

        $paths = explode('/', $url['path']);
        $this->endpoint = $paths[sizeof($paths) - 2];

        if (array_key_exists('query', $url) && $url['query']) {
            $query = [];
            parse_str($url['query'], $query);
            $this->requestData->setArray($query);
        }
    }
}