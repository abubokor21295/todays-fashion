<?php
	class PurchaseApi{

		
		function save($data){
			// print_r($data);
			$purchase_date=$data["txtPurchaseDate"];
			$deliverypurchase=$data["txtDeliveryDate"];
			$purchase_date=date("Y-m-d",strtotime($purchase_date));
			$delivery_date=date("Y-m-d",strtotime($delivery_date));

			$products=$data["txtProducts"];
			$now=date("Y-m-d H:i:s");

			$purchase=new Purchase();
			$purchase->supplier_id=$data["cmbSupplier"];
			$purchase->purchase_date=$purchase_date;
			$purchase->delivery_date=$delivery_date;
			$purchase->created_at=$now;
			$purchase->updated_at=$now;
			$purchase->shipping_address=$data["txtShippingAddress"];
			$purchase->purchase_total=$data["purchase_total"];
			//$order->paid_amount=$data["paid_amount"];
			$purchase->remark=$data["txtRemark"];
			$purchase->status_id=1;
			$purchase->discount=$data["txtDiscount"];
			$purchase->vat=$data["txtVat"];

			$purchase_id=$purchase->save();

			foreach($products as $product){

				$purchasedetail=new PurchaseDetail();
				$purchasedetail->purchase_id=$purchase_id;
				$purchasedetail->product_id=$product["item_id"];
				$purchasedetail->qty=$product["qty"];
				$purchasedetail->price=$product["price"];
				//$orderdetail->vat=$product["vat"];
				$purchasedetail->discount=$product["discount"];
				$purchasedetail->created_at=$now;
				$purchasedetail->updated_at=$now;

				$purchasedetail->save();

				$stock=new Stock();
				$stock->product_id=$product["item_id"];
				$stock->qty=$product["qty"];
				$stock->transaction_type_id=1;
				$stock->remark="Purchase";
				$stock->created_at=$now;

				$stock->save();
			}
			echo json_encode(["success" => "yes"]);
		}
		
	}
?>
