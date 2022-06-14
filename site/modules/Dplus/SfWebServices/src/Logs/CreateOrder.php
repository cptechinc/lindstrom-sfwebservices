<?php namespace SfWebServices\Logs;

use atk4\dsql\Query_MySQL as Query;

use ProcessWire\WireData;

class CreateOrder extends WireData {
	const TABLE = 'log_createorder';

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

	private function pdo() {
		return $this->wire('database')->pdo();
	}

	private function query() {
		$q = new Query(['connection' => $this->pdo()]);
		$q->table(self::TABLE);
		return $q;
	}

	public function exists($ordn) {
		$q = $this->query();
		$q->field('COUNT(*)');
		$q->where('sfOrdn', $ordn);
		return boolval($q->getOne());
	}

	public function insert($ordn) {
		if ($this->exists($ordn)) {
			return true;
		}
		$q = $this->query();
		$q->set('sfOrdn', $ordn);
		$q->set('datestamp', date('Y-m-d H:i:s'));
		return $q->insert();
	}
}
