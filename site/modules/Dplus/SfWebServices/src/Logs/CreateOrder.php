<?php namespace SfWebServices\Logs;
use PDO;
use atk4\dsql\Query_MySQL as Query;

use ProcessWire\WireData;

/**
 * Logs\CreateOrder
 * Handles Reading / Writing to Log
 */
class CreateOrder extends WireData {
	const TABLE = 'log_createorder';

	/** @var self **/
	private static $instance;

	/**
	 * Return Instance
	 * @return static
	 */
	public static function instance() {
		if (empty(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Return PDO connection
	 * @return PDO
	 */
	private function pdo() {
		return $this->wire('database')->pdo();
	}

	/**
	 * Return Query
	 * @return Query
	 */
	private function query() {
		$q = new Query(['connection' => $this->pdo()]);
		$q->table(self::TABLE);
		return $q;
	}

	/**
	 * Return if Order has been logged as complete
	 * @param  string $ordn Order Request #
	 * @return bool
	 */
	public function exists($companynbr, $ordn) {
		$q = $this->query();
		$q->field('COUNT(*)');
		$q->where('companynbr', $companynbr);
		$q->where('sfOrdn', $ordn);
		return boolval($q->getOne());
	}

	/**
	 * Insert Order
	 * @param  string $ordn Order Request #
	 * @return bool
	 */
	public function insert($companynbr, $ordn) {
		if ($this->exists($companynbr, $ordn)) {
			return true;
		}
		$q = $this->query();
		$q->set('companynbr', $companynbr);
		$q->set('sfOrdn', $ordn);
		$q->set('datestamp', date('Y-m-d H:i:s'));
		return $q->insert();
	}
}
