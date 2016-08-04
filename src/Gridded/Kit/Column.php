<?php
namespace Gridded\Kit;

/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/7/24
 * Time: 19:37
 */
class Column extends Basic {
	private $_builder = NULL;

	/**
	 * @return array
	 */
	protected function _default_configure() {
		return array();
	}

	/**
	 * Set Name,Label and Index
	 *
	 * @param string $name
	 * @param string $label
	 * @param string $index
	 */
	public function setName($name, $label = NULL, $index = NULL) {
		$this->configure(ColumnFiled::NAME, $name);
		if (!empty($label)) {
			$this->configure(ColumnFiled::LABEL, $label);
		}
		if (!empty($index)) {
			$this->configure(ColumnFiled::INDEX, $index);
		}
	}


	/**
	 * Set editable flag for this column
	 *
	 * @param bool $editable
	 *
	 * @return $this
	 */
	public function editable($editable) {
		$this->configure("editable", $editable);
		return $this;
	}

	public function label($label) {
		$this->configure("label", $label);
		return $this;
	}


	protected function setBuilder($builder) {
		$this->_builder = $builder;
	}

	public function backToBuilder() {
		return $this->_builder;
	}


}