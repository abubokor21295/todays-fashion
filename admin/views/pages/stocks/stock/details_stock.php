<?php
if(isset($_POST["btnDetails"])){
	//$product_id=$_POST["txtId"];
	$stock=Stock::find_by_id($_POST["txtId"]);
	$product=Product::find($_POST["txtId"]);
}
?>
<!-- <div class="p-4">
<a class="btn btn-success" href="stocks">Manage Stock</a>
<table class='table'>
	<tr><th colspan='2'></th></tr>
	<?php
		// $html="";
		// 	$html.="<tr><th>Product Id</th><td>$stock->product_id</td></tr>";
		// 	// $html.="<tr><th>Product</th><td>$stock->product</td></tr>";
		// 	$html.="<tr><th>Qty</th><td>$stock->qty</td></tr>";
		// 	$html.="<tr><th>Transaction Type Id</th><td>$stock->transaction_type_id</td></tr>";
		// 	// $html.="<tr><th>Remark</th><td>$stock->remark</td></tr>";
		// 	// $html.="<tr><th>Created At</th><td>$stock->created_at</td></tr>";

		// echo $html;
	?>
</table>
</div> -->

<table class='table'>
	<tr><th colspan='2'><h2><?php echo $product->name; ?></h2></th></tr>
	<tr><th>Product Id:</th><td><?php echo $product->id; ?></td></tr>
	<tr><th>Qty</th><th>Transaction Type Id</th><th>Remark</th><th>Created At</th></tr>
	<?php
		$total=0;
		while($line=$stock->fetch_object()){
			echo "<tr><td>$line->qty</td><td>$line->transaction_type_id</td><td>$line->remark</td><td>$line->created_at</td></tr>";
			$total+=$line->qty;
		}
		
	?>
	<tr><th>Total</th><td><?php echo $total; ?></td></tr>
</table>
