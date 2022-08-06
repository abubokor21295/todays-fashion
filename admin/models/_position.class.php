<?php
class Position implements JsonSerializable{
	private $id;
	private $name;
	private $grade;
	private $department_id;


	function __construct($_id,$_name,$_grade,$_department_id){
		$this->id=$_id;
		$this->name=$_name;
		$this->grade=$_grade;
		$this->department_id=$_department_id;
	}

	public function set_id($id){
		$this->id=$id;
	}

	public function set_name($name){
		$this->name=$name;
	}

	public function set_grade($grade){
		$this->grade=$grade;
	}

	public function set_department_id($department_id){
		$this->department_id=$department_id;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_name(){
		return $this->name;
	}

	public function get_grade(){
		return $this->grade;
	}

	public function get_department_id(){
		return $this->department_id;
	}

	public function __toString(){
		return "Id:<i>$this->id</i>, Name:<i>$this->name</i>, Grade:<i>$this->grade</i>, Department_id:<i>$this->department_id</i>";
	}

	public function jsonSerialize(){
		return get_object_vars($this);
	}

	public function json(){
		return json_encode($this);
	}

	static function get_last_id(){
		global $db,$tx;
		$result=$db->query("select max(id) from {$tx}positions");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save(){
		global $db,$tx;
		$db->query("insert into {$tx}positions(name,grade,department_id)values('$this->name','$this->grade','$this->department_id')");
		return $db->insert_id;
	}

	function update(){
		global $db,$tx;
		$db->query("update {$tx}positions set name='$this->name',grade='$this->grade',department_id='$this->department_id' where id='$this->id'");
	}

	static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}positions where id='$id'");
	}

	static function get_position($id){
		global $db,$tx;
		$result=$db->query("select name,grade,department_id from {$tx}positions where id='$id'");
		list($name,$grade,$department_id)=$result->fetch_row();
		$position=new Position($id,$name,$grade,$department_id);
		return $position;
	}

	static function get_obj_position($id){
		global $db,$tx;
		$result=$db->query("select name,grade,department_id from {$tx}positions where id='$id'");
		$row=$result->fetch_object();
		$position=new Position($id,$row->name,$row->grade,$row->department_id);
		return $position;
	}

	static function get_position_json($id){
		global $db,$tx;
		$result=$db->query("select name,grade,department_id from {$tx}positions where id='$id'");
		$row=$result->fetch_object();
		$position=new Position($id,$row->name,$row->grade,$row->department_id);
		return json_encode($position);
	}

	static function position_selectbox($name="cmbPosition"){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}positions");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_positions(){
		global $db,$tx;
		$result=$db->query("select id,name,grade,department_id from {$tx}positions ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Grade</th><th>Department Id</th></tr>";
		while(list($id,$name,$grade,$department_id)=$result->fetch_row()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-position"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-position"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-position"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$name</td><td>$grade</td><td>$department_id</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function manage_obj_positions(){
		global $db,$tx;
		$result=$db->query("select id,name,grade,department_id from {$tx}positions ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Grade</th><th>Department Id</th></tr>";
		while($row=$result->fetch_object()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-position"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-position"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-position"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$row->id</td><td>$row->name</td><td>$row->grade</td><td>$row->department_id</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_positions(){
		global $db,$tx;
		$result=$db->query("select id,name,grade,department_id from {$tx}positions ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Grade</th><th>Department Id</th></tr>";
		while(list($id,$name,$grade,$department_id)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$name</td><td>$grade</td><td>$department_id</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_obj_positions(){
		global $db,$tx;
		$result=$db->query("select id,name,grade,department_id from {$tx}positions ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Grade</th><th>Department Id</th></tr>";
		while($row=$result->fetch_object()){
			$html.="<tr><td>$row->id</td><td>$row->name</td><td>$row->grade</td><td>$row->department_id</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_positions_json(){
		global $db,$tx;
		$result=$db->query("select id,name,grade,department_id from {$tx}positions ");
		$data=[];
		while($row=$result->fetch_object()){
			array_push($data,$row);
		}
		return json_encode($data);
	}

}
?>