<?php
if(isset($_POST["btnEdit"])){
	$fruit=Fruit::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPrice"])){
		$errors["price"]="Invalid price";
	}

*/
	if(count($errors)==0){
		$fruit=new Fruit();
		$fruit->id=$_POST["txtId"];
		$fruit->name=$_POST["txtName"];
		$fruit->price=$_POST["txtPrice"];

		$fruit->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="fruits">Manage Fruit</a>
<form class='form-horizontal' action='edit-fruit' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$fruit->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$fruit->name"]);
	$html.=input_field(["label"=>"Price","type"=>"text","name"=>"txtPrice","value"=>"$fruit->price"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
</div>
