<?php
namespace Gridded\Kit;

/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/7/24
 * Time: 19:37
 */
class Column extends Basic {

	/**
	 * @return array
	 */
	protected function _default_configure() {
		return array();
	}

	public function setName($name, $label = NULL, $index = NULL) {
		$this->configure(ColumnFiled::NAME, $name);
		if (!empty($label)) {
			$this->configure(ColumnFiled::LABEL, $label);
		}
		if (!empty($index)) {
			$this->configure(ColumnFiled::INDEX, $index);
		}
	}


	public function setEditable($editable) {

	}

}