<?php
if(isset($_POST["btnEdit"])){
	$id=$_POST["txtId"];
	$obj=Student::get_student($id);
}
if(isset($_POST["btnUpdate"])){
	$id=$_POST["txtId"];
		$name=$_POST["txtName"];
	$mobile=$_POST["txtMobile"];
	$email=$_POST["txtEmail"];
	$created_at=$_POST["txtCreated_at"];
	$course=$_POST["txtCourse"];

	$obj=new Student($id,$name,$mobile,$email,$created_at,$course);
	$obj->update();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Student</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Student</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='edit-student' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-student' class='btn btn-success'>Manage Student</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->get_id()]);
$html.=input_field(["label"=>"Name","name"=>"txtName","value"=>$obj->get_name()]);
$html.=input_field(["label"=>"Mobile","name"=>"txtMobile","value"=>$obj->get_mobile()]);
$html.=input_field(["label"=>"Email","name"=>"txtEmail","value"=>$obj->get_email()]);
$html.=input_field(["label"=>"Created_at","name"=>"txtCreated_at","value"=>$obj->get_created_at()]);
$html.=input_field(["label"=>"Course","name"=>"txtCourse","value"=>$obj->get_course()]);

		echo $html;
?>
			</div>
				<div class='card-footer'>
<?php
	$html=input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]);
		echo $html;
?>
			</div>
</form>
</section>
    <!-- /.content -->