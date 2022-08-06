<?php
if(isset($_POST["btnDetails"])){
	$stock_adjustment_id=$_POST["txtId"];
	$obj=Stock_adjustment::get_stock_adjustment($stock_adjustment_id);
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
            <h3>Stock_adjustment Details</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Stock_adjustment Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><div class='card-header'>
				<a href='manage-stock-adjustment' class='btn btn-success'>Manage Stock_adjustment</a>
			</div>
				<div class='card-body'>
<?php
$html="<table class='table'>";
$html.="<tr><th>Id</th><td>{$obj->get_id()}</td></tr>
<tr><th>Adjustment At</th><td>{$obj->get_adjustment_at()}</td></tr>
<tr><th>User Id</th><td>{$obj->get_user_id()}</td></tr>
<tr><th>Remark</th><td>{$obj->get_remark()}</td></tr>
<tr><th>Adjustment Type Id</th><td>{$obj->get_adjustment_type_id()}</td></tr>
<tr><th>Werehouse Id</th><td>{$obj->get_werehouse_id()}</td></tr>
";
$html.="</table>";
		echo $html;
?>
			</div>
				<div class='card-footer'>
			</div>

</section>
    <!-- /.content -->