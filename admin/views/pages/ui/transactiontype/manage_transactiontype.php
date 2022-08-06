<?php
if(isset($_POST["btnDelete"])){
	TransactionType::delete($_POST["txtId"]);
}
?>
<?php
echo page_header(["title"=>"Manage TransactionType"]);
?>
<div class="p-4">
<?php
	$current_page=isset($_GET["page"])?$_GET["page"]:1;
	echo TransactionType::html_table($current_page,5);
?>
</div>
