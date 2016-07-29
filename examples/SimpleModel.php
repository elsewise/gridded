<?php

/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/7/29
 * Time: 16:01
 */
class SimpleModel implements GriddedInterface {

	public function gridded() {
		$builder = Gridded::createColumnBuilder();
		$builder->create("id", array("index" => "id", "sortable" => TRUE));
		$builder->create("first_name", array("index" => "first_name", "sortable" => TRUE));
		$builder->create("last_name", array("index" => "last_name", "sortable" => TRUE));
		$builder->create("email", array("sortable" => TRUE));
		$builder->create("phone");
		return $builder->toArray();
	}
}