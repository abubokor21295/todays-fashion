<?php
if(isset($_POST["btnDelete"])){
	Fruit::delete($_POST["txtId"]);
}
?>
<?php
echo page_header(["title"=>"Manage Fruit"]);
?>
<div class="p-4">
<?php
	$current_page=isset($_GET["page"])?$_GET["page"]:1;
	echo Fruit::html_table($current_page,5);
?>
</div>
