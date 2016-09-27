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

define("GRIDDED_ALIGN_LEFT", "left");
define("GRIDDED_ALIGN_CENTER", "center");
define("GRIDDED_ALIGN_RIGHT", "right");


/**
 * Class Column
 *
 * @package Gridded\Kit
 * @method $this label(string $label)
 * @method $this editable(bool $editable)
 * @method $this sortable(bool $sortable)
 * @method $this fixed(bool $fixed)
 * @method $this width(float $width)
 * @method $this align(string $align)
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
		if (in_array(strtolower($name), Cols::getConfigurations())) {
			$this->configure(strtolower($name), $arguments[0]);
			return $this;
		} elseif (in_array($name, Cols::getConfigurations())) {
			$this->configure($name, $arguments[0]);
			return $this;
		} else {
			throw new Exception("Call to undefined method {$class_name}::$name()");
		}
	}

	function setFormatter($formatter) {
		if (is_object($formatter)) {
			$value = strtolower(basename(get_class($formatter)));
			$this->configure("formatter", $value);
			if ($value == "select") {
				$value_Str = $formatter->toString();
				$this->configure("editoptions", array("value" => $value_Str));
			}
		}
		return $this;
	}
}