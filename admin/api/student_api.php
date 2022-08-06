<?php
  function getStudent($id){      
    global $db;
    
    $result=$db->query("select * from students");

  }

?>