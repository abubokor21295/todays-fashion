<?php
if($page=="create-hero"){
	$found=include("views/pages/ui/hero/create_hero.php");
}elseif($page=="edit-hero"){
	$found=include("views/pages/ui/hero/edit_hero.php");
}elseif($page=="manage-hero"){
	$found=include("views/pages/ui/hero/manage_hero.php");
}elseif($page=="details-hero"){
	$found=include("views/pages/ui/hero/details_hero.php");
}elseif($page=="view-hero"){
	$found=include("views/pages/ui/hero/view_hero.php");
}
?>
