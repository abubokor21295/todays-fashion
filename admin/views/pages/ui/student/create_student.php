<?php
if(isset($_POST["btnCreate"])){

		$name=$_POST["txtName"];
	$mobile=$_POST["txtMobile"];
	$email=$_POST["txtEmail"];
	$created_at=$_POST["txtCreated_at"];
	$course=$_POST["txtCourse"];

	$obj=new Student("",$name,$mobile,$email,$created_at,$course);
	$obj->save();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Student</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Student</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='create-student' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-student' class='btn btn-success'>Manage Student</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["label"=>"Name","name"=>"txtName"]);
$html.=input_field(["label"=>"Mobile","name"=>"txtMobile"]);
$html.=input_field(["label"=>"Email","name"=>"txtEmail"]);
$html.=input_field(["label"=>"Created_at","name"=>"txtCreated_at"]);
$html.=input_field(["label"=>"Course","name"=>"txtCourse"]);

		echo $html;
?>
			</div>
				<div class='card-footer'>
<?php
	$html=input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Create"]);
		echo $html;
?>
			</div>
</form>

</section>
    <!-- /.content -->