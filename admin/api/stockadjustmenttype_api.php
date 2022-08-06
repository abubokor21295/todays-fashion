<?php
class StockAdjustmentTypeApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["stock_adjustment_types"=>StockAdjustmentType::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["stock_adjustment_types"=>StockAdjustmentType::pagination($page,$perpage),"total_records"=>StockAdjustmentType::count()]);
	}
	function find($data){
		echo json_encode(["stockadjustmenttype"=>StockAdjustmentType::find($data["id"])]);
	}
	function delete($data){
		StockAdjustmentType::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$stockadjustmenttype=new StockAdjustmentType();
		$stockadjustmenttype->name=$data["name"];
		$stockadjustmenttype->factor=$data["factor"];

		$stockadjustmenttype->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$stockadjustmenttype=new StockAdjustmentType();
		$stockadjustmenttype->id=$data["id"];
		$stockadjustmenttype->name=$data["name"];
		$stockadjustmenttype->factor=$data["factor"];

		$stockadjustmenttype->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
