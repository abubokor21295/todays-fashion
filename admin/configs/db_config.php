<?php
   
   //Remote
     //define("SERVER","intels.co");
    // define("USER","bokor");//bokor
    // define("DATABASE","wdpf48_bokor");
    // define("PASSWORD","bokor@b890;");

   //Local
    define("SERVER","localhost");
    define("USER","root");//
    define("DATABASE","test");
    define("PASSWORD","");

    $db=new mysqli(SERVER,USER,PASSWORD,DATABASE);
    $tx="core_";
    

?>