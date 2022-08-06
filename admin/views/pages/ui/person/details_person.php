<?php
if(isset($_POST["btnDetails"])){
	$person_id=$_POST["txtId"];
	$obj=Person::get_person($person_id);
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
            <h3>Person Details</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Person Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><div class='card-header'>
				<a href='manage-person' class='btn btn-success'>Manage Person</a>
			</div>
				<div class='card-body'>
<?php
$html="<table class='table'>";
$html.="<tr><th>Id</th><td>{$obj->get_id()}</td></tr>
<tr><th>Name</th><td>{$obj->get_name()}</td></tr>
<tr><th>Position Id</th><td>{$obj->get_position_id()}</td></tr>
<tr><th>Sex</th><td>{$obj->get_sex()}</td></tr>
<tr><th>Dob</th><td>{$obj->get_dob()}</td></tr>
<tr><th>Doj</th><td>{$obj->get_doj()}</td></tr>
<tr><th>Mobile</th><td>{$obj->get_mobile()}</td></tr>
<tr><th>Address</th><td>{$obj->get_address()}</td></tr>
<tr><th>Inactive</th><td>{$obj->get_inactive()}</td></tr>
";
$html.="</table>";
		echo $html;
?>
			</div>
				<div class='card-footer'>
			</div>

</section>
    <!-- /.content -->