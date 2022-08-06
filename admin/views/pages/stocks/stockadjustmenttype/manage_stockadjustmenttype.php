<?php
if(isset($_POST["btnDelete"])){
	StockAdjustmentType::delete($_POST["txtId"]);
}
?>
<?php
echo page_header(["title"=>"Stock AdjustType"]);
?>
<div class="p-4">
<?php
	$current_page=isset($_GET["page"])?$_GET["page"]:1;
	echo StockAdjustmentType::html_table($current_page,5);
?>
</div>
