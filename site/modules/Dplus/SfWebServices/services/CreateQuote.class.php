<?php namespace ProcessWire;

require_once('_services.class.php');
require_once(__DIR__.'/../template.class.php');

class CreateQuoteRequest extends ServiceRequest {
	const REQUEST = 'CREATEQUOTE';
	const ELEMENTS = array(
		'customerNumber',
		'shiptoZip',
		'customerItem',
		'itemNumber',
		'requestQuantity',
		'requestUOM',
		'remarks'
	);
	public $requestdata = array();
	protected $debug = false;
}

class CreateQuoteDplus extends ServiceDplus {
	const SERVICE = 'createquote';
	const BASE_FILE = 'createquote';

	const ELEMENTS = array(
		'customerNumber',
		'shiptoZip',
		'customerItem',
		'itemNumber',
		'requestQuantity',
		'requestUOM',
		'remarks'
	);

	public function response() {
		$result = parent::response();

		if ($result || $this->response) {
			// NOTE: Set values needed for the createquote/header.xml.php file class
			if (!array_key_exists('data', $this->response)) {
				$this->response['data'] = array(
					'quote' => array()
				);
			}
			$this->response['data']['quote']['error'] = $this->response['error'];
			$this->response['data']['quote']['message'] = $this->response['message'];
		}
		return $result;
	}

	public function error_response($message) {
		return array(
			"sessionid" => session_id(),
			"service" => strtoupper(self::SERVICE),
			"error" => true,
			"message" => $message,
			'data' => array(
				'quote' => array(
					'error' => true,
					'message' => $message
				),
				'availability' => false
			)
		);
	}
}

class CreateQuoteResponse extends ServiceResponse {
	const SERVICE = 'createquote';

	// JSON INPUT array
	public $json;

	// XML output container
	public $xml;


	protected function build_xml_addl_vals() {
		return array(
			'single_tpls' => array(
				'header' => $this->json['data']
			),
			'multi_tpls' => array(
				'availability' => $this->json['data']['availability']
			)
		);
	}
}
