<?php namespace ProcessWire;

class UserAdminResponse extends WireData {
	const CRUD_CREATE = 1;
	const CRUD_UPDATE = 2;
	const CRUD_DELETE = 3;

	public function __construct() {
		$this->success = false;
		$this->error = false;
		$this->message = '';
		$this->user = '';
		$this->action = 0;
	}

	public function set_action($action = 0) {
		$this->action = $action;
	}

	public function has_success() {
		return boolval($this->success);
	}

	public function has_error() {
		return boolval($this->error);
	}

	public function set_success($success) {
		$this->success = $success;
	}

	public function set_error($error) {
		$this->error = $error;
	}

	public function set_message($message) {
		$this->message = $message;
	}

	public function set_user($user) {
		$this->user = $user;
	}
}
