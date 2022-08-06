<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbUserId"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemark"])){
		$errors["remark"]="Invalid remark";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbAdjustmentTypeId"])){
		$errors["adjustment_type_id"]="Invalid adjustment_type_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbWarehouseId"])){
		$errors["warehouse_id"]="Invalid warehouse_id";
	}

*/
	if(count($errors)==0){
		$stockadjustment=new StockAdjustment();
		$stockadjustment->adjustment_at=$now;
		$stockadjustment->user_id=$_POST["cmbUserId"];
		$stockadjustment->remark=$_POST["txtRemark"];
		$stockadjustment->adjustment_type_id=$_POST["cmbAdjustmentTypeId"];
		$stockadjustment->warehouse_id=$_POST["cmbWarehouseId"];

		$stockadjustment->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="stock_adjustments">Manage StockAdjustment</a>
<form class='form-horizontal' action='create-stockadjustment' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=select_field(["label"=>"User","name"=>"cmbUserId","table"=>"users"]);
	$html.=input_field(["label"=>"Remark","type"=>"text","name"=>"txtRemark"]);
	$html.=select_field(["label"=>"Adjustment Type","name"=>"cmbAdjustmentTypeId","table"=>"adjustment_types"]);
	$html.=select_field(["label"=>"Warehouse","name"=>"cmbWarehouseId","table"=>"warehouses"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
</div>
