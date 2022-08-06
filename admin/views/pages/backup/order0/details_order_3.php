<?php
if(isset($_POST["btnDetails"])){
	$order_id=$_POST["txtId"];
	$obj=Order::get_order($order_id);
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
            <h3>Order Details</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><div class='card-header'>
				<a href='manage-order' class='btn btn-success'>Manage Order</a>
			</div>
				<div class='card-body'>
<?php
$html="<table class='table'>";
$html.="<tr><th>Id</th><td>{$obj->get_id()}</td></tr>
<tr><th>Customer Id</th><td>{$obj->get_customer_id()}</td></tr>
<tr><th>Order Date</th><td>{$obj->get_order_date()}</td></tr>
<tr><th>Delivery Date</th><td>{$obj->get_delivery_date()}</td></tr>
<tr><th>Shipping Address</th><td>{$obj->get_shipping_address()}</td></tr>
<tr><th>Order Total</th><td>{$obj->get_order_total()}</td></tr>
<tr><th>Paid Amount</th><td>{$obj->get_paid_amount()}</td></tr>
<tr><th>Remark</th><td>{$obj->get_remark()}</td></tr>
<tr><th>Status Id</th><td>{$obj->get_status_id()}</td></tr>
<tr><th>Discount</th><td>{$obj->get_discount()}</td></tr>
<tr><th>Vat</th><td>{$obj->get_vat()}</td></tr>
";
$html.="</table>";
		echo $html;
?>
			</div>
				<div class='card-footer'>
			</div>

</section>
    <!-- /.content -->