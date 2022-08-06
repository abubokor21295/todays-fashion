<?php
if(isset($_POST["btnDetails"])){
	$warehouse=Warehouse::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="warehouses">Manage Warehouse</a>
<table class='table'>
	<tr><th colspan='2'>Warehouse Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$warehouse->id</td></tr>";
		$html.="<tr><th>Name</th><td>$warehouse->name</td></tr>";
		$html.="<tr><th>Location</th><td>$warehouse->location</td></tr>";
		$html.="<tr><th>Contact</th><td>$warehouse->contact</td></tr>";

	echo $html;
?>
</table>
</div>
