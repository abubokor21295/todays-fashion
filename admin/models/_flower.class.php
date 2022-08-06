<?php
class Flower implements JsonSerializable{
	private $id;
	private $name;
	private $price;


	function __construct($_id,$_name,$_price){
		$this->id=$_id;
		$this->name=$_name;
		$this->price=$_price;
	}

	public function set_id($id){
		$this->id=$id;
	}

	public function set_name($name){
		$this->name=$name;
	}

	public function set_price($price){
		$this->price=$price;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_name(){
		return $this->name;
	}

	public function get_price(){
		return $this->price;
	}

	public function __toString(){
		return "Id:<i>$this->id</i>, Name:<i>$this->name</i>, Price:<i>$this->price</i>";
	}

	public function jsonSerialize(){
		return get_object_vars($this);
	}

	public function json(){
		return json_encode($this);
	}

	static function get_last_id(){
		global $db,$tx;
		$result=$db->query("select max(id) from {$tx}flowers");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save(){
		global $db,$tx;
		$db->query("insert into {$tx}flowers(name,price)values('$this->name','$this->price')");
		return $db->insert_id;
	}

	function update(){
		global $db,$tx;
		$db->query("update {$tx}flowers set name='$this->name',price='$this->price' where id='$this->id'");
	}

	static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}flowers where id='$id'");
	}

	static function get_flower($id){
		global $db,$tx;
		$result=$db->query("select name,price from {$tx}flowers where id='$id'");
		list($name,$price)=$result->fetch_row();
		$flower=new Flower($id,$name,$price);
		return $flower;
	}

	static function get_obj_flower($id){
		global $db,$tx;
		$result=$db->query("select name,price from {$tx}flowers where id='$id'");
		$row=$result->fetch_object();
		$flower=new Flower($id,$row->name,$row->price);
		return $flower;
	}

	static function get_flower_json($id){
		global $db,$tx;
		$result=$db->query("select name,price from {$tx}flowers where id='$id'");
		$row=$result->fetch_object();
		$flower=new Flower($id,$row->name,$row->price);
		return json_encode($flower);
	}

	static function flower_selectbox($name="cmbFlower"){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}flowers");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_flowers(){
		global $db,$tx;
		$result=$db->query("select id,name,price from {$tx}flowers ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Price</th></tr>";
		while(list($id,$name,$price)=$result->fetch_row()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-flower"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-flower"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-flower"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$name</td><td>$price</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function manage_obj_flowers(){
		global $db,$tx;
		$result=$db->query("select id,name,price from {$tx}flowers ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Price</th></tr>";
		while($row=$result->fetch_object()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-flower"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-flower"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-flower"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$row->id</td><td>$row->name</td><td>$row->price</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_flowers(){
		global $db,$tx;
		$result=$db->query("select id,name,price from {$tx}flowers ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Price</th></tr>";
		while(list($id,$name,$price)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$name</td><td>$price</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_obj_flowers(){
		global $db,$tx;
		$result=$db->query("select id,name,price from {$tx}flowers ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Price</th></tr>";
		while($row=$result->fetch_object()){
			$html.="<tr><td>$row->id</td><td>$row->name</td><td>$row->price</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_flowers_json(){
		global $db,$tx;
		$result=$db->query("select id,name,price from {$tx}flowers ");
		$data=[];
		while($row=$result->fetch_object()){
			array_push($data,$row);
		}
		return json_encode($data);
	}

}
?>