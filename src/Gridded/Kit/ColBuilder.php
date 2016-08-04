<?php
namespace Gridded\Kit;

/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/7/26
 * Time: 9:04
 */
class ColBuilder {

	/** @var array Data Column Model List */
	protected $_columns = array();

	/**
	 * Generate a Builder
	 *
	 * @return ColBuilder
	 */
	public static function getInstance() {
		return new ColBuilder();
	}

	/**
	 * Add a Existing Column Model
	 *
	 * @param Col $column
	 */
	public function add(Col $column) {
		array_push($this->_columns, $column);
	}

	/**
	 * Create A Column Model
	 *
	 * @param string $column_name
	 * @param array  $configures
	 *
	 * @return Col
	 */
	public function create($column_name, $configures = array()) {
		$column = new Col();
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