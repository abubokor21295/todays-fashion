<?php
class Stock_adjustment_type implements JsonSerializable{
	private $id;
	private $name;
	private $factor;


	function __construct($_id,$_name,$_factor){
		$this->id=$_id;
		$this->name=$_name;
		$this->factor=$_factor;
	}

	public function set_id($id){
		$this->id=$id;
	}

	public function set_name($name){
		$this->name=$name;
	}

	public function set_factor($factor){
		$this->factor=$factor;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_name(){
		return $this->name;
	}

	public function get_factor(){
		return $this->factor;
	}

	public function __toString(){
		return "Id:<i>$this->id</i>, Name:<i>$this->name</i>, Factor:<i>$this->factor</i>";
	}

	public function jsonSerialize(){
		return get_object_vars($this);
	}

	public function json(){
		return json_encode($this);
	}

	static function get_last_id(){
		global $db,$tx;
		$result=$db->query("select max(id) from {$tx}stock_adjustment_types");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save(){
		global $db,$tx;
		$db->query("insert into {$tx}stock_adjustment_types(name,factor)values('$this->name','$this->factor')");
		return $db->insert_id;
	}

	function update(){
		global $db,$tx;
		$db->query("update {$tx}stock_adjustment_types set name='$this->name',factor='$this->factor' where id='$this->id'");
	}

	static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}stock_adjustment_types where id='$id'");
	}

	static function get_stock_adjustment_type($id){
		global $db,$tx;
		$result=$db->query("select name,factor from {$tx}stock_adjustment_types where id='$id'");
		list($name,$factor)=$result->fetch_row();
		$stock_adjustment_type=new Stock_adjustment_type($id,$name,$factor);
		return $stock_adjustment_type;
	}

	static function get_obj_stock_adjustment_type($id){
		global $db,$tx;
		$result=$db->query("select name,factor from {$tx}stock_adjustment_types where id='$id'");
		$row=$result->fetch_object();
		$stock_adjustment_type=new Stock_adjustment_type($id,$row->name,$row->factor);
		return $stock_adjustment_type;
	}

	static function get_stock_adjustment_type_json($id){
		global $db,$tx;
		$result=$db->query("select name,factor from {$tx}stock_adjustment_types where id='$id'");
		$row=$result->fetch_object();
		$stock_adjustment_type=new Stock_adjustment_type($id,$row->name,$row->factor);
		return json_encode($stock_adjustment_type);
	}

	static function stock_adjustment_type_selectbox($name="cmbStock_adjustment_type"){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}stock_adjustment_types");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_stock_adjustment_types(){
		global $db,$tx;
		$result=$db->query("select id,name,factor from {$tx}stock_adjustment_types ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Factor</th></tr>";
		while(list($id,$name,$factor)=$result->fetch_row()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-stock-adjustment-type"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-stock-adjustment-type"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-stock-adjustment-type"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$name</td><td>$factor</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function manage_obj_stock_adjustment_types(){
		global $db,$tx;
		$result=$db->query("select id,name,factor from {$tx}stock_adjustment_types ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Factor</th></tr>";
		while($row=$result->fetch_object()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-stock-adjustment-type"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-stock-adjustment-type"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-stock-adjustment-type"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$row->id</td><td>$row->name</td><td>$row->factor</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_stock_adjustment_types(){
		global $db,$tx;
		$result=$db->query("select id,name,factor from {$tx}stock_adjustment_types ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Factor</th></tr>";
		while(list($id,$name,$factor)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$name</td><td>$factor</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_obj_stock_adjustment_types(){
		global $db,$tx;
		$result=$db->query("select id,name,factor from {$tx}stock_adjustment_types ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Factor</th></tr>";
		while($row=$result->fetch_object()){
			$html.="<tr><td>$row->id</td><td>$row->name</td><td>$row->factor</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_stock_adjustment_types_json(){
		global $db,$tx;
		$result=$db->query("select id,name,factor from {$tx}stock_adjustment_types ");
		$data=[];
		while($row=$result->fetch_object()){
			array_push($data,$row);
		}
		return json_encode($data);
	}

}
?>