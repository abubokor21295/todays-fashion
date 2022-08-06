<?php
if(isset($_POST["btnDetails"])){
	$order_id=$_POST["txtId"];
	$order=Order::get_order($order_id);
  $order_details=Order_detail::get_order_details_by_order_id_pro($order_id);
  $customer_details=Customer::get_customer($order->get_customer_id());
  //$product=Product::get_product($order_details->get_product_id());
  
}
?>

 <!-- Content Header (Page header) -->
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
                  <h3>Order Details <h3>
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

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
            <h5 class="float-right">Date: <?php echo date("d M Y")?></h5>
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
             
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                <h4 >Customer</h4>
                <h5 style="color:blue"><?php echo $customer_details->get_name(); ?></h5>
                
                  <?php
                    
                    echo $customer_details->get_mobile();
                    echo "<br/>";
                    echo $customer_details->get_email();
                  ?>
                
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  
                  <div>
                     <strong>Shipping Address</string><br>
                     <textarea id="txtShippingAddress"><?php echo $order->get_shipping_address() ?></textarea>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                 
                  <table>
                    <tr><td><b>Order ID:</b></td><td><input type="text" style="width:60px" value="<?php echo $order->get_id();?>"  readonly/></td></tr>
                    <tr><td><b>Order Date:</b></td><td><input type="text" id="txtOrderDate" value=<?php echo $order->get_order_date();?> disabled/></td></tr>
                    <tr><td><b>Due Date:</b></td><td><input type="text" id="txtDueDate" value=<?php echo $order->get_delivery_date();?> disabled/></td></tr>
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
                      <!-- <th>SN</th> -->
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Qty</th>                     
                      <th>Discount</th>
                      <th>Subtotal</th>
                      <th><input type="button" id="clearAll" value="Clear" disabled/></th>
                    </tr>
                   
                   <?php
                        $subtotal=0;
                        foreach($order_details as $row){
                          
                          $discount=$row->discount*$row->qty;
                          $sub=($row->price*$row->qty)-$discount;
                          echo "<tr><th>$row->product_name</th><th>$row->price</th><th>$row->qty</th><th>$discount</th><th>$sub</th></tr></br>";
                          $subtotal +=$sub;
                      }
                      
                    ?>
                   
                    <!-- <tr>
                      <th></th>
                      <th>
                        <?php
                          //echo Product::product_selectbox();
                       ?>
                      </th>
                        <th><input type="text" id="txtPrice" /></th>
                        <th><input type="text" id="txtQty" /></th>
                        <th><input type="text" id="txtDiscount" /></th>
                        <th></th>
                        <th><input type="button" id="btnAddToCart" value=" + " /></th>
                      </tr> -->
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
                    <textarea id="txtRemark"><?php echo $order->get_remark() ?></textarea> 
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
                        <td id="subtotal"><?php echo $subtotal; ?></td>
                      </tr>
                      <tr>
                        <th>Tax (5%)</th>
                        <td id="tax">
                          <?php 
                            $vat=$subtotal*0.05;
                            echo  $vat;
                          ?>
                      </td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td id="shopping-cost">0</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td id="net-total">
                            <?php
                                $net=$subtotal+$vat;
                                echo $net;
                            ?>
                        </td>
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
    <!-- /.content -->
