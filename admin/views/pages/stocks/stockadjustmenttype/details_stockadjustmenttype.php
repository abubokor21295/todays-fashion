<?php
if(isset($_POST["btnDetails"])){
	$stockadjustmenttype=StockAdjustmentType::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="stock_adjustment_types">Manage StockAdjustmentType</a>
<table class='table'>
	<tr><th colspan='2'>StockAdjustmentType Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$stockadjustmenttype->id</td></tr>";
		$html.="<tr><th>Name</th><td>$stockadjustmenttype->name</td></tr>";
		$html.="<tr><th>Factor</th><td>$stockadjustmenttype->factor</td></tr>";

	echo $html;
?>
</table>
</div>
