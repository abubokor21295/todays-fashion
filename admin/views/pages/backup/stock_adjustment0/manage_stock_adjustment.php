<?php
if(isset($_POST["btnDelete"])){
	$stock_adjustment_id=$_POST["txtId"];
	Stock_adjustment::delete($stock_adjustment_id);}
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
            <h3>Manage Stock_adjustment</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Stock_adjustment</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card">
      <div class='card-header'>
				<a href='create-stock-adjustment' class='btn btn-success'>New Stock_adjustment</a>
			</div>
				<div class='card-body'>
		<?php
			echo Stock_adjustment::manage_stock_adjustments();
		?>
			</div>
    <div class="card-footer">
      &nbsp;
    </div>
</div>

</section>
    <!-- /.content -->