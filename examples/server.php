<?php
/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/7/29
 * Time: 11:23
 */

require_once "../src/Gridded/load.php";
include_once "idiorm.php";
include_once "SimpleModel.php";

/**
 * Author: Elsewise Airy @wp
 * E-mail: airywp@qq.com
 * Date: 2016/7/23
 * Time: 11:10
 */
$rows = @$_POST['rows'];
$page = empty($_POST['page']) ? 1 : $_POST['page'];
if ($page < 1) $page = 1;
$sidx = @$_POST['sidx'];
$sord = @$_POST['sord'];
//echo json_encode($adapter);
ORM::configure('mysql:host=localhost;dbname=jqgrid_test');
ORM::configure('username', 'root');
ORM::configure('password', '');
$table = ORM::for_table("tbl_customer");
if (!empty($sidx)) {
	if ($sord == "desc") {
		$table->order_by_desc($sidx);
	} else if ($sord == "asc") {
		$table->order_by_asc($sidx);
	}
}
$start = ($page - 1) * $rows;
$table->offset($start)->limit($rows);
$data = $table->find_array();

$adapter          = new \Gridded\Kit\Table($data);
$adapter->records = ORM::for_table("tbl_customer")->count();
$adapter->page    = $page;
$adapter->total   = ceil(ORM::for_table("tbl_customer")->count() / $rows);
exit(json_encode($adapter));
