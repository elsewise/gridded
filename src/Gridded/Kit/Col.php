<?php
/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/7/24
 * Time: 19:37
 */
namespace Gridded\Kit;

use Exception;
use Gridded\Kit\Field\Cols;

/**
 * Class Column
 *
 * @package Gridded\Kit
 * @method $this label(string $label);
 * @method $this editable(bool $editable);
 * @method $this sortable(bool $sortable);
 * @method $this fixed(bool $fixed);
 * @method $this width(float $width);
 */
class Col extends Basic {
	/**
	 * @return array
	 */
	protected function _default_configure() {
		return array();
	}

	function __call($name, $arguments) {
		$class_name = __CLASS__;
		if (in_array($name, Cols::$configurations)) {
			$this->configure($name, $arguments[0]);
			return $this;
		} else {
			throw new Exception("Call to undefined method {$class_name}::$name()");
		}
	}


}