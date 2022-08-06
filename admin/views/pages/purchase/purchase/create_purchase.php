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
              <h3 class="page-title pull-left">Create Purchase</h3>
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
                  
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
    
              <!-- /.row -->
            
                <div class="d-flex flex-row justify-content-between align-items-center order-details">
                        <div>
                          <span class="d-block fs-12">Purchase ID</span><input type="text" style="width:60px" value="<?php echo Purchase::get_last_id()+1;?>"  readonly/>

                          <h6 class="mt-2 mb-3">Supplier Details</h6>
                          <address>
                
                          <?php
                            echo Supplier::html_select();
                          ?>
                          <div class="supplier-info"></div>
                          </address>
                        </div>
                        <div><span class="d-block fs-12">Shipping Address</span><textarea id="txtShippingAddress"></textarea></div>
                        <div>
                          <span class="d-block fs-12">Purchase date</span><input type="text" id="txtPurchaseDate" value="<?php echo date("d-m-Y");?>" /><br/>
                          <span class="d-block fs-12">Delivary date</span><input type="text" id="txtDeliveryDate" value="<?php echo date("d-m-Y");?>" />
                        </div>
                      
                        <!-- <div><span class="d-block fs-12">Payment method</span><span class="font-weight-bold">Credit card</span><img class="ml-1 mb-1" src="https://i.imgur.com/ZZr3Yqj.png" width="20"></div> -->
                        
                </div>
              

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
                    <tr>
                      <th></th>
                      <th>
                        <?php
                          echo Product::html_select();
                       ?>
                      </th>
                        <th><input type="text" id="txtPrice" /></th>
                        <th><input type="text" id="txtQty" /></th>
                        <th><input type="text" id="txtDiscount" /></th>
                        <th></th>
                        <th><input type="button" id="btnAddToCart" value=" + " /></th>
                      </tr>
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
                    <table class="table">
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
                  <button type="button" id="btnProcessPurchase" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Process Order </button>
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
<script>
      $(function() {  
        const cart=new Cart("purchase");
        //Show calander in textbox
        $("#txtPurchaseDate").datepicker({dateFormat: 'dd-mm-yy'});
        $("#txtDeliveryDate").datepicker({dateFormat: 'dd-mm-yy'});
        

        
        

        //Save into database table
        $("#btnProcessPurchase").on("click",function(){
          

              let supplier_id=$("#cmbSupplier").val();
              let purchase_date=$("#txtPurchaseDate").val();
              let due_date=$("#txtDeliveryDate").val();
              let discount=0;
              let vat=0;
              let shipping_address=$("#txtShippingAddress").val();
              let remark=$("#txtRemark").val();
			        let purchase_total=$("#net-total").val();
              let products= cart.getCart();
              

              $.ajax({
                url:'api/PurchaseApi/save',
                type:'POST',
                data:{
                  "cmbSupplier":supplier_id,
                  "txtPurchaseDate":purchase_date,
                  "txtDeliveryDate":due_date,
                  "txtShippingAddress":shipping_address,
                  "txtDiscount":discount,
                  "txtVat":vat,
                  "txtRemark":remark,
				          "purchase_total":purchase_total,
                  "txtProducts":products
                },
                success:function(res){
                  console.log(res);
                  cart.clearCart();
                  $("#items").html("");
                }
            });

        });   
             

      
        //Show customer other information
        $("#cmbSupplier").on("change",function(){        
          
           $.ajax({
             url:'api/SupplierApi/find',
             type:'GET',
             data:{"id":$(this).val()},
             success:function(res){
                 let data=JSON.parse(res);
                 console.log(data.supplier);
              let supplier=data.supplier;
              $(".supplier-info").html(supplier.mobile+"<br>"+supplier.email);
             }
           });


        });  //   


        
         //Show customer other information
         $("#cmbProduct").on("change",function(){

           $.ajax({
             url:'api/ProductApi/find',
             type:'GET',
             data:{"id":$(this).val()},
             success:function(res){
				 //console.log(res);
				 let data = JSON.parse(res);
               $("#txtPrice").val(data.product.offer_price);
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

             cart.save(item);

             printCart();        
          
        });
              


        $("body").on("click",".delete",function(){
           let id=$(this).data("id");        
           cart.delItem(id)
           printCart();
        });
     
        $("#clearAll").on("click",function(){
          cart.clearCart();
          printCart();
        });


    //------------------Cart Functions----------//      

	function printCart(){

     let purchase=cart.getCart();
     let sn=1;          
     let $bill="";  
     let subtotal=0;
      if(purchase!=null){
     purchase.forEach(function(item,i){
          //console.log(item.name);
       subtotal+=item.price*item.qty-item.discount*item.qty;
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
      };         
     $("#items").html($bill); 

     //Order Summary
     $("#subtotal").html(subtotal);
     let tax=(subtotal*0.05).toFixed(2);
     $("#tax").html(tax);
     $("#net-total").html(parseFloat(subtotal)+parseFloat(tax));
  }
  printCart();
 });
</script>  
<script src="js/cart.js"></script>
  
