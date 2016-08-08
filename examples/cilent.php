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
use Gridded\Kit\Grid;

require_once "../src/Gridded/load.php";

$builder = \Gridded\Gridded::createBuilder();

$builder->create("id")->label("主键")->sortable(TRUE);
$builder->create("first_name")->sortable(FALSE);
$builder->create("last_name");
$builder->create("email");
$builder->create("phone");


$gridded = new Grid();
$gridded->url("server.php");
$gridded->configure("colModel", $builder->toArray());
$gridded->configure("pager", "#pager2");
$gridded->configure("caption", "呵呵哒da");
$gridded->configure("sortname", "id");
$gridded->configure("viewrecords", TRUE);
$gridded->configure("sortorder", "asc");
?>
<script>

</script>
<script>
	jQuery("#list2").jqGrid(<?php echo $gridded ?>);
	jQuery("#list2").jqGrid('navGrid', '#pager2', {edit: false, add: false, del: false});
</script>
</html>