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
 * @method $this loadOnce(bool $loadOnce);
 * @method $this sortOrder(string $sortOrder);
 * @method $this rowList(array $rowList);
 * @method $this rowNum(int $rowNum);
 * @method $this url(string $url);
 * @method $this hideGrid(bool $hide);
 * @method $this hiddenGrid(bool $hidden);
 * @method $this height(string $height);
 * @method $this pager(string $pager);
 * @method $this autoWidth(bool $isAuto);
 * @method $this editUrl(string $url);
 */
class Grid extends Basic {

	const ORDER_ASC  = "ASC";
	const ORDER_DESC = "DESC";

	public function __construct($pager, array $configures = array()) {
		parent::__construct($configures);
		$this->pager($pager);
	}


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
		if (in_array(strtolower($name), Grids::getConfigurations())) {
			$this->configure(strtolower($name), $arguments[0]);
			return $this;
		} elseif (in_array($name, Grids::getConfigurations())) {
			$this->configure($name, $arguments[0]);
			return $this;
		} else {
			throw new Exception("Call to undefined method {$class_name}::$name()");
		}
	}

}