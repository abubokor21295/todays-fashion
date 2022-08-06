<?php
if(isset($_POST["btnCreate"])){

		$order_id=$_POST["cmbOrder"];
	$product_id=$_POST["cmbProduct"];
	$qty=$_POST["txtQty"];
	$price=$_POST["txtPrice"];
	$vat=$_POST["txtVat"];
	$discount=$_POST["txtDiscount"];
	$created_at=date("Y-m-d",strtotime($_POST["txtCreated_at"]));
	$updated_at=date("Y-m-d",strtotime($_POST["txtUpdated_at"]));

	$obj=new Order_detail("",$order_id,$product_id,$qty,$price,$vat,$discount,$created_at,$updated_at);
	$obj->save();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Order_detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Order_detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='create-order-detail' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-order-detail' class='btn btn-success'>Manage Order detail</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=select_field(["label"=>"Order Id","name"=>"cmbOrder","table"=>"orders"]);
$html.=select_field(["label"=>"Product Id","name"=>"cmbProduct","table"=>"products"]);
$html.=input_field(["label"=>"Qty","name"=>"txtQty"]);
$html.=input_field(["label"=>"Price","name"=>"txtPrice"]);
$html.=input_field(["label"=>"Vat","name"=>"txtVat"]);
$html.=input_field(["label"=>"Discount","name"=>"txtDiscount"]);
$html.=input_field(["label"=>"Created At","type"=>"date","name"=>"txtCreated_at"]);
$html.=input_field(["label"=>"Updated At","type"=>"date","name"=>"txtUpdated_at"]);

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