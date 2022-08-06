<?php
if(isset($_POST["btnDetails"])){
	$statu=Statu::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="status">Manage Statu</a>
<table class='table'>
	<tr><th colspan='2'>Statu Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$statu->id</td></tr>";
		$html.="<tr><th>Name</th><td>$statu->name</td></tr>";

	echo $html;
?>
</table>
</div>
