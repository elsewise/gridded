<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/ui.jqgrid.css">
	<link rel="stylesheet" href="css/jquery-ui.min.css">
	<link rel="stylesheet" href="css/jquery-ui.theme.min.css">
</head>
<body>
<table id="list2"></table>
<div id="pager2"></div>
</body>
<script src="js/jquery-2.1.1.js"></script>
<script src="i18n/grid.locale-en.js"></script>
<script src="js/jquery.jqGrid.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<?php
require_once "../src/Gridded/load.php";

use Gridded\Grid;
use Gridded\Kit\ColumnBuilder;

$columnBuilder = new ColumnBuilder();
$columnBuilder->create("id")->label("主键");
$columnBuilder->create("first_name");
$columnBuilder->create("last_name");
$columnBuilder->create("email");
$columnBuilder->create("phone");


$gridded = new Grid();
$gridded->setRequest("server.php");
$gridded->configure("colModel", $columnBuilder->toArray());
$gridded->configure("pager", "#pager2");
$gridded->configure("height", "400px");
$gridded->configure("caption", "呵呵哒da");
//$gridded->configure("sortname", "id");
//$gridded->configure("viewrecords", TRUE);
//$gridded->configure("sortorder", "asc");

?>
<script>

</script>
<script>
	jQuery("#list2").jqGrid(<?php echo $gridded->toJson() ?>);
	//	jQuery("#list2").jqGrid('navGrid', '#pager2', {edit: false, add: false, del: false});
</script>
</html>