<html>
<head>
	<link rel="stylesheet" href="css/ui.jqgrid.css">
	<link rel="stylesheet" href="css/jquery-ui.min.css">
	<link rel="stylesheet" href="css/jquery-ui.theme.min.css">
</head>
<body>
<table id="list2"></table>
<div id="pager2"></div>
</body>
<script src="js/jquery-2.1.1.js"></script>
<script src="i18n/grid.locale-cn.js"></script>
<script src="js/jquery.jqGrid.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<?php
include_once "../src/Gridded/Kit/Basic.php";
include_once "../src/Gridded/Kit/ColumnBuilder.php";
include_once "../src/Gridded/Kit/Column.php";
include_once "../src/Gridded/Kit/Basic.php";
include_once "../src/Gridded/Grid.php";
include_once "../src/Gridded/Gridded.php";


use Gridded\Grid;
use Gridded\Kit\Column;
use Gridded\Kit\ColumnBuilder;


$a = new Column(array("name" => "id", "index" => "id", "sortable" => TRUE));
$b = new Column(array("name" => "first_name", "index" => "first_name", "sortable" => TRUE));
$c = new Column(array("name" => "last_name", "index" => "last_name", "sortable" => TRUE));
$d = new Column(array("name" => "email", "sortable" => TRUE));
$e = new Column(array("name" => "phone"));

$columnBuilder = new ColumnBuilder();
$columnBuilder->create("id");
$columnBuilder->create("first_name");
$columnBuilder->create("last_name");
$columnBuilder->create("email");
$columnBuilder->create("phone");


$gridded = new Grid();
$gridded->setRequest("server.php");
$gridded->configure("colModel", $columnBuilder->toArray());
$gridded->configure("pager", "#pager2");


//$gridded->configure("sortname", "id");
//$gridded->configure("viewrecords", TRUE);
//$gridded->configure("sortorder", "asc");
//$gridded->configure("caption", "呵呵哒da");

?>
<script>

</script>
<script>
	jQuery("#list2").jqGrid(<?php echo $gridded->toJson() ?>);
//	jQuery("#list2").jqGrid('navGrid', '#pager2', {edit: false, add: false, del: false});
</script>
</html>