<?php
if(isset($_POST["btnEdit"])){
	$id=$_POST["txtId"];
	$obj=Fish::get_fish($id);
}
if(isset($_POST["btnUpdate"])){
	$id=$_POST["txtId"];
		$name=$_POST["txtName"];
	$price=$_POST["txtPrice"];

	$obj=new Fish($id,$name,$price);
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
            <h3>Update Fish</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Fish</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='edit-fish' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-fish' class='btn btn-success'>Manage Fish</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->get_id()]);
$html.=input_field(["label"=>"Name","name"=>"txtName","value"=>$obj->get_name()]);
$html.=input_field(["label"=>"Price","name"=>"txtPrice","value"=>$obj->get_price()]);

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