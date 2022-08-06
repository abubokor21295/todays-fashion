<?php
	
function get_product($id){
     $product=Product::get_product($id);
     echo $product->get_regular_price();
}

// function getProduct($id){
//      global $db,$tx;
    
//      $result=$db->query("select id,name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,featured,star,is_brand_item,discount from {$tx}products where id='$id'");  
//      $row=$result->fetch_object();    
//      echo json_encode($row);
// }

// function getProducts(){
//      global $db,$tx;    
//      $result=$db->query("select id,name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,featured,star,is_brand_item,discount from {$tx}products");  
//      $data=[];
//      while($row=$result->fetch_object()){        
//        array_push($data,$row);        
//      }    
//      echo json_encode($data);
// }

// function deleteProduct($id){
//      global $db,$tx;
//      $db->query("delete from {$tx}products where id='$id'");
//      echo json_encode(["success"=>"Successfully deleted"]);
// }




?>