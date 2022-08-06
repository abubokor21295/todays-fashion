<?php
class StockAdjustmentApi{
	// public function __construct(){
	// }
	// function index(){
	// 	echo json_encode(["stock_adjustments"=>StockAdjustment::all()]);
	// }
	// function pagination($data){
	// 	$page=$data["page"];
	// 	$perpage=$data["perpage"];
	// 	echo json_encode(["stock_adjustments"=>StockAdjustment::pagination($page,$perpage),"total_records"=>StockAdjustment::count()]);
	// }
	// function find($data){
	// 	echo json_encode(["stockadjustment"=>StockAdjustment::find($data["id"])]);
	// }
	// function delete($data){
	// 	StockAdjustment::delete($data["id"]);
	// 	echo json_encode(["success" => "yes"]);
	// }
	function save($data,$file=[]){

		$products=$data["txtProducts"];
		$warehouse_id=$data["cmbWarehouse"];
		
		$adjustment_date=$data["txtStockAdjustmentDate"];
		$now=date("Y-m-d H:m:s");
		$adjustment_date=date("Y-m-d",strtotime($adjustment_date));

		$stockadjustment=new StockAdjustment();
		$stockadjustment->adjustment_at=$adjustment_date;
		$stockadjustment->user_id=1;
		$stockadjustment->remark=$data["txtRemark"];
		$stockadjustment->adjustment_type_id=$data["cmbStockAdjustmentType_id"];
		$stockadjustment->warehouse_id=$warehouse_id;

		//echo $stockadjustment->warehouse_id;
		$stockadjustment_id=$stockadjustment->save();


		foreach($products as $product){

			$stockadjustmentdetail=new StockAdjustmentDetail();
			$stockadjustmentdetail->adjustment_id=$stockadjustment_id;
			$stockadjustmentdetail->product_id=$product["item_id"];
			$stockadjustmentdetail->qty=$product["qty"];
			$stockadjustmentdetail->price=$product["price"];

			$stockadjustmentdetail->save();

			$stock=new Stock();
			$stock->product_id=$product["item_id"];
			$stock->qty=$product["qty"];
			$stock->transaction_type_id=1;
			$stock->remark="Adjustment";
			$stock->created_at=$now;
			$stock->warehouse_id=$data["cmbWarehouse"];

			$stock->save();


		};	
		echo json_encode(["success" => "yes"]);
	}
// 	function update($data,$file=[]){
// 		$stockadjustment=new StockAdjustment();
// 		$stockadjustment->id=$data["id"];
// 		$stockadjustment->user_id=$data["user_id"];
// 		$stockadjustment->remark=$data["remark"];
// 		$stockadjustment->adjustment_type_id=$data["adjustment_type_id"];

// 		$stockadjustment->update();
// 		echo json_encode(["success" => "yes"]);
// 	}
 }
?>
