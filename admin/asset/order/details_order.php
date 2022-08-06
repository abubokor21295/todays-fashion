<?php
if (isset($_POST["btnDetails"])) {
  $order_id = $_POST["txtId"];
  $obj = Order::get_order($order_id);
  $order_detail = Order_detail:: get_order_details_by_id($order_id);
}
?>
<?php
//               $html = "<table class='table'>";
//               $html .= "<tr><th>Id</th><td>{$obj->get_id()}</td></tr>
// <tr><th>Customer Id</th><td>{$obj->get_customer_id()}</td></tr>
// <tr><th>Order Date</th><td>{$obj->get_order_date()}</td></tr>
// <tr><th>Delivery Date</th><td>{$obj->get_delivery_date()}</td></tr>
// <tr><th>Shipping Address</th><td>{$obj->get_shipping_address()}</td></tr>
// <tr><th>Order Total</th><td>{$obj->get_order_total()}</td></tr>
// <tr><th>Paid Amount</th><td>{$obj->get_paid_amount()}</td></tr>
// <tr><th>Remark</th><td>{$obj->get_remark()}</td></tr>
// <tr><th>Status Id</th><td>{$obj->get_status_id()}</td></tr>
// <tr><th>Discount</th><td>{$obj->get_discount()}</td></tr>
// <tr><th>Vat</th><td>{$obj->get_vat()}</td></tr>
// <tr><th>Created At</th><td>{$obj->get_created_at()}</td></tr>
// <tr><th>Updated At</th><td>{$obj->get_updated_at()}</td></tr>
// ";
//               $html .= "</table>";
//               echo $html;
?>


<style>
  #cmbCustomer {
    padding: 5px;
  }
</style>
<!-- Content Header (Page header) -->
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
          <div class="x_content">
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>Create Order</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Create Order</li>
                    </ol>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>

            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="callout callout-info">
                      <h5><i class="fas fa-info"></i> Note:</h5>
                      This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                    </div>


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-12">
                          <h4>
                            <i class="fas fa-globe"></i> I-SHOP.
                            <small class="float-right">Date: <?php //echo date("d M Y") ?></small>
                          </h4>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          From
                          <address>
                            <strong>ISHOP, Inc.</strong><br>
                            House:12, Road:1<br>
                            Block:E<br>
                            Mobile: 017834433<br>
                            Email: info@ishop.com
                          </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          To
                          <address>

                            <?php
                            echo Customer::customer_selectbox();
                            ?>
                            <div class="customer-info"></div>
                          </address>
                          <div>
                            <strong>Shipping Address</string><br>
                              <textarea id="txtShippingAddress"><?php //echo $obj->get_shipping_address() ?></textarea>
                          </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">

                          <table>
                            <tr>
                              <td><b>Order ID:</b></td>
                              <td><input type="text" style="width:60px" value="<?php echo $obj->get_id() ?>" readonly /></td>
                            </tr>
                            <tr>
                              <td><b>Order Date:</b></td>
                              <td><input type="text" id="txtOrderDate" value=<?php echo $obj->get_order_date() ?> /></td>
                            </tr>
                            <tr>
                              <td><b>Due Date:</b></td>
                              <td><input type="text" id="txtDueDate" value=<?php echo $obj->get_delivery_date() ?> /></td>
                            </tr>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-12 table-responsive">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>SN</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Discount</th>
                                <th>Subtotal</th>
                                <th><input type="button" id="clearAll" value="Clear" /></th>
                              </tr>
                            </thead>
                            <tbody id="items">
                              <?php
                               foreach ($order_detail as $key) {
                                $code = "<tr>";
                                $code .= "<th>$key->id</th>
                                <th>$key->product_id</th>
                                <th>$key->price</th>
                                <th>$key->qty</th>
                                <th>$key->discount</th>
                                <th>Subtotal</th>
                                <th></th>";
                                $code .= "</tr>";

                               echo $code;
                              };
                              ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                          <p class="lead">Payment Methods:</p>
                          <img src="asset/dist/img/credit/visa.png" alt="Visa">
                          <img src="asset/dist/img/credit/mastercard.png" alt="Mastercard">
                          <img src="asset/dist/img/credit/american-express.png" alt="American Express">
                          <img src="asset/dist/img/credit/paypal2.png" alt="Paypal">

                          <div>
                            <strong>Remark</strong><br>
                            <textarea id="txtRemark"></textarea>
                          </div>

                          <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">


                            Thank you for shopping

                          </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                          <p class="lead">Amount Due 2/22/2014</p>

                          <div class="table-responsive">
                            <table class="table" id="table">
                              <tbody>
                                <tr>
                                  <th style="width:50%">Subtotal:</th>
                                  <td id="subtotal">0</td>
                                </tr>
                                <tr>
                                  <th>Tax (5%)</th>
                                  <td id="tax">0</td>
                                </tr>
                                <tr>
                                  <th>Shipping:</th>
                                  <td id="shopping-cost">0</td>
                                </tr>
                                <tr>
                                  <th>Total:</th>
                                  <td id="net-total">0</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-12">
                          <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                          <button type="button" id="btnProcessOrder" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Process Order </button>
                          <a href="manage-order" <button type="button" class="btn btn-info float-right"><i class="far fa-credit-card"></i></button>Manage Order</a>
                          <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                            <i class="fas fa-download"></i> Generate PDF
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- /.invoice -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="js/cart.js"></script>