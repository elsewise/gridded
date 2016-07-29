<?php

/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/7/22
 * Time: 15:16
 */
class Gridded {

	/** @var AdapterInterface */
	public $adapter = NULL;

	/**
	 * Gridded constructor.
	 *
	 * @param AdapterInterface $adapter
	 */
	public function __construct(AdapterInterface $adapter = NULL) {
		$this->adapter = $adapter;
	}
}