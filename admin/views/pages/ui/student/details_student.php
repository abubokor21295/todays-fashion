<?php
if(isset($_POST["btnDetails"])){
	$student_id=$_POST["txtId"];
	$obj=Student::get_student($student_id);
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><div class='card-header'>
				<a href='manage-student' class='btn btn-success'>Manage Student</a>
			</div>
				<div class='card-body'>
<?php
$html="<table class='table'>";
$html.="<tr><th>Id</th><td>{$obj->get_id()}</td></tr>
<tr><th>Name</th><td>{$obj->get_name()}</td></tr>
<tr><th>Mobile</th><td>{$obj->get_mobile()}</td></tr>
<tr><th>Email</th><td>{$obj->get_email()}</td></tr>
<tr><th>Created_at</th><td>{$obj->get_created_at()}</td></tr>
<tr><th>Course</th><td>{$obj->get_course()}</td></tr>
";
$html.="</table>";
		echo $html;
?>
			</div>
				<div class='card-footer'>
			</div>

</section>
    <!-- /.content -->