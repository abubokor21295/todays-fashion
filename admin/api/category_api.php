<?php
class CategoryApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["categories"=>Category::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["categories"=>Category::pagination($page,$perpage),"total_records"=>Category::count()]);
	}
	function find($data){
		echo json_encode(["category"=>Category::find($data["id"])]);
	}
	function delete($data){
		Category::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$category=new Category();
		$category->name=$data["name"];

		$category->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$category=new Category();
		$category->id=$data["id"];
		$category->name=$data["name"];

		$category->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
