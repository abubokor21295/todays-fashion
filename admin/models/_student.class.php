<?php
class Student{
	private $id;
	private $name;
	private $mobile;
	private $email;
	private $created_at;
	private $course;

	function __construct($_id,$_name,$_mobile,$_email,$_created_at,$_course){
		$this->id=$_id;
		$this->name=$_name;
		$this->mobile=$_mobile;
		$this->email=$_email;
		$this->created_at=$_created_at;
		$this->course=$_course;
	}

	public function set_id($id){
		$this->id=$id;
	}

	public function set_name($name){
		$this->name=$name;
	}

	public function set_mobile($mobile){
		$this->mobile=$mobile;
	}

	public function set_email($email){
		$this->email=$email;
	}

	public function set_created_at($created_at){
		$this->created_at=$created_at;
	}

	public function set_course($course){
		$this->course=$course;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_name(){
		return $this->name;
	}

	public function get_mobile(){
		return $this->mobile;
	}

	public function get_email(){
		return $this->email;
	}

	public function get_created_at(){
		return $this->created_at;
	}

	public function get_course(){
		return $this->course;
	}

	static function get_last_id(){
		global $db,$tx;
		$result=$db->query("select max(id) from {$tx}students");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save(){
		global $db,$tx;
		$db->query("insert into {$tx}students(name,mobile,email,created_at,course)values('$this->name','$this->mobile','$this->email','$this->created_at','$this->course')");
		return $db->insert_id;
	}

	function update(){
		global $db,$tx;
		$db->query("update {$tx}students set name='$this->name',mobile='$this->mobile',email='$this->email',created_at='$this->created_at',course='$this->course' where id='$this->id'");
	}

	static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}students where id='$id'");
	}

	static function get_student($id){
		global $db,$tx;
		$result=$db->query("select name,mobile,email,created_at,course from {$tx}students where id='$id'");
		list($name,$mobile,$email,$created_at,$course)=$result->fetch_row();
		$student=new Student($id,$name,$mobile,$email,$created_at,$course);
		return $student;
	}

	static function student_selectbox($name="cmbStudent"){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}students");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_students(){
		global $db,$tx;
		$result=$db->query("select id,name,mobile,email,created_at,course from {$tx}students ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Mobile</th><th>Email</th><th>Created_at</th><th>Course</th></tr>";
		while(list($id,$name,$mobile,$email,$created_at,$course)=$result->fetch_row()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-student"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-student"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-student"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$name</td><td>$mobile</td><td>$email</td><td>$created_at</td><td>$course</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_students(){
		global $db,$tx;
		$result=$db->query("select id,name,mobile,email,created_at,course from {$tx}students ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Mobile</th><th>Email</th><th>Created_at</th><th>Course</th></tr>";
		while(list($id,$name,$mobile,$email,$created_at,$course)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$name</td><td>$mobile</td><td>$email</td><td>$created_at</td><td>$course</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

}
?>