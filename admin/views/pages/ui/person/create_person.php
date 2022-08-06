<?php
if(isset($_POST["btnCreate"])){

		$name=$_POST["txtName"];
	$position_id=$_POST["cmbPosition"];
	$sex=$_POST["rdoSex"];
	$dob=date("Y-m-d",strtotime($_POST["txtDob"]));
	$doj=date("Y-m-d",strtotime($_POST["txtDoj"]));
	$mobile=$_POST["txtMobile"];
	$address=$_POST["txtAddress"];
	$inactive=isset($_POST["chkInactive"])?1:0;

	$obj=new Person("",$name,$position_id,$sex,$dob,$doj,$mobile,$address,$inactive);
	$obj->save();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 style="color:green;"><b><em>Today's Fashion</em></b></h1>
            <address>
                    <strong>Today's Fashion, Inc.</strong><br>
                    House:12, Road:1<br>
                    Block:E<br>
                    Mobile: 017834433<br>
                    Email: info@ishop.com
                  </address>
            <h3>Create Person</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Person</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='create-person' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-person' class='btn btn-success'>Manage Person</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["label"=>"Name","name"=>"txtName"]);
$html.=select_field(["label"=>"Position Id","name"=>"cmbPosition","table"=>"positions"]);
$html.=input_field(["label"=>"Male","type"=>"radio","name"=>"rdoSex","value"=>"0"]);
$html.=input_field(["label"=>"Female","type"=>"radio","name"=>"rdoSex","value"=>"1"]);
$html.=input_field(["label"=>"Dob","type"=>"date","name"=>"txtDob"]);
$html.=input_field(["label"=>"Doj","type"=>"date","name"=>"txtDoj"]);
$html.=input_field(["label"=>"Mobile","name"=>"txtMobile"]);
$html.=input_field(["label"=>"Address","name"=>"txtAddress"]);
$html.=input_field(["label"=>"Inactive","type"=>"checkbox","name"=>"chkInactive","value"=>"1"]);

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