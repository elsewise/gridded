<?php
/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/8/18
 * Time: 19:13
 */

namespace Gridded\Kit\Formatter\Type;


class Select {


	protected $special = array();
	private   $keyName;
	private   $valueName;

	/**
	 * Select constructor.
	 *
	 * @param $options
	 * @param $keyName
	 * @param $valueName
	 */
	public function __construct($options, $keyName = "id", $valueName = "name") {
		$this->special   = $options;
		$this->keyName   = $keyName;
		$this->valueName = $valueName;
	}

	public function __toString() {
		return $this->toString();
	}

	public function addNullValue($name) {
		$nullArray                   = array();
		$nullArray[$this->keyName]   = NULL;
		$nullArray[$this->valueName] = $name;
		array_unshift($this->special, $nullArray);
	}

	public function add($key, $value) {
		$nullArray                   = array();
		$nullArray[$this->keyName]   = $key;
		$nullArray[$this->valueName] = $value;
		array_unshift($this->special, $nullArray);
	}

	public function toString() {
		$kvs = array();
		foreach ($this->special as $item) {
			array_push($kvs, "{$item[$this->keyName]}:{$item[$this->valueName]}");
		}
		return implode(";", $kvs);
	}


}