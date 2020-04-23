<?php namespace ProcessWire;

use Exception;

/**
 * ServiceRequest
 * Classes for Taking Request Input and Generating Request Data to be sent to Dplus
 */
abstract class ServiceRequest extends WireData {
	const REQUEST = '';
	const ELEMENTS = array();

	protected $requestdata = array();
	protected $debug = false;

	public function __construct($debug = false) {
		$this->debug = $debug;

		foreach ($this::ELEMENTS as $key) {
			$this->requestdata[$key] = false;
		}
	}

	/**
	 * Sets Data Values that will be sent to Dplus
	 * @param  WireInput $input Input Values
	 * @return bool
	 */
	public function process(WireInput $input) {
		$rm = strtolower($input->requestMethod());

		foreach (array_keys($this->requestdata) as $key) {
			$this->requestdata[$key] = $input->$rm->text($key);
		}
		return true;
	}

	/**
	 * Return the fields that are being used by this class
	 * @return array
	 */
	public function get_fields() {
		return $this::ELEMENTS;
	}
}

/**
 * ServiceResponse
 * Classes for handling:
 * 1. Sending the flat file Request
 * 2. Retreiving Response JSON from Dplus
 */
abstract class ServiceDplus extends WireData {
	const DIR_RESPONSE_BASE = '/var/www/html/files/json';
	public $requestdata;

	// Response JSON string container
	public $json_response;
	public $response = array();

	public function __construct($debug = false) {
		$this->debug = $debug;
		$this->dir = self::DIR_RESPONSE_BASE.$this->wire('config')->companynbr.'/';
	}

	/**
	 * Throws an error to be logged
	 * @param  string $error Description of Error
	 * @param  int	 $level What PHP Error Level
	 * Error constants can be found at
	 * http://php.net/manual/en/errorfunc.constants.php
	 */
	public function error($error, $level = E_USER_ERROR) {
		$trace = debug_backtrace();
		$caller = next($trace);
		$class = get_class($this);
		$error = (strpos($error, "[$class]: ") !== 0 ? "[$class]: " . $error : $error);
		$error .= PHP_EOL;
		$error .= PHP_EOL;

		if (isset($caller['file'])) {
			$error .= $caller['function'] . " called from " . $caller['file'] . " on line " . $caller['line'];
		} else {
			$error .= "";
		}
		trigger_error($error, $level);
	}

	/**
	 * Processes Response and returns if it was turned into an array
	 * @return bool
	 */
	public function response() {
		$filepath = $this->dir.session_id().'-'.$this::BASE_FILE.'.json';

		if (file_exists($filepath)) {
			$this->raw_response = file_get_contents($filepath);
			$this->response = json_decode(file_get_contents($filepath), true);

			if (empty($this->response)) {
				$this->error("The JSON Response contains errors, JSON ERROR: ". json_last_error());
				return false;
			} else {
				if ($this->response['service'] !== strtoupper($this::BASE_FILE)) {
					$this->error("Response JSON does not match service");
					return false;
				}
			}
			return true;
		} else {
			$this->error("Response JSON does not exist");
			return false;
		}
	}

	protected function build_response_exception(Exception $e) {
		$this->response = array(
			'error' => true,
			'message' => $e->getMessage(),
			'service' => strtoupper($this::SERVICE)
		);
	}

	/**
	 * Sends Request to COBOL
	 * NOTE: Data is further parsed to send more necessary fields
	 * @param  array  $data Key Value array to be sent in flat file
	 * @return bool
	 */
	public function request(array $data) {;
		if ($this->validate_request($data) !== true) {
			$this->error('Invalid Request');
			return false;
		}

		$this->create_requestdata($data);

		if ($this->send_request() !== true) {
			$this->error('Request could not be made');
			return false;
		}
		return true;
	}

	/**
	 * Validates that the elements needed for the request are array keys
	 * @param  array  $data
	 * @return bool
	 */
	protected function validate_request(array $data) {
		if ($this::ELEMENTS !== array_keys($data)) {
			$this->error('Request is for another service');
			return false;
		}
		return true;
	}

	/**
	 * Packages the array data into a basic array
	 * prepended with the $this::SERVICE command
	 * @param  array  $data key => values to be sent as one line
	 * @return bool
	 */
	protected function create_requestdata(array $data) {
		$this->requestdata = array();
		$dbname = 'dpluso'.$this->wire('config')->companynbr;
		$this->requestdata[] = "DBNAME=$dbname";
		$this->requestdata[] = strtoupper($this::SERVICE);

		foreach ($data as $key => $value) {
			$this->requestdata[] = strtoupper($key)."=$value";
		}
		return true;
	}

	/**
	 * Sends Request Data to Dplus
	 * @return bool
	 */
	public function send_request() {
		$requestor = $this->wire('modules')->get('DplusRequest');

		if ($requestor->write_dplusfile($this->requestdata, session_id()) !== true) {
			$this->error('Request file could not be written');
			return false;
		}

		if ($requestor->cgi_request(session_id()) !== true) {
			$this->error('Failed sending request');
			return false;
		}
		return true;
	}
}

