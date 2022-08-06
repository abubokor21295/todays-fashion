<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtLocation"])){
		$errors["location"]="Invalid location";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtContact"])){
		$errors["contact"]="Invalid contact";
	}

*/
	if(count($errors)==0){
		$warehouse=new Warehouse();
		$warehouse->name=$_POST["txtName"];
		$warehouse->location=$_POST["txtLocation"];
		$warehouse->contact=$_POST["txtContact"];

		$warehouse->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="warehouses">Manage Warehouse</a>
<form class='form-horizontal' action='create-warehouse' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName"]);
	$html.=input_field(["label"=>"Location","type"=>"text","name"=>"txtLocation"]);
	$html.=input_field(["label"=>"Contact","type"=>"text","name"=>"txtContact"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
</div>
