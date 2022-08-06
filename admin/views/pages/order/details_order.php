<?php
if(isset($_POST["btnDetails"])){
	$order=Order::find($_POST["txtId"]);
	$customer=Customer::find($order->customer_id);
	$order_details=OrderDetail::all_order_by_id($order->id);
	//print_r($order_details);
}
?>
<style>
 #cmbCustomer{
   padding:5px;
 }
</style>
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <div class="breadcrumbs-area clearfix">
              <h3 class="page-title pull-left">Order Details</h3>
              <div class="breadcrumbs pull-left mt-2 ms-2" >
                <span><a href="home">Home / </a></span>
                <span>Invoice</span>
              </div>
            </div>
          </div>
          <div class="col-sm-4"  style="text-align:center;">
            <h1 style="color:green;"><b>Today's Fashion</b></h1>
            <address>
                    <strong>Today's Fashion, Inc.</strong>
                    House:12, Road:1
                    Block:E<br>
                    Mobile: 017834433<br>
                    Email: info@ishop.com
            </address>
          </div>
          <div class="col-sm-4"></div>
          
        </div>
      </div><!-- /.container-fluid -->
</section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5>
              
              </h5>   
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h3>
                  Create Order
                    <small class="float-right">Date: <?php echo $order->order_date; ?></small>
                  </h3>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
					  
				            <?php
                      echo $customer->name;
                      echo "<br/>";
                      echo $customer->mobile;
                      echo "<br/>";
                      echo $customer->email;

                    ?>
                    <div class="customer-info"></div>
                  </address>
                  <div>
                     <strong>Shipping Address</string><br>
                     <textarea readonly><?php echo $order->shipping_address; ?></textarea>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                 
                  <table>
                    <tr><th><b>Order ID:</b></th><td><?php echo $order->id; ?></td></tr>
                    <tr><th><b>Order Date:</b></th><td><?php echo $order->order_date; ?></td></tr>
                    <tr><th><b>Due Date:</b></th><td><?php echo $order->delivery_date; ?></td></tr>
                  </table>
                </div>
				        <div class="col-sm-4 invoice-col">
                  
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
                      <th>Product SN</th>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Qty</th>                     
                      <th>Discount</th>
                      <th>Subtotal</th>
                    </tr>
                    
                        <?php
						$i=1;
						$sub_total=0;
                         foreach($order_details as $line){
							$line_total=$line->price*$line->qty-$line->discount;
							$sub_total+=$line_total;
						 
							echo"<tr>
									<td>".$i++."</td>
									<td>{$line->product}</td>
									<td>{$line->qty}</td>
									<td>{$line->price}</td>
									<td>{$line->discount}</td>
									<td>$line_total</td>
                     		 	</tr>";
					  
					  	};
					  ?>
                    </thead>
                    <tbody id="items">                    
                      
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
                    <textarea readonly><?php echo $order->remark ?> </textarea> 
                  </div>
                  
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  
                  
                  Thank you for shopping

                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                     <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td id="subtotal"><?php echo $sub_total; ?></td>
                      </tr>
                      <tr>
                        <th>Tax (5%)</th>
                        <td id="tax"><?php echo $order->vat; ?></td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td id="shopping-cost"><?php $shipping_cost=0; echo  $shipping_cost; ?></td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td id="net-total"><?php $net_total=$sub_total+$order->vat+$shipping_cost; echo $net_total; ?></td>
                      </tr>
                    </tbody></table>
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
