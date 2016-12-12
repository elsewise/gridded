<?php
/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/9/29
 * Time: 17:45
 */

namespace Gridded\Kit\Formatter;


abstract class BasicType {
	public function __toString() {
		return $this->toString();
	}

	/**
	 * @return string
	 */
	abstract public function toString();
}