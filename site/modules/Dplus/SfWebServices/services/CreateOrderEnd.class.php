<?php namespace ProcessWire;

require_once('_services.class.php');
require_once(__DIR__.'/../template.class.php');

class CreateOrderEndRequest extends ServiceRequest {
	const REQUEST = 'CREATEORDEREND';
	const ELEMENTS = array(
		'orderNumber',
	);
	public $requestdata = array();
	protected $debug = false;
}

class CreateOrderEndDplus extends ServiceDplus {
	const SERVICE = 'createorderend';
	const BASE_FILE = 'createorderend';

	const ELEMENTS = array(
		'orderNumber',
	);

	public function response() {
		$result = parent::response();

		if (!$this->response['error']) {
			if ($this->response['OrderNumber'] != $this->requestarray['orderNumber']) {
				$this->error("Response JSON is for different order ");
				return false;
			}
		}
		return $result;
	}
}

class CreateOrderEndResponse extends ServiceResponse {
	const SERVICE = 'createorderend';

	// JSON INPUT array
	public $json;

	// XML output container
	public $xml;

	protected function build_xml_addl_vals() {
		return array();
	}
}
