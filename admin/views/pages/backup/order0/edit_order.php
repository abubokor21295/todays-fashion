<?php
if(isset($_POST["btnEdit"])){
	$id=$_POST["txtId"];
	$obj=Order::get_order($id);
}
if(isset($_POST["btnUpdate"])){
	$id=$_POST["txtId"];
		$customer_id=$_POST["cmbCustomer"];
	$order_date=$_POST["txtOrder_date"];
	$delivery_date=$_POST["txtDelivery_date"];
	$shipping_address=$_POST["txtShipping_address"];
	$order_total=$_POST["txtOrder_total"];
	$paid_amount=$_POST["txtPaid_amount"];
	$remark=$_POST["txtRemark"];
	$status_id=$_POST["cmbStatus"];
	$discount=$_POST["txtDiscount"];
	$vat=$_POST["txtVat"];
	$created_at=date("Y-m-d",strtotime($_POST["txtCreated_at"]));
	$updated_at=date("Y-m-d",strtotime($_POST["txtUpdated_at"]));

	$obj=new Order($id,$customer_id,$order_date,$delivery_date,$shipping_address,$order_total,$paid_amount,$remark,$status_id,$discount,$vat,$created_at,$updated_at);
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
                  <h3>Update Order<h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='edit-order' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-order' class='btn btn-success'>Manage Order</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->get_id()]);
$html.=select_field(["label"=>"Customer Id","name"=>"cmbCustomer","table"=>"customers","value"=>$obj->get_customer_id()]);
$html.=input_field(["label"=>"Order Date","name"=>"txtOrder_date","value"=>$obj->get_order_date()]);
$html.=input_field(["label"=>"Delivery Date","name"=>"txtDelivery_date","value"=>$obj->get_delivery_date()]);
$html.=input_field(["label"=>"Shipping Address","name"=>"txtShipping_address","value"=>$obj->get_shipping_address()]);
$html.=input_field(["label"=>"Order Total","name"=>"txtOrder_total","value"=>$obj->get_order_total()]);
$html.=input_field(["label"=>"Paid Amount","name"=>"txtPaid_amount","value"=>$obj->get_paid_amount()]);
$html.=input_field(["label"=>"Remark","name"=>"txtRemark","value"=>$obj->get_remark()]);
$html.=select_field(["label"=>"Status Id","name"=>"cmbStatus","table"=>"statuss","value"=>$obj->get_status_id()]);
$html.=input_field(["label"=>"Discount","name"=>"txtDiscount","value"=>$obj->get_discount()]);
$html.=input_field(["label"=>"Vat","name"=>"txtVat","value"=>$obj->get_vat()]);
$html.=input_field(["label"=>"Created At","type"=>"date","name"=>"txtCreated_at","value"=>$obj->get_created_at()]);
$html.=input_field(["label"=>"Updated At","type"=>"date","name"=>"txtUpdated_at","value"=>$obj->get_updated_at()]);

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