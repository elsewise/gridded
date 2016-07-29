<?php
namespace Gridded\Kit;

/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/7/23
 * Time: 14:22
 */
class Row {
	/** @var mixed */
	public $id;
	/** @var array */
	public $cell;

	/**
	 * Row constructor.
	 *
	 * @param array  $cell
	 * @param string $id_name
	 */
	public function __construct($cell, $id_name) {
		$this->id   = $cell[$id_name];
		$this->cell = $cell;
	}

}