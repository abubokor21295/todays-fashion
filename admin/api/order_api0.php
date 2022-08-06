<?php

function create_order($customer_id,$order_date,$due_date,$shipping_address,$discount,$vat,$remark,$products){
  
  $order_date=date("Y-m-d",strtotime($order_date));//convert date into mysql format
  $due_date=date("Y-m-d",strtotime($due_date));//convert date into mysql format
  $now=date("Y-m-d H:i:s");
  $order=new Order("",$customer_id,$order_date,$due_date,$shipping_address,0,0,$remark,1,$discount,$vat,$now,$now);
  $order_id=$order->save();  
  
   

  foreach($products as $product){
    $orderdetails=new Order_detail("",$order_id,$product["item_id"],$product["qty"],$product["price"],0,$product["discount"],$now,$now);
    $orderdetails->save();
    
    $s=new Stock("",$product["item_id"],-$product["qty"],1,"Order",$now);//1 for sales order
    $s->save();
  }

  echo "Success";

 // print_r($products);

}

?>