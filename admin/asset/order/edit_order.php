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
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Plain Page</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Plain Page</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"><form class='form-horizontal' action='edit-order' method='post' enctype='multipart/form-data'><div class='card-header'>
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
</form></div>
                </div>
              </div>
            </div>
          </div>
        </div>