<?php
class RoleApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["roles"=>Role::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["roles"=>Role::pagination($page,$perpage),"total_records"=>Role::count()]);
	}
	function find($data){
		echo json_encode(["role"=>Role::find($data["id"])]);
	}
	function delete($data){
		Role::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$role=new Role();
		$role->name=$data["name"];

		$role->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$role=new Role();
		$role->id=$data["id"];
		$role->name=$data["name"];

		$role->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
