<?php
class Person implements JsonSerializable{
	private $id;
	private $name;
	private $position_id;
	private $sex;
	private $dob;
	private $doj;
	private $mobile;
	private $address;
	private $inactive;


	function __construct($_id,$_name,$_position_id,$_sex,$_dob,$_doj,$_mobile,$_address,$_inactive){
		$this->id=$_id;
		$this->name=$_name;
		$this->position_id=$_position_id;
		$this->sex=$_sex;
		$this->dob=$_dob;
		$this->doj=$_doj;
		$this->mobile=$_mobile;
		$this->address=$_address;
		$this->inactive=$_inactive;
	}

	public function set_id($id){
		$this->id=$id;
	}

	public function set_name($name){
		$this->name=$name;
	}

	public function set_position_id($position_id){
		$this->position_id=$position_id;
	}

	public function set_sex($sex){
		$this->sex=$sex;
	}

	public function set_dob($dob){
		$this->dob=$dob;
	}

	public function set_doj($doj){
		$this->doj=$doj;
	}

	public function set_mobile($mobile){
		$this->mobile=$mobile;
	}

	public function set_address($address){
		$this->address=$address;
	}

	public function set_inactive($inactive){
		$this->inactive=$inactive;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_name(){
		return $this->name;
	}

	public function get_position_id(){
		return $this->position_id;
	}

	public function get_sex(){
		return $this->sex;
	}

	public function get_dob(){
		return $this->dob;
	}

	public function get_doj(){
		return $this->doj;
	}

	public function get_mobile(){
		return $this->mobile;
	}

	public function get_address(){
		return $this->address;
	}

	public function get_inactive(){
		return $this->inactive;
	}

	public function __toString(){
		return "Id:<i>$this->id</i>, Name:<i>$this->name</i>, Position_id:<i>$this->position_id</i>, Sex:<i>$this->sex</i>, Dob:<i>$this->dob</i>, Doj:<i>$this->doj</i>, Mobile:<i>$this->mobile</i>, Address:<i>$this->address</i>, Inactive:<i>$this->inactive</i>";
	}

	public function jsonSerialize(){
		return get_object_vars($this);
	}

	public function json(){
		return json_encode($this);
	}

	static function get_last_id(){
		global $db,$tx;
		$result=$db->query("select max(id) from {$tx}persons");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save(){
		global $db,$tx;
		$db->query("insert into {$tx}persons(name,position_id,sex,dob,doj,mobile,address,inactive)values('$this->name','$this->position_id','$this->sex','$this->dob','$this->doj','$this->mobile','$this->address','$this->inactive')");
		return $db->insert_id;
	}

	function update(){
		global $db,$tx;
		$db->query("update {$tx}persons set name='$this->name',position_id='$this->position_id',sex='$this->sex',dob='$this->dob',doj='$this->doj',mobile='$this->mobile',address='$this->address',inactive='$this->inactive' where id='$this->id'");
	}

	static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}persons where id='$id'");
	}

	static function get_person($id){
		global $db,$tx;
		$result=$db->query("select name,position_id,sex,dob,doj,mobile,address,inactive from {$tx}persons where id='$id'");
		list($name,$position_id,$sex,$dob,$doj,$mobile,$address,$inactive)=$result->fetch_row();
		$person=new Person($id,$name,$position_id,$sex,$dob,$doj,$mobile,$address,$inactive);
		return $person;
	}

	static function get_obj_person($id){
		global $db,$tx;
		$result=$db->query("select name,position_id,sex,dob,doj,mobile,address,inactive from {$tx}persons where id='$id'");
		$row=$result->fetch_object();
		$person=new Person($id,$row->name,$row->position_id,$row->sex,$row->dob,$row->doj,$row->mobile,$row->address,$row->inactive);
		return $person;
	}

	static function get_person_json($id){
		global $db,$tx;
		$result=$db->query("select name,position_id,sex,dob,doj,mobile,address,inactive from {$tx}persons where id='$id'");
		$row=$result->fetch_object();
		$person=new Person($id,$row->name,$row->position_id,$row->sex,$row->dob,$row->doj,$row->mobile,$row->address,$row->inactive);
		return json_encode($person);
	}

	static function person_selectbox($name="cmbPerson"){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}persons");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_persons(){
		global $db,$tx;
		$result=$db->query("select id,name,position_id,sex,dob,doj,mobile,address,inactive from {$tx}persons ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Position Id</th><th>Sex</th><th>Dob</th><th>Doj</th><th>Mobile</th><th>Address</th><th>Inactive</th></tr>";
		while(list($id,$name,$position_id,$sex,$dob,$doj,$mobile,$address,$inactive)=$result->fetch_row()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-person"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-person"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-person"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$name</td><td>$position_id</td><td>$sex</td><td>$dob</td><td>$doj</td><td>$mobile</td><td>$address</td><td>$inactive</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function manage_obj_persons(){
		global $db,$tx;
		$result=$db->query("select id,name,position_id,sex,dob,doj,mobile,address,inactive from {$tx}persons ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Position Id</th><th>Sex</th><th>Dob</th><th>Doj</th><th>Mobile</th><th>Address</th><th>Inactive</th></tr>";
		while($row=$result->fetch_object()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-person"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-person"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-person"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$row->id</td><td>$row->name</td><td>$row->position_id</td><td>$row->sex</td><td>$row->dob</td><td>$row->doj</td><td>$row->mobile</td><td>$row->address</td><td>$row->inactive</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_persons(){
		global $db,$tx;
		$result=$db->query("select id,name,position_id,sex,dob,doj,mobile,address,inactive from {$tx}persons ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Position Id</th><th>Sex</th><th>Dob</th><th>Doj</th><th>Mobile</th><th>Address</th><th>Inactive</th></tr>";
		while(list($id,$name,$position_id,$sex,$dob,$doj,$mobile,$address,$inactive)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$name</td><td>$position_id</td><td>$sex</td><td>$dob</td><td>$doj</td><td>$mobile</td><td>$address</td><td>$inactive</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_obj_persons(){
		global $db,$tx;
		$result=$db->query("select id,name,position_id,sex,dob,doj,mobile,address,inactive from {$tx}persons ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Position Id</th><th>Sex</th><th>Dob</th><th>Doj</th><th>Mobile</th><th>Address</th><th>Inactive</th></tr>";
		while($row=$result->fetch_object()){
			$html.="<tr><td>$row->id</td><td>$row->name</td><td>$row->position_id</td><td>$row->sex</td><td>$row->dob</td><td>$row->doj</td><td>$row->mobile</td><td>$row->address</td><td>$row->inactive</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_persons_json(){
		global $db,$tx;
		$result=$db->query("select id,name,position_id,sex,dob,doj,mobile,address,inactive from {$tx}persons ");
		$data=[];
		while($row=$result->fetch_object()){
			array_push($data,$row);
		}
		return json_encode($data);
	}

}
?>