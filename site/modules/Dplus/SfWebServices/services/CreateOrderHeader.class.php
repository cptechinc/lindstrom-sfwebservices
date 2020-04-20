<?php namespace ProcessWire;

require_once('_services.class.php');
require_once(__DIR__.'/../template.class.php');

class CreateOrderHeaderRequest extends ServiceRequest {
	const REQUEST = 'CREATEORDERHEADER';
	const ELEMENTS = array(
		'customerNumber',
		'shiptoName',
		'shiptoAdd1',
		'shiptoAdd2',
		'shiptoCity',
		'shiptoState',
		'shiptoZip',
		'custPO',
		'reqShipDate',
		'shipVia',
		'buyerName',
		'confirmationEmail',
		'remarks'
	);
	public $requestdata = array();
	protected $debug = false;
}

class CreateOrderHeaderDplus extends ServiceDplus {
	const SERVICE = 'createorderheader';
	const BASE_FILE = 'createorderheader';

	const ELEMENTS = array(
		'customerNumber',
		'shiptoName',
		'shiptoAdd1',
		'shiptoAdd2',
		'shiptoCity',
		'shiptoState',
		'shiptoZip',
		'custPO',
		'reqShipDate',
		'shipVia',
		'buyerName',
		'confirmationEmail',
		'remarks'
	);

	protected function create_requestdata(array $data) {
		$requestdate_formatted = date('Ymd', strtotime($data['reqShipDate']));
		$data['reqShipDate'] = $requestdate_formatted;
		return parent::create_requestdata($data);
	}
}

class CreateOrderHeaderResponse extends ServiceResponse {
	const SERVICE = 'createorderheader';

	// JSON INPUT array
	public $json;

	// XML output container
	public $xml;

	protected function build_xml_addl_vals() {
		return array(
			'single_tpls' => array(
				'header' => $this->json['data']
			)
		);
	}
}
