<?php
if($page=="create-order-detail"){
	$found=include("views/pages/ui/order_detail/create_order_detail.php");
}elseif($page=="edit-order-detail"){
	$found=include("views/pages/ui/order_detail/edit_order_detail.php");
}elseif($page=="manage-order-detail"){
	$found=include("views/pages/ui/order_detail/manage_order_detail.php");
}elseif($page=="details-order-detail"){
	$found=include("views/pages/ui/order_detail/details_order_detail.php");
}elseif($page=="view-order-detail"){
	$found=include("views/pages/ui/order_detail/view_order_detail.php");
}
?>