<?php session_start();

  // require_once("db_config.php");
  // require_once("library/classes/system_log.class.php");

  $base_url="/cpanel";

  // $now=date("Y-m-d H:i:s");
  // $log=new System_log("","LOGOUT"," {$_SESSION["uid"]}-{$_SESSION["uname"]} user logged out",$now);
  // $log->save();
 
 unset($_SESSION["uid"]);
 unset($_SESSION["uname"]);
 unset($_SESSION["urole"]);
 session_destroy();
 
 header("location:$base_url");
?>