<?php
class WarehouseApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["warehouses"=>Warehouse::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["warehouses"=>Warehouse::pagination($page,$perpage),"total_records"=>Warehouse::count()]);
	}
	function find($data){
		echo json_encode(["warehouse"=>Warehouse::find($data["id"])]);
	}
	function delete($data){
		Warehouse::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$warehouse=new Warehouse();
		$warehouse->name=$data["name"];
		$warehouse->location=$data["location"];
		$warehouse->contact=$data["contact"];

		$warehouse->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$warehouse=new Warehouse();
		$warehouse->id=$data["id"];
		$warehouse->name=$data["name"];
		$warehouse->location=$data["location"];
		$warehouse->contact=$data["contact"];

		$warehouse->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
