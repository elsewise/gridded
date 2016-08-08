<?php
/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/7/24
 * Time: 17:12
 */
namespace Gridded\Kit;

use Exception;
use Gridded\Kit\Field\Grids;

/**
 * Class Grid
 *
 * @package Gridded
 * @method $this loadonce(bool $loadOnce);
 * @method $this sortorder(string $sortOrder);
 * @method $this rowList(array $rowList);
 * @method $this rowNum(int $rowNum);
 * @method $this url(string $url);
 */
class Grid extends Basic {

	const ORDER_ASC  = "ASC";
	const ORDER_DESC = "DESC";

	/**
	 * @return array
	 */
	protected function _default_configure() {
		//define default
		return array(
			"datatype"    => "json",
			"mtype"       => "post",
			"loadonce"    => FALSE,
			"rowList"     => array(10, 20, 50, 100),
			"viewrecords" => TRUE,
			"rowNum"      => 10
		);
	}

	function __call($name, $arguments) {
		$class_name = __CLASS__;
		if (in_array($name, Grids::getConfigurations())) {
			$this->configure($name, $arguments[0]);
			return $this;
		} else {
			throw new Exception("Call to undefined method {$class_name}::$name()");
		}
	}

}