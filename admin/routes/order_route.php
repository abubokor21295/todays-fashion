<?php
if($page=="create-order"){
	$found=include("views/pages/order/create_order.php");
}elseif($page=="edit-order"){
	$found=include("views/pages/order/edit_order.php");
}elseif($page=="orders"){
	$found=include("views/pages/order/manage_order.php");
}elseif($page=="details-order"){
	$found=include("views/pages/order/details_order.php");
}elseif($page=="view-order"){
	$found=include("views/pages/order/view_order.php");
}
?>
