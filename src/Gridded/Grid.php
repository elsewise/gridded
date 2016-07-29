<?php
use Gridded\Kit\Basic;

/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/7/24
 * Time: 17:12
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

	/*fast configure*/
	/**
	 * configure url,data_type and request method
	 *
	 * @param string $url
	 * @param string $data_type
	 * @param string $method_type
	 *
	 * @return $this
	 */
	public function setRequest($url, $data_type = "json", $method_type = "post") {
		$this->configure("url", $url);
		$this->configure("datatype", $data_type);
		$this->configure("mtype", $method_type);
		return $this;
	}


	/**
	 * set a array to configure how many chooses in a row select
	 *
	 * @param array(integer) $list
	 *
	 * @return $this
	 */
	public function setRowList(array $list) {
		return $this->configure("rowList", $list);
	}


	/**
	 * configure how line per page
	 *
	 * @see setRowList if you want to use param 2
	 *
	 * @param integer        $row
	 * @param array(integer) $list
	 *
	 * @return $this
	 */
	public function setRow($row, array $list = NULL) {
		if (empty($list)) {
			$list = array(10, 20, 50, 100);
		}
		$this->setRowList($list);
		return $this->configure("rowNum", $row);
	}

	/**
	 * set a bool to configure whether load once or not
	 *
	 * @param boolean $once
	 *
	 * @return $this
	 */
	public function setLoadOnce($once) {
		if ($once) {
			$once = TRUE;
		} else {
			$once = FALSE;
		}
		return $this->configure("loadonce", $once);
	}

	/**
	 * set a sort order ,default by data resource order
	 *
	 * @param $order
	 *
	 * @return $this
	 */
	public function setSortOrder($order) {
		$order = strtolower($order);
		return $this->configure("sortorder", $order);
	}


}