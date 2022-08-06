<?php
if(isset($_POST["btnDetails"])){
	$stockadjustment=StockAdjustment::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="stock_adjustments">Manage StockAdjustment</a>
<table class='table'>
	<tr><th colspan='2'>StockAdjustment Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$stockadjustment->id</td></tr>";
		$html.="<tr><th>Adjustment At</th><td>$stockadjustment->adjustment_at</td></tr>";
		$html.="<tr><th>User Id</th><td>$stockadjustment->user_id</td></tr>";
		$html.="<tr><th>Remark</th><td>$stockadjustment->remark</td></tr>";
		$html.="<tr><th>Adjustment Type Id</th><td>$stockadjustment->adjustment_type_id</td></tr>";
		$html.="<tr><th>Warehouse Id</th><td>$stockadjustment->warehouse_id</td></tr>";

	echo $html;
?>
</table>
</div>