/**
 * ServiceResponse
 * Classes for Handling
 * 1. JSON array interpretation of the Response data
 * 2. XML Output
 */
abstract class ServiceResponse extends WireData {

	// JSON INPUT array
	public $json;

	// XML output container
	public $xml;

	// Container for base output template
	protected $tpl;

	// Required values structure
	protected $struct = array();

	// XML template directory (defaults to endpoint)
	protected $service_dir;

	public function __construct($debug = false) {
		$this->debug = $debug;
		$this->xml_dir = __DIR__ . '/../xml';

		if (empty($this->service_dir)) {
			$this->service_dir = $this::SERVICE;
		}
	}

	/**
	 * Takes in Response Data, and builds the XML response from it
	 * @param  array  $json JSON response array from a Service Dplus class
	 * @return bool
	 */
	public function process(array $json) {
		$this->json = $json;

		if ($this->validate() !== true) {
			$this->error('Returned values are not valid');
			return false;
		}

		if ($this->build_xml() !== true) {
			$this->error('Unable to create response XML file');
			return false;
		}
		return true;
	}

	/**
	 * Returns the XML data
	 * @return string
	 */
	public function get_xml() {
		return $this->xml;
	}

	/**
	 * Validates Response Data
	 * @return bool
	 */
	public function validate() {
		if (strtoupper($this->json['service']) !== strtoupper($this::SERVICE)) {
			$this->error('Response is for the wrong service');
			return false;
		}
		return true;
	}

	/**
	 * Begin process of building various XML templates together into the overall response
	 * XML document.
	 *
	 * @return	boolean
	 */
	protected function build_xml() {
		$this->build_xml_base();
		$this->build_xml_addl();
		$xml = $this->tpl->fetch_template();

		if (!empty($xml)) {
			$this->xml = $xml;
			return true;
		}
		return false;
	}

	/**
	 * Create the base XML template object for the response XML document. Applies all response values
	 * to the template object.
	 *
	 * @return	boolean
	 */
	protected function build_xml_base() {
		$this->tpl = $this->template("$this->xml_dir/" . $this->service_dir . '/_base.xml.php');
		$this->tpl->set_multi($this->json);
		return (is_object($this->tpl));
	}

	/**
	 * Instantiate a new Template class object using the specified template file.
	 *
	 * @param	 string	 $tpl					 Template file
	 *
	 * @return	object
	 */
	protected function template($tpl) {
		return new TemplateXml($tpl);
	}

	/**
	 * Process all defined single- and multiple-value additional XML templates and add them to the base
	 * XML template object. Single-value templates are for XML elements that occur once in the output;
	 * multiple-value templates are for XML elements that occur one or more times in the output.
	 *
	 * @return	null
	 */
	protected function build_xml_addl() {
		$tpls = array();
		$vals = $this->build_xml_addl_vals();

		if (!empty($vals['single_tpls'])) {
			foreach ($vals['single_tpls'] as $tpl_key => $tpl_vals) {
				$tpl_vals = (empty($tpl_vals) && isset($this->json['data'][$tpl_key]) ? $this->json['data'][$tpl_key] : $tpl_vals);
				$tpl = $this->template("$this->xml_dir/" . $this->service_dir . '/' . $tpl_key . '.xml.php');

				if ($this->is_multi($tpl_vals)) {
					$tpl->set_multi($tpl_vals);
				} else {
					$tpl->set($tpl_key, $tpl_vals);
				}
				$tpls['xml_'.$tpl_key] = $tpl->fetch_template();
			}
		}

		if (!empty($vals['multi_tpls'])) {
			foreach ($vals['multi_tpls'] as $tpl_key => $tpl_vals) {
				$tpl_vals = (empty($tpl_vals) && isset($this->json['data'][$tpl_key]) ? $this->json['data'][$tpl_key] : $tpl_vals);

				if (!empty($this->json['data'][$tpl_key])) {
					$tpl = $this->template("$this->xml_dir/" . $this->service_dir . '/' . $tpl_key . '.xml.php');
					$tpl->set($tpl_key, $tpl_vals);
					$tpls['xml_'.$tpl_key] = $tpl->fetch_template();
				} else {
					$tpls['xml_'.$tpl_key] = null;
				}
			}
		}
		$this->tpl->set_multi($tpls);
		return;
	}

	/**
	 * Defines the single- and multiple-value additional XML templates. Should be extended in each response
	 * class.
	 *
	 * Format of the returned array should appear similar to:
	 *	  'single_tpls' => array(
	 *			'tpl_key' => 'tpl_values'
	 *	  ),
	 *	  'multi_tpls' => array(
	 *			'tpl_key' => 'tpl_values'
	 *	  )
	 *
	 * @return	array
	 */
	protected function build_xml_addl_vals() {
		return array();
	}

	protected function is_multi($array) {
		return (count($array) != count($array, 1));
	}
}

class JsonResponseException extends \Exception {

	// custom string representation of object
	public function __toString() {
		return __CLASS__ . ": {$this->message}\n";
	}
}
