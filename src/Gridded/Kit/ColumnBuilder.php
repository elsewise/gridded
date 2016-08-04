<?php
namespace Gridded\Kit;

/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/7/26
 * Time: 9:04
 */
class ColumnBuilder {

	/** @var array Data Column Model List */
	protected $_columns = array();

	/**
	 * Generate a Builder
	 *
	 * @return ColumnBuilder
	 */
	public static function getInstance() {
		return new ColumnBuilder();
	}

	/**
	 * Add a Existing Column Model
	 *
	 * @param Column $column
	 */
	public function add(Column $column) {
		array_push($this->_columns, $column);
	}

	/**
	 * Create A Column Model
	 *
	 * @param string $column_name
	 * @param array  $configures
	 *
	 * @return Column
	 */
	public function create($column_name, $configures = array()) {
		$column = new Column();
		if (!empty($configures)) {
			if (is_array($configures)) {
				$column->set($configures);
			}
		}
		$column->set("name", $column_name);
		$this->add($column);
		return $column;
	}

	public function toArray() {
		return $this->_columns;
	}

}