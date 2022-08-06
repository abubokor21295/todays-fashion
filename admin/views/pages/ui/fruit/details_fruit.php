<?php
if(isset($_POST["btnDetails"])){
	$fruit=Fruit::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="fruits">Manage Fruit</a>
<table class='table'>
	<tr><th colspan='2'>Fruit Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$fruit->id</td></tr>";
		$html.="<tr><th>Name</th><td>$fruit->name</td></tr>";
		$html.="<tr><th>Price</th><td>$fruit->price</td></tr>";

	echo $html;
?>
</table>
</div>
