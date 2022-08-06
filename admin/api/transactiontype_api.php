<?php
class TransactionTypeApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["transaction_types"=>TransactionType::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["transaction_types"=>TransactionType::pagination($page,$perpage),"total_records"=>TransactionType::count()]);
	}
	function find($data){
		echo json_encode(["transactiontype"=>TransactionType::find($data["id"])]);
	}
	function delete($data){
		TransactionType::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$transactiontype=new TransactionType();
		$transactiontype->name=$data["name"];

		$transactiontype->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$transactiontype=new TransactionType();
		$transactiontype->id=$data["id"];
		$transactiontype->name=$data["name"];

		$transactiontype->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
