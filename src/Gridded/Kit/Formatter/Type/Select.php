<?php
/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/8/18
 * Time: 19:13
 */

namespace Gridded\Kit\Formatter\Type;


use Gridded\Kit\Formatter\BasicType;

class Select extends BasicType {


	protected $options   = array();
	protected $keyName   = NULL;
	protected $valueName = NULL;

	private $simple = TRUE;

	/**
	 * Select constructor.
	 *
	 * @param $options
	 * @param $keyName
	 * @param $valueName
	 */
	public function __construct($options, $keyName = "id", $valueName = "name") {
		$this->options = $options;
		$rand          = array_rand($options);
		if (is_array($options[$rand])) {
			$this->simple    = FALSE;
			$this->keyName   = $keyName;
			$this->valueName = $valueName;
		}
	}

	public function __toString() {
		return $this->toString();
	}

	public function addNullValue($name) {
		if ($this->simple) {
			$this->options["null"] = $name;
		} else {
			array_push($this->options, array($this->keyName => NULL, $this->valueName => $name));
		}
	}

	public function add($key, $value) {
		if ($this->simple) {
			$this->options[$key] = $value;
		} else {
			array_push($this->options, array($this->keyName => $key, $this->valueName => $value));
		}
	}

	public function toString() {
		$kvs = array();
		foreach ($this->options as $key => $item) {
			if ($this->simple) {
				array_push($kvs, "{$key}:{$item}");
			} else {
				array_push($kvs, "{$item[$this->keyName]}:{$item[$this->valueName]}");
			}
		}
		return implode(";", $kvs);
	}


}