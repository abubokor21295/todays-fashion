<?php
if(isset($_POST["btnEdit"])){
	$warehouse=Warehouse::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
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
		$warehouse->id=$_POST["txtId"];
		$warehouse->name=$_POST["txtName"];
		$warehouse->location=$_POST["txtLocation"];
		$warehouse->contact=$_POST["txtContact"];

		$warehouse->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="warehouses">Manage Warehouse</a>
<form class='form-horizontal' action='edit-warehouse' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$warehouse->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$warehouse->name"]);
	$html.=input_field(["label"=>"Location","type"=>"text","name"=>"txtLocation","value"=>"$warehouse->location"]);
	$html.=input_field(["label"=>"Contact","type"=>"text","name"=>"txtContact","value"=>"$warehouse->contact"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
</div>
