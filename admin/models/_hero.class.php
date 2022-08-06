<?php
class Hero implements JsonSerializable{
	private $id;
	private $name;


	function __construct($_id,$_name){
		$this->id=$_id;
		$this->name=$_name;
	}

	public function set_id($id){
		$this->id=$id;
	}

	public function set_name($name){
		$this->name=$name;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_name(){
		return $this->name;
	}

	public function __toString(){
		return "Id:<i>$this->id</i>, Name:<i>$this->name</i>";
	}

	public function jsonSerialize(){
		return get_object_vars($this);
	}

	public function json(){
		return json_encode($this);
	}

	static function get_last_id(){
		global $db,$tx;
		$result=$db->query("select max(id) from {$tx}heros");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save(){
		global $db,$tx;
		$db->query("insert into {$tx}heros(name)values('$this->name')");
		return $db->insert_id;
	}

	function update(){
		global $db,$tx;
		$db->query("update {$tx}heros set name='$this->name' where id='$this->id'");
	}

	static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}heros where id='$id'");
	}

	static function get_hero($id){
		global $db,$tx;
		$result=$db->query("select name from {$tx}heros where id='$id'");
		list($name)=$result->fetch_row();
		$hero=new Hero($id,$name);
		return $hero;
	}

	static function get_obj_hero($id){
		global $db,$tx;
		$result=$db->query("select name from {$tx}heros where id='$id'");
		$row=$result->fetch_object();
		$hero=new Hero($id,$row->name);
		return $hero;
	}

	static function get_hero_json($id){
		global $db,$tx;
		$result=$db->query("select name from {$tx}heros where id='$id'");
		$row=$result->fetch_object();
		$hero=new Hero($id,$row->name);
		return json_encode($hero);
	}

	static function hero_selectbox($name="cmbHero"){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}heros");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_heros(){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}heros ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th></tr>";
		while(list($id,$name)=$result->fetch_row()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-hero"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-hero"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-hero"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$name</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function manage_obj_heros(){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}heros ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th></tr>";
		while($row=$result->fetch_object()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-hero"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-hero"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-hero"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$row->id</td><td>$row->name</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_heros(){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}heros ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th></tr>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$name</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_obj_heros(){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}heros ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th></tr>";
		while($row=$result->fetch_object()){
			$html.="<tr><td>$row->id</td><td>$row->name</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_heros_json(){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}heros ");
		$data=[];
		while($row=$result->fetch_object()){
			array_push($data,$row);
		}
		return json_encode($data);
	}

}
?>