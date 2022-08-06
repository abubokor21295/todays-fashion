<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbPurchaseId"])){
		$errors["purchase_id"]="Invalid purchase_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbProductId"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtQty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPrice"])){
		$errors["price"]="Invalid price";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtVat"])){
		$errors["vat"]="Invalid vat";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDiscount"])){
		$errors["discount"]="Invalid discount";
	}

*/
	if(count($errors)==0){
		$purchasedetail=new PurchaseDetail();
		$purchasedetail->purchase_id=$_POST["cmbPurchaseId"];
		$purchasedetail->product_id=$_POST["cmbProductId"];
		$purchasedetail->qty=$_POST["txtQty"];
		$purchasedetail->price=$_POST["txtPrice"];
		$purchasedetail->vat=$_POST["txtVat"];
		$purchasedetail->discount=$_POST["txtDiscount"];

		$purchasedetail->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="purchase_details">Manage PurchaseDetail</a>
<form class='form-horizontal' action='create-purchasedetail' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=select_field(["label"=>"Purchase","name"=>"cmbPurchaseId","table"=>"purchases"]);
	$html.=select_field(["label"=>"Product","name"=>"cmbProductId","table"=>"products"]);
	$html.=input_field(["label"=>"Qty","type"=>"text","name"=>"txtQty"]);
	$html.=input_field(["label"=>"Price","type"=>"text","name"=>"txtPrice"]);
	$html.=input_field(["label"=>"Vat","type"=>"text","name"=>"txtVat"]);
	$html.=input_field(["label"=>"Discount","type"=>"text","name"=>"txtDiscount"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
</div>
