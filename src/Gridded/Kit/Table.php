<?php
namespace Gridded\Kit;

/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/7/23
 * Time: 14:20
 */
class Table {

	/** @var integer */
	public $page;
	/** @var integer */
	public $records;
	/** @var array */
	public $rows;
	/** @var integer */
	public $total;
	/** @var array */
	public $userdata;

	/**
	 * Table constructor.
	 *
	 * @param array  $rows
	 * @param string $idColumnName
	 */
	public function __construct(array $rows, $idColumnName = "id") {
		$this->rows = array();
		foreach ($rows as $item) {
			$row = new Row($item, $idColumnName);
			array_push($this->rows, $row);
		}
	}
}