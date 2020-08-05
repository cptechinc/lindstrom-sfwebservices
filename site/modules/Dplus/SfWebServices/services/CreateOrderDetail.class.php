<?php namespace ProcessWire;

require_once('_services.class.php');
require_once(__DIR__.'/../template.class.php');

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

	public function response() {
		$result = parent::response();

		if ($result || $this->response) {
			// NOTE: Set values needed for the createorderdetail/orderdetail.xml.php file class
			if (!array_key_exists('data', $this->response)) {
				$this->response['data'] = array(
				);
			}
		}
		return $result;
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
