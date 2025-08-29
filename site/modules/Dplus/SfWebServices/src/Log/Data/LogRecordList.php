<?php namespace SfWebServices\Log\Data;

      use ProcessWire\WireArray;


class LogRecordList extends WireArray {
    public function isValidItem($item) {
		return true;
	}
}