<?php
if(isset($_POST["btnEdit"])){
	$purchasedetail=PurchaseDetail::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
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
		$purchasedetail->id=$_POST["txtId"];
		$purchasedetail->purchase_id=$_POST["cmbPurchaseId"];
		$purchasedetail->product_id=$_POST["cmbProductId"];
		$purchasedetail->qty=$_POST["txtQty"];
		$purchasedetail->price=$_POST["txtPrice"];
		$purchasedetail->vat=$_POST["txtVat"];
		$purchasedetail->discount=$_POST["txtDiscount"];

		$purchasedetail->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="purchase_details">Manage PurchaseDetail</a>
<form class='form-horizontal' action='edit-purchasedetail' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$purchasedetail->id"]);
	$html.=select_field(["label"=>"Purchase","name"=>"cmbPurchaseId","table"=>"purchases","value"=>"$purchasedetail->purchase_id"]);
	$html.=select_field(["label"=>"Product","name"=>"cmbProductId","table"=>"products","value"=>"$purchasedetail->product_id"]);
	$html.=input_field(["label"=>"Qty","type"=>"text","name"=>"txtQty","value"=>"$purchasedetail->qty"]);
	$html.=input_field(["label"=>"Price","type"=>"text","name"=>"txtPrice","value"=>"$purchasedetail->price"]);
	$html.=input_field(["label"=>"Vat","type"=>"text","name"=>"txtVat","value"=>"$purchasedetail->vat"]);
	$html.=input_field(["label"=>"Discount","type"=>"text","name"=>"txtDiscount","value"=>"$purchasedetail->discount"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
</div>
