<?php
if(isset($_POST["btnDelete"])){
	$flower_id=$_POST["txtId"];
	Flower::delete($flower_id);}
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
            <h3>Manage Flower</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Flower</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card">
      <div class='card-header'>
				<a href='create-flower' class='btn btn-success'>New Flower</a>
			</div>
				<div class='card-body'>
		<?php
			echo Flower::manage_flowers();
		?>
			</div>
    <div class="card-footer">
      &nbsp;
    </div>
</div>

</section>
    <!-- /.content -->