<?php
if(isset($_POST["btnDetails"])){
	$purchasedetail=PurchaseDetail::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="purchase_details">Manage PurchaseDetail</a>
<table class='table'>
	<tr><th colspan='2'>PurchaseDetail Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$purchasedetail->id</td></tr>";
		$html.="<tr><th>Purchase Id</th><td>$purchasedetail->purchase_id</td></tr>";
		$html.="<tr><th>Product Id</th><td>$purchasedetail->product_id</td></tr>";
		$html.="<tr><th>Qty</th><td>$purchasedetail->qty</td></tr>";
		$html.="<tr><th>Price</th><td>$purchasedetail->price</td></tr>";
		$html.="<tr><th>Vat</th><td>$purchasedetail->vat</td></tr>";
		$html.="<tr><th>Discount</th><td>$purchasedetail->discount</td></tr>";

	echo $html;
?>
</table>
</div>
