<?php
if(isset($_POST["btnCreate"])){

		$name=$_POST["txtName"];

	$obj=new Hero("",$name);
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
            <h3>Create Hero</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Hero</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='create-hero' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-hero' class='btn btn-success'>Manage Hero</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["label"=>"Name","name"=>"txtName"]);

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