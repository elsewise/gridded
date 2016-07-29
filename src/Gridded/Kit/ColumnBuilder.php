<?php
namespace Gridded\Kit;

/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/7/26
 * Time: 9:04
 */
class ColumnBuilder {

	protected $_columns = array();

	public function add(Column $column) {
		array_push($this->_columns, $column);
	}

	public function create($name, $configures = NULL) {
		$column = new Column();
		if (!empty($configures)) {
			if (is_array($configures)) {
				$column->set($configures);
			}
		}
		$column->set("name", $name);
		$this->add($column);
		return $column;
	}

	public function toArray() {
		return $this->_columns;
	}

}