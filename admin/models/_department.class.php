<?php
class Department implements JsonSerializable{
	private $id;
	private $code;
	private $name;


	function __construct($_id,$_code,$_name){
		$this->id=$_id;
		$this->code=$_code;
		$this->name=$_name;
	}

	public function set_id($id){
		$this->id=$id;
	}

	public function set_code($code){
		$this->code=$code;
	}

	public function set_name($name){
		$this->name=$name;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_code(){
		return $this->code;
	}

	public function get_name(){
		return $this->name;
	}

	public function __toString(){
		return "Id:<i>$this->id</i>, Code:<i>$this->code</i>, Name:<i>$this->name</i>";
	}

	public function jsonSerialize(){
		return get_object_vars($this);
	}

	public function json(){
		return json_encode($this);
	}

	static function get_last_id(){
		global $db,$tx;
		$result=$db->query("select max(id) from {$tx}departments");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save(){
		global $db,$tx;
		$db->query("insert into {$tx}departments(code,name)values('$this->code','$this->name')");
		return $db->insert_id;
	}

	function update(){
		global $db,$tx;
		$db->query("update {$tx}departments set code='$this->code',name='$this->name' where id='$this->id'");
	}

	static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}departments where id='$id'");
	}

	static function get_department($id){
		global $db,$tx;
		$result=$db->query("select code,name from {$tx}departments where id='$id'");
		list($code,$name)=$result->fetch_row();
		$department=new Department($id,$code,$name);
		return $department;
	}

	static function get_obj_department($id){
		global $db,$tx;
		$result=$db->query("select code,name from {$tx}departments where id='$id'");
		$row=$result->fetch_object();
		$department=new Department($id,$row->code,$row->name);
		return $department;
	}

	static function get_department_json($id){
		global $db,$tx;
		$result=$db->query("select code,name from {$tx}departments where id='$id'");
		$row=$result->fetch_object();
		$department=new Department($id,$row->code,$row->name);
		return json_encode($department);
	}

	static function department_selectbox($name="cmbDepartment"){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}departments");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_departments(){
		global $db,$tx;
		$result=$db->query("select id,code,name from {$tx}departments ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Code</th><th>Name</th></tr>";
		while(list($id,$code,$name)=$result->fetch_row()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-department"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-department"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-department"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$code</td><td>$name</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function manage_obj_departments(){
		global $db,$tx;
		$result=$db->query("select id,code,name from {$tx}departments ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Code</th><th>Name</th></tr>";
		while($row=$result->fetch_object()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-department"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-department"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-department"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$row->id</td><td>$row->code</td><td>$row->name</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_departments(){
		global $db,$tx;
		$result=$db->query("select id,code,name from {$tx}departments ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Code</th><th>Name</th></tr>";
		while(list($id,$code,$name)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$code</td><td>$name</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_obj_departments(){
		global $db,$tx;
		$result=$db->query("select id,code,name from {$tx}departments ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Code</th><th>Name</th></tr>";
		while($row=$result->fetch_object()){
			$html.="<tr><td>$row->id</td><td>$row->code</td><td>$row->name</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_departments_json(){
		global $db,$tx;
		$result=$db->query("select id,code,name from {$tx}departments ");
		$data=[];
		while($row=$result->fetch_object()){
			array_push($data,$row);
		}
		return json_encode($data);
	}

}
?>