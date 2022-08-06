<?php
if(isset($_POST["btnDetails"])){
	$order_detail_id=$_POST["txtId"];
	$obj=Order_detail::get_order_detail($order_detail_id);
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order_detail Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order_detail Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><div class='card-header'>
				<a href='manage-order-detail' class='btn btn-success'>Manage Order_detail</a>
			</div>
				<div class='card-body'>
<?php
$html="<table class='table'>";
$html.="<tr><th>Id</th><td>{$obj->get_id()}</td></tr>
<tr><th>Order Id</th><td>{$obj->get_order_id()}</td></tr>
<tr><th>Product Id</th><td>{$obj->get_product_id()}</td></tr>
<tr><th>Qty</th><td>{$obj->get_qty()}</td></tr>
<tr><th>Price</th><td>{$obj->get_price()}</td></tr>
<tr><th>Vat</th><td>{$obj->get_vat()}</td></tr>
<tr><th>Discount</th><td>{$obj->get_discount()}</td></tr>
<tr><th>Created At</th><td>{$obj->get_created_at()}</td></tr>
<tr><th>Updated At</th><td>{$obj->get_updated_at()}</td></tr>
";
$html.="</table>";
		echo $html;
?>
			</div>
				<div class='card-footer'>
			</div>

</section>
    <!-- /.content -->