<!-- <script>
      $(function() {  
        
        //Show calander in textbox
        $("#txtOrderDate").datepicker({dateFormat: 'dd-mm-yy'});
        $("#txtDueDate").datepicker({dateFormat: 'dd-mm-yy'});
        

        
        

        //Save into database table
        $("#btnProcessOrder").on("click",function(){
          

              let customer_id=$("#cmbCustomer").val();
              let order_date=$("#txtOrderDate").val();
              let due_date=$("#txtDueDate").val();
              let discount=0;
              let vat=0;
              let shipping_address=$("#txtShippingAddress").val();
              let remark=$("#txtRemark").val();

              let products= getCart();
              

              $.ajax({
                url:'api/create_order',
                type:'POST',
                data:{
                  "cmbCustomer":customer_id,
                  "txtOrderDate":order_date,
                  "txtDueDate":due_date,
                  "txtShippingAddress":shipping_address,
                  "txtDiscount":discount,
                  "txtVat":vat,
                  "txtRemark":remark,
                  "txtProducts":products
                },
                success:function(res){
                  console.log(res);
                  clearCart();
                  $("#items").html("");
                }
            });

        });   
             

      
        //Show customer other information
        $("#cmbCustomer").on("change",function(){        
          
           $.ajax({
             url:'api/get_customer',
             type:'POST',
             data:{"cmbCustomer":$(this).val()},
             success:function(res){
                 let customer=JSON.parse(res);
                 console.log(customer);
              
              $(".customer-info").html(customer.mobile+"<br>"+customer.email);
             }
           });


        });  //   


        
         //Show customer other information
         $("#cmbProduct").on("change",function(){

           $.ajax({
             url:'api/get_product',
             type:'POST',
             data:{"cmbProduct":$(this).val()},
             success:function(res){
               $("#txtPrice").val(res);
               $("#txtQty").val(1);
             }
           });

        });   //  
                       
          
       
       /*
         //cart
         [
          {'name':'jahid','item_id':20,'price':30,'qty':1,'discount':0,'subtotal':30},
          {'name':'jahid','item_id':20,'price':30,'qty':1,'discount':0,'subtotal':30},
          {'name':'jahid','item_id':20,'price':30,'qty':1,'discount':0,'subtotal':30},
          {'name':'jahid','item_id':20,'price':30,'qty':1,'discount':0,'subtotal':30}          
         ]
        */ 
      
      //Add item to bill temporarily

        $("#btnAddToCart").on("click",function(){
          
            let item_id=$("#cmbProduct").val(); 
            let name=  $("#cmbProduct option:selected").text();          
            let price=$("#txtPrice").val();
            let qty=$("#txtQty").val();
            let discount=$("#txtDiscount").val();
            
            let total_discount=discount*qty;
            let subtotal=price*qty-total_discount;
           
            let item={
              "name":name,
              "item_id":item_id,
              "price":price,
              "qty":parseFloat(qty),
              "discount":discount,
              'total_discount':total_discount,
              "subtotal":subtotal
            }; 

             save(item);

             printCart();        
          
        });
              


        $("body").on("click",".delete",function(){
           let id=$(this).data("id");        
           delItem(id)
           printCart();
        });
     
        $("#clearAll").on("click",function(){
          clearCart();
          printCart();
        });


    //------------------Cart Functions----------//      

	function printCart(){

     let cart= getCart();
     let sn=1;          
     let $bill="";  
     let subtotal=0;

     cart.forEach(function(item,i){
          //console.log(item.name);
       subtotal+=item.price*item.qty-item.discount;
       let $html="<tr>";            
       $html+="<td>";
       $html+=sn;
       $html+="</td>";
       $html+="<td>";
       $html+=item.name;
       $html+="</td>";
       $html+="<td data-field='price'>";
       $html+=item.price;
       $html+="</td>";
       $html+="<td data-field='qty'>";
       $html+=item.qty;
       $html+="</td>";
       $html+="<td data-field='discount'>";
       $html+=item.total_discount;
       $html+="</td>";
       $html+="<td data-field='subtotal'>";
       $html+=item.subtotal;
       $html+="</td>";
       $html+="<td>";
       $html+="<input type='button' class='delete' data-id='"+item.item_id+"' value='-'/>";
       $html+="</td>";
       $html+="</tr>";
       $bill+=$html;
       sn++;
     });      
                
     $("#items").html($bill); 

     //Order Summary
     $("#subtotal").html(subtotal);
     let tax=(subtotal*0.05).toFixed(2);
     $("#tax").html(tax);
     $("#net-total").html(parseFloat(subtotal)+parseFloat(tax));
  }
  printCart();
 });
</script>   -->
<script src="js/cart.js"></script>
  
