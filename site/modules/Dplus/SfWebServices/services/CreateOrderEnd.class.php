<?php namespace ProcessWire;

require_once('_services.class.php');
require_once(__DIR__.'/../template.class.php');

use SfWebServices\Logs;

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

	/**
	 * Sends Request to COBOL
	 * NOTE: Data is further parsed to send more necessary fields
	 * @param  array  $data Key Value array to be sent in flat file
	 * @return bool
	 */
	public function request(array $data) {
		$companynbr = $this->wire('user')->use_production() ? self::COMPANY_LIVE : self::COMPANY_SANDBOX;
		// if (Logs\CreateOrder::instance()->exists($companynbr, $data['orderNumber'])) {
		// 	$this->requestarray = $data;
		// 	return false;
		// }
		return parent::request($data);
	}

	public function response() {
		$result = parent::response();

		if ($this->response['error'] === false) {
			if ($this->response['OrderNumber'] != $this->requestarray['orderNumber']) {
				$this->error("Response JSON is for a different order");
				return false;
			}
			$companynbr = $this->wire('user')->use_production() ? self::COMPANY_LIVE : self::COMPANY_SANDBOX;
			// Logs\CreateOrder::instance()->insert($companynbr, $this->response['OrderNumber']);
		}
		return $result;
	}

	/**
	 * Returns Error Response Array
	 * @param  string $message Error Message
	 * @return array
	 */
	public function error_response($message) {
		$companynbr = $this->wire('user')->use_production() ? self::COMPANY_LIVE : self::COMPANY_SANDBOX;
		// if (Logs\CreateOrder::instance()->exists($companynbr, $this->requestarray['orderNumber'])) {
		// 	$message = "Order has already been completed";
		// }

		return array(
			"sessionid" => session_id(),
			"service" => strtoupper($this::SERVICE),
			"error" => true,
			"message" => $message,
			"data" => array()
		);
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
