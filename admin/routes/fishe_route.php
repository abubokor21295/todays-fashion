<?php
if($page=="create-fishe"){
	$found=include("views/pages/ui/fishe/create_fishe.php");
}elseif($page=="edit-fishe"){
	$found=include("views/pages/ui/fishe/edit_fishe.php");
}elseif($page=="manage-fishe"){
	$found=include("views/pages/ui/fishe/manage_fishe.php");
}elseif($page=="details-fishe"){
	$found=include("views/pages/ui/fishe/details_fishe.php");
}elseif($page=="view-fishe"){
	$found=include("views/pages/ui/fishe/view_fishe.php");
}
?>