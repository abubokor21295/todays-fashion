<?php
if(isset($_POST["btnEdit"])){
	$id=$_POST["txtId"];
	$obj=Order_detail::get_order_detail($id);
}
if(isset($_POST["btnUpdate"])){
	$id=$_POST["txtId"];
		$order_id=$_POST["cmbOrder"];
	$product_id=$_POST["cmbProduct"];
	$qty=$_POST["txtQty"];
	$price=$_POST["txtPrice"];
	$vat=$_POST["txtVat"];
	$discount=$_POST["txtDiscount"];
	$created_at=date("Y-m-d",strtotime($_POST["txtCreated_at"]));
	$updated_at=date("Y-m-d",strtotime($_POST["txtUpdated_at"]));

	$obj=new Order_detail($id,$order_id,$product_id,$qty,$price,$vat,$discount,$created_at,$updated_at);
	$obj->update();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Order_detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Order_detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='edit-order-detail' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-order-detail' class='btn btn-success'>Manage Order_detail</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->get_id()]);
$html.=select_field(["label"=>"Order Id","name"=>"cmbOrder","table"=>"orders","value"=>$obj->get_order_id()]);
$html.=select_field(["label"=>"Product Id","name"=>"cmbProduct","table"=>"products","value"=>$obj->get_product_id()]);
$html.=input_field(["label"=>"Qty","name"=>"txtQty","value"=>$obj->get_qty()]);
$html.=input_field(["label"=>"Price","name"=>"txtPrice","value"=>$obj->get_price()]);
$html.=input_field(["label"=>"Vat","name"=>"txtVat","value"=>$obj->get_vat()]);
$html.=input_field(["label"=>"Discount","name"=>"txtDiscount","value"=>$obj->get_discount()]);
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