<?php
if(isset($_POST["btnEdit"])){
	$user_id=$_POST["txtId"];
	$obj=User::get_user($user_id);
}
if(isset($_POST["btnUpdate"])){
	$user_id=$_POST["txtId"];
		$username=$_POST["txtUsername"];
	$role_id=$_POST["cmbRole"];
	$password=$_POST["txtPassword"];
	$email=$_POST["txtEmail"];
	$full_name=$_POST["txtFull_name"];
	$created_at=$_POST["txtCreated_at"];
	$photo=$_POST["txtPhoto"];
	$verify_code=$_POST["txtVerify_code"];
	$inactive=$_POST["txtInactive"];

	$obj=new User($user_id,$username,$role_id,$password,$email,$full_name,$created_at,$photo,$verify_code,$inactive);
	$obj->update();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='edit-user' method='post'><div class='card-header'>
				<a href='manage-user' class='btn btn-success'>Manage User</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->id]);
$html.=input_field(["label"=>"Username","name"=>"txtUsername","value"=>$obj->username]);
$html.=select_field(["label"=>"Role","name"=>"cmbRole","table"=>"roles","value"=>$obj->role_id]);
$html.=input_field(["label"=>"Password","name"=>"txtPassword","value"=>$obj->password]);
$html.=input_field(["label"=>"Email","name"=>"txtEmail","value"=>$obj->email]);
$html.=input_field(["label"=>"Full_name","name"=>"txtFull_name","value"=>$obj->full_name]);
$html.=input_field(["label"=>"Created_at","name"=>"txtCreated_at","value"=>$obj->created_at]);
$html.=input_field(["label"=>"Photo","name"=>"txtPhoto","value"=>$obj->photo]);
$html.=input_field(["label"=>"Verify_code","name"=>"txtVerify_code","value"=>$obj->verify_code]);
$html.=input_field(["label"=>"Inactive","name"=>"txtInactive","value"=>$obj->inactive]);

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