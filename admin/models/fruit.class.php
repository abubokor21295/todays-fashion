<?php
class Fruit implements JsonSerializable{
	public $id;
	public $name;
	public $price;

	public function __construct(){
	}
	public function set($id,$name,$price){
		$this->id=$id;
		$this->name=$name;
		$this->price=$price;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}fruits(name,price)values('$this->name','$this->price')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}fruits set name='$this->name',price='$this->price' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}fruits where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,price from {$tx}fruits");
		$data=[];
		while($fruit=$result->fetch_object()){
			$data[]=$fruit;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,price from {$tx}fruits $criteria limit $top,$perpage");
		$data=[];
		while($fruit=$result->fetch_object()){
			$data[]=$fruit;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}fruits $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,price from {$tx}fruits where id='$id'");
		$fruit=$result->fetch_object();
			return $fruit;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}fruits");
		$fruit =$result->fetch_object();
		return $fruit->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Price:$this->price<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbFruit"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}fruits");
		while($fruit=$result->fetch_object()){
			$html.="<option value ='$fruit->id'>$fruit->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}fruits $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,price from {$tx}fruits $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-fruit\">New Fruit</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Price</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Price</th></tr>";
		}
		while($fruit=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$fruit->id, "name"=>"Details", "value"=>"Detials", "class"=>"info", "url"=>"details-fruit"]);
				$action_buttons.= action_button(["id"=>$fruit->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-fruit"]);
				$action_buttons.= action_button(["id"=>$fruit->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"fruits"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$fruit->id</td><td>$fruit->name</td><td>$fruit->price</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,price from {$tx}fruits where id={$id}");
		$fruit=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Fruit Details</th></tr>";
		$html.="<tr><th>Id</th><td>$fruit->id</td></tr>";
		$html.="<tr><th>Name</th><td>$fruit->name</td></tr>";
		$html.="<tr><th>Price</th><td>$fruit->price</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
