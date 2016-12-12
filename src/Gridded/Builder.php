<?php
namespace Gridded;

use Gridded\Kit\Col;
use Gridded\Kit\Grid;

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
		$config                          = $column->toArray();
		$this->_columns[$config['name']] = $column;
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
		$column = new Col($column_name);
		if (!empty($configuration)) {
			if (is_array($configuration)) {
				$column->configure($configuration);
			}
		}
		$column->editable(TRUE);
		$this->add($column);
		return $column;
	}

	public function toArray() {
		return array_values($this->_columns);
	}

}