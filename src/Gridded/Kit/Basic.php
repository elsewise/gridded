<?php
namespace Gridded\Kit;

/**
 * User: Else Airy @wp
 * E-mail: airywp@163.com
 * Date: 2016/7/24
 * Time: 19:38
 */
abstract class Basic {

	/** @var array */
	protected $configures = array();


	/**
	 * Grid constructor.
	 *
	 * @param array $configures
	 */
	public function __construct(array $configures = NULL) {
		$this->configure($this->_default_configure());
		//user
		if (!empty($configures)) {
			$this->configure($configures);
		}
	}

	/**
	 * @return array
	 */
	abstract protected function _default_configure();


	/**
	 * configure the object
	 *
	 * @param array|string $config_key
	 * @param array|string $value
	 *
	 * @return $this
	 */
	public function configure($config_key, $value = NULL) {
		if (is_array($config_key)) {
			foreach ($config_key as $key => $value) {
				$this->configure($key, $value);
			}
		} else {
			if (is_array($value)) {
				$value                         = $this->loop_toArray($value);
				$this->configures[$config_key] = $value;
			} elseif (is_object($value)) {
				if (in_array("toArray", get_class_methods(get_class($value)))) {
					/** @var $value Basic */
					$this->configures[$config_key] = $value->toArray();
				} else {
					$this->configures[$config_key] = $value;
				}
			} else {
				$this->configures[$config_key] = $value;
			}
		}
	}


	private function loop_toArray($data) {
		$arr = array();
		foreach ($data as $key => $item) {
			if (is_array($item)) {
				$arr[$key] = $this->loop_toArray($item);
			} elseif (is_object($item)) {
				if (in_array("toArray", get_class_methods(get_class($item)))) {
					/** @var $item Basic */
					$arr[$key] = $item->toArray();
				} else {
					$arr[$key] = $item;
				}
			} else {
				$arr[$key] = $item;
			}
		}
		return $arr;
	}

	/**
	 * ToArray
	 *
	 * @return array
	 */
	public function toArray() {
		return $this->configures;
	}

	public function toJson() {
		return json_encode($this->toArray());
	}

	/**
	 * alias of configure
	 *
	 * @param array|string $config_key
	 * @param array|string $value
	 *
	 * @return $this
	 */
	public function set($config_key, $value = NULL) {
		return $this->configure($config_key, $value);
	}

}