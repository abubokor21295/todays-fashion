<?php
if(isset($_POST["btnDetails"])){
	$transactiontype=TransactionType::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="transaction_types">Manage TransactionType</a>
<table class='table'>
	<tr><th colspan='2'>TransactionType Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$transactiontype->id</td></tr>";
		$html.="<tr><th>Name</th><td>$transactiontype->name</td></tr>";

	echo $html;
?>
</table>
</div>
