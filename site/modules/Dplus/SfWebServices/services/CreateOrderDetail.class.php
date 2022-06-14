<?php namespace ProcessWire;

require_once('_services.class.php');
require_once(__DIR__.'/../template.class.php');

use SfWebServices\Logs;

class CreateOrderDetailRequest extends ServiceRequest {
	const REQUEST = 'CREATEORDERDETAIL';
	const ELEMENTS = array(
		'customerNumber',
		'orderNumber',
		'itemNumber',
		'requestQuantity',
		'requestUOM',
		'reqShipDate',
		'remarks',
	);
	public $requestdata = array();
	protected $debug = false;
}

class CreateOrderDetailDplus extends ServiceDplus {
	const SERVICE = 'createorderdetail';
	const BASE_FILE = 'createorderdetail';

	const ELEMENTS = array(
		'customerNumber',
		'orderNumber',
		'itemNumber',
		'requestQuantity',
		'requestUOM',
		'reqShipDate',
		'remarks',
	);

	protected function create_requestdata(array $data) {
		$requestdate_formatted = date('Ymd', strtotime($data['reqShipDate']));
		$data['reqShipDate'] = $requestdate_formatted;
		return parent::create_requestdata($data);
	}

	/**
	 * Sends Request to COBOL
	 * NOTE: Data is further parsed to send more necessary fields
	 * @param  array  $data Key Value array to be sent in flat file
	 * @return bool
	 */
	public function request(array $data) {
		if (Logs\CreateOrder::instance()->exists($data['orderNumber'])) {
			$this->requestarray = $data;
			return false;
		}
		return parent::request($data);
	}

	public function response() {
		$result = parent::response();

		if ($result || $this->response) {
			// NOTE: Set values needed for the createorderdetail/orderdetail.xml.php file class
			if (!array_key_exists('data', $this->response)) {
				$this->response['data'] = array();
			}
		}
		return $result;
	}

	/**
	 * Returns Error Response Array
	 * @param  string $message Error Message
	 * @return array
	 */
	public function error_response($message) {
		if (Logs\CreateOrder::instance()->exists($this->requestarray['orderNumber'])) {
			$message = "Order has already been completed";
		}

		return array(
			"sessionid" => session_id(),
			"service" => strtoupper($this::SERVICE),
			"error" => true,
			"message" => $message,
			"data" => array()
		);
	}
}

class CreateOrderDetailResponse extends ServiceResponse {
	const SERVICE = 'createorderdetail';

	// JSON INPUT array
	public $json;

	// XML output container
	public $xml;

	protected function build_xml_addl_vals() {
		return array(
			'single_tpls' => array(
				'orderdetail' => $this->json['data']
			)
		);
	}
}
