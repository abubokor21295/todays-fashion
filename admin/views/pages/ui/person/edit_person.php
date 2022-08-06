<?php
if(isset($_POST["btnEdit"])){
	$id=$_POST["txtId"];
	$obj=Person::get_person($id);
}
if(isset($_POST["btnUpdate"])){
	$id=$_POST["txtId"];
		$name=$_POST["txtName"];
	$position_id=$_POST["cmbPosition"];
	$sex=$_POST["rdoSex"];
	$dob=date("Y-m-d",strtotime($_POST["txtDob"]));
	$doj=date("Y-m-d",strtotime($_POST["txtDoj"]));
	$mobile=$_POST["txtMobile"];
	$address=$_POST["txtAddress"];
	$inactive=isset($_POST["chkInactive"])?1:0;

	$obj=new Person($id,$name,$position_id,$sex,$dob,$doj,$mobile,$address,$inactive);
	$obj->update();
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
            <h3>Update Person</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Person</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='edit-person' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-person' class='btn btn-success'>Manage Person</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->get_id()]);
$html.=input_field(["label"=>"Name","name"=>"txtName","value"=>$obj->get_name()]);
$html.=select_field(["label"=>"Position Id","name"=>"cmbPosition","table"=>"positions","value"=>$obj->get_position_id()]);
$html.=input_field(["label"=>"Male","type"=>"radio","name"=>"rdoSex","checked"=>$obj->get_sex()?"":"checked","value"=>$obj->get_sex()]);
$html.=input_field(["label"=>"Female","type"=>"radio","name"=>"rdoSex","checked"=>$obj->get_sex()?"checked":"","value"=>$obj->get_sex()]);
$html.=input_field(["label"=>"Dob","type"=>"date","name"=>"txtDob","value"=>$obj->get_dob()]);
$html.=input_field(["label"=>"Doj","type"=>"date","name"=>"txtDoj","value"=>$obj->get_doj()]);
$html.=input_field(["label"=>"Mobile","name"=>"txtMobile","value"=>$obj->get_mobile()]);
$html.=input_field(["label"=>"Address","name"=>"txtAddress","value"=>$obj->get_address()]);
$html.=input_field(["label"=>"Inactive","type"=>"checkbox","name"=>"ckhInactive","checked"=>$obj->get_inactive()?"checked":"","value"=>$obj->get_inactive()]);

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