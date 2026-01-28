<?php namespace ProcessWire;

require_once('_services.class.php');
require_once(__DIR__.'/../template.class.php');

use SfWebServices\Logs;

class CreateEqoQuoteDetailRequest extends ServiceRequest {
	const REQUEST = 'CREATEQUOTEDETAIL';
	const ELEMENTS = array(
		'customerNumber',
		'quoteNumber',
		'itemNumber',
		'itemPrice',
		'requestQuantity',
		'requestUOM',
		'reqShipDate',
		'remarks',
		'customerItem'
	);
	public $requestdata = array();
	protected $debug = false;

	/**
	 * Sets Data Values that will be sent to Dplus
	 * @param  WireInput $input Input Values
	 * @return bool
	 */
	public function process(WireInput $input) {
		parent::process($input);
		$rm = strtolower($input->requestMethod());
		/**
		 * @var WireInputData
		 */
		$inputData = $input->$rm;

		$this->requestdata['itemPrice'] = $inputData->float('itemPrice');


		if ($this->user->hasRole('set-price') === false) {
			$this->requestdata['itemPrice'] = 0;
		}
		return true;
	}
}

class CreateEqoQuoteDetailDplus extends ServiceDplus {
	const SERVICE = 'createquotedetail';
	const BASE_FILE = 'createquotedetail';

	const ELEMENTS = array(
		'customerNumber',
		'quoteNumber',
		'itemNumber',
		'itemPrice',
		'requestQuantity',
		'requestUOM',
		'reqShipDate',
		'remarks',
		'customerItem'
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
		// if (Logs\CreateOrder::instance()->exists($data['orderNumber'])) {
		// 	$this->requestarray = $data;
		// 	return false;
		// }
		return parent::request($data);
	}

	public function response() {
		$result = parent::response();

		if ($result || $this->response) {
			// NOTE: Set values needed for the createquotedetail/quotedetail.xml.php file class
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
		// if (Logs\CreateOrder::instance()->exists($this->requestarray['orderNumber'])) {
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

class CreateEqoQuoteDetailResponse extends ServiceResponse {
	const SERVICE = 'createquotedetail';

	// JSON INPUT array
	public $json;

	// XML output container
	public $xml;

	protected function build_xml_addl_vals() {
		return array(
			'single_tpls' => array(
				'quotedetail' => $this->json['data']
			)
		);
	}
}
