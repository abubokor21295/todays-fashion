<?php
class OrderApi{

	
	function save($data){
		// print_r($data);
		$order_date=$data["txtOrderDate"];
		$due_date=$data["txtDueDate"];
		$order_date=date("Y-m-d",strtotime($order_date));
		$due_date=date("Y-m-d",strtotime($due_date));

		$products=$data["txtProducts"];
		$now=date("Y-m-d H:i:s");

		$order=new Order();
		$order->customer_id=$data["cmbCustomer"];
		$order->order_date=$order_date;
		$order->delivery_date=$due_date;
		$order->created_at=$now;
		$order->updated_at=$now;
		$order->shipping_address=$data["txtShippingAddress"];
		$order->order_total=$data["order_total"];
		//$order->paid_amount=$data["paid_amount"];
		$order->remark=$data["txtRemark"];
		$order->status_id=1;
		$order->discount=$data["txtDiscount"];
		$order->vat=$data["txtVat"];

		$order_id=$order->save();

		foreach($products as $product){

			$orderdetail=new OrderDetail();
			$orderdetail->order_id=$order_id;
			$orderdetail->product_id=$product["item_id"];
			$orderdetail->qty=$product["qty"];
			$orderdetail->price=$product["price"];
			//$orderdetail->vat=$product["vat"];
			$orderdetail->discount=$product["discount"];
			$orderdetail->created_at=$now;
			$orderdetail->updated_at=$now;

			$orderdetail->save();

			$stock=new Stock();
			$stock->product_id=$product["item_id"];
			$stock->qty=-$product["qty"];
			$stock->transaction_type_id=1;
			$stock->remark="Order";
			$stock->created_at=$now;

			$stock->save();
		}
		echo json_encode(["success" => "yes"]);
	}
	
}
?>
