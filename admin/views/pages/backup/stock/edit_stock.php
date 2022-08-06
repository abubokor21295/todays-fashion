<?php
if(isset($_POST["btnEdit"])){
	$id=$_POST["txtId"];
	$obj=Stock::get_stock($id);
}
if(isset($_POST["btnUpdate"])){
	$id=$_POST["txtId"];
		$product_id=$_POST["cmbProduct"];
	$qty=$_POST["txtQty"];
	$transaction_type_id=$_POST["cmbTransaction_type"];
	$remark=$_POST["txtRemark"];
	$created_at=date("Y-m-d",strtotime($_POST["txtCreated_at"]));

	$obj=new Stock($id,$product_id,$qty,$transaction_type_id,$remark,$created_at);
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
            <h3>Update Stock</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Stock</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='edit-stock' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-stock' class='btn btn-success'>Manage Stock</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->get_id()]);
$html.=select_field(["label"=>"Product Id","name"=>"cmbProduct","table"=>"products","value"=>$obj->get_product_id()]);
$html.=input_field(["label"=>"Qty","name"=>"txtQty","value"=>$obj->get_qty()]);
$html.=select_field(["label"=>"Transaction Type Id","name"=>"cmbTransaction_type","table"=>"transaction_types","value"=>$obj->get_transaction_type_id()]);
$html.=input_field(["label"=>"Remark","name"=>"txtRemark","value"=>$obj->get_remark()]);
$html.=input_field(["label"=>"Created At","type"=>"date","name"=>"txtCreated_at","value"=>$obj->get_created_at()]);

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