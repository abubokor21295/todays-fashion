<?php
class Project{
	private $id;
	private $name;
	private $type_id;
	private $description;
	private $photo;

	function __construct($_id,$_name,$_type_id,$_description,$_photo){
		$this->id=$_id;
		$this->name=$_name;
		$this->type_id=$_type_id;
		$this->description=$_description;
		$this->photo=$_photo;
	}

	public function set_id($id){
		$this->id=$id;
	}

	public function set_name($name){
		$this->name=$name;
	}

	public function set_type_id($type_id){
		$this->type_id=$type_id;
	}

	public function set_description($description){
		$this->description=$description;
	}

	public function set_photo($photo){
		$this->photo=$photo;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_name(){
		return $this->name;
	}

	public function get_type_id(){
		return $this->type_id;
	}

	public function get_description(){
		return $this->description;
	}

	public function get_photo(){
		return $this->photo;
	}

	static function get_last_id(){
		global $db,$tx;
		$result=$db->query("select max(id) from {$tx}projects");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save(){
		global $db,$tx;
		$db->query("insert into {$tx}projects(name,type_id,description,photo)values('$this->name','$this->type_id','$this->description','$this->photo')");
		return $db->insert_id;
	}

	function update(){
		global $db,$tx;
		$db->query("update {$tx}projects set name='$this->name',type_id='$this->type_id',description='$this->description',photo='$this->photo' where id='$this->id'");
	}

	static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}projects where id='$id'");
	}

	static function get_project($id){
		global $db,$tx;
		$result=$db->query("select name,type_id,description,photo from {$tx}projects where id='$id'");
		list($name,$type_id,$description,$photo)=$result->fetch_row();
		$project=new Project($id,$name,$type_id,$description,$photo);
		return $project;
	}

	static function project_selectbox($name="cmbProject"){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}projects");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_projects(){
		global $db,$tx;
		$result=$db->query("select id,name,type_id,description,photo from {$tx}projects ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Type_id</th><th>Description</th><th>Photo</th></tr>";
		while(list($id,$name,$type_id,$description,$photo)=$result->fetch_row()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-project"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-project"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-project"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$name</td><td>$type_id</td><td>$description</td><td><img src='img/$photo' width='150' /> </td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_projects(){
		global $db,$tx;
		$result=$db->query("select id,name,type_id,description,photo from {$tx}projects ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Type_id</th><th>Description</th><th>Photo</th></tr>";
		while(list($id,$name,$type_id,$description,$photo)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$name</td><td>$type_id</td><td>$description</td><td><img src='img/$photo' width='150' /> </td></tr>";
		}
		$html.="</table>";
		return $html;
	}

}
?>