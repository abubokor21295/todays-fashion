<?php
class FruitApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["fruits"=>Fruit::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["fruits"=>Fruit::pagination($page,$perpage),"total_records"=>Fruit::count()]);
	}
	function find($data){
		echo json_encode(["fruit"=>Fruit::find($data["id"])]);
	}
	function delete($data){
		Fruit::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$fruit=new Fruit();
		$fruit->name=$data["name"];
		$fruit->price=$data["price"];

		$fruit->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$fruit=new Fruit();
		$fruit->id=$data["id"];
		$fruit->name=$data["name"];
		$fruit->price=$data["price"];

		$fruit->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
