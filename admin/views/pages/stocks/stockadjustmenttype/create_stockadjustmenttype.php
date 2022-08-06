<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtFactor"])){
		$errors["factor"]="Invalid factor";
	}

*/
	if(count($errors)==0){
		$stockadjustmenttype=new StockAdjustmentType();
		$stockadjustmenttype->name=$_POST["txtName"];
		$stockadjustmenttype->factor=$_POST["txtFactor"];

		$stockadjustmenttype->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="stock_adjustment_types">Manage StockAdjustmentType</a>
<form class='form-horizontal' action='create-stockadjustmenttype' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName"]);
	$html.=input_field(["label"=>"Factor","type"=>"text","name"=>"txtFactor"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
</div>
