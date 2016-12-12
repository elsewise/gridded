<?php
/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/8/18
 * Time: 19:12
 */

namespace Gridded\Kit\Formatter\Type;


use Gridded\Kit\Formatter\BasicType;

class Date extends BasicType {
	protected $srcformat;
	protected $newformat;
	protected $parseRe;

	/**
	 * @return string
	 */
	public function toString() {
		// TODO: Implement toString() method.
	}
}