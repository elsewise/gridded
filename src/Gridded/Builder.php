<?php
namespace Gridded;

/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/7/26
 * Time: 9:04
 */
class Builder {

	/** @var array Data Column Model List */
	protected $_columns = array();
	protected $_gird    = NULL;

	/**
	 * Generate a Builder
	 *
	 * @return Builder
	 */
	public static function getInstance() {
		return new Builder();
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
	 * @param array  $configuration
	 *
	 * @return Col
	 */
	public function create($column_name, $configuration = array()) {
		$column = new Col();
		if (!empty($configuration)) {
			if (is_array($configuration)) {
				$column->configure($configuration);
			}
		}
		$column->configure("name", $column_name);
		$this->add($column);
		return $column;
	}

	public function toArray() {
		return $this->_columns;
	}

}