<?php

//System Placeholder
if($page=="create-role"){
    $found=include("views/pages/ui/role/create_role.php");        
}elseif($page=="edit-role"){
    $found=include("views/pages/ui/role/edit_role.php");  
}elseif($page=="manage-role"){
    $found=include("views/pages/ui/role/manage_role.php");  
}elseif($page=="details-role"){
    $found=include("views/pages/ui/role/details_role.php");
 }elseif($page=="create-user"){
    $found=include("views/pages/ui/user/create_user.php");  
}elseif($page=="edit-user"){
    $found=include("views/pages/ui/user/edit_user.php");  
}elseif($page=="users"){
    $found=include("views/pages/ui/user/manage_user.php"); 
}elseif($page=="details-user"){
    $found=include("views/pages/ui/user/details_user.php");    
}
elseif($page=="change-password"){
    $found=include("views/pages/ui/user/change_password.php");  
}elseif($page=="manage-system-log"){
    $found=include("views/pages/system/system_log/manage_system_log.php");  
}elseif($page=="settings"){

}elseif($page=="signout"){


}
?>