<style>
 #cmbCustomer{
   padding:5px;
 }
</style>
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
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Stock Adjustment</li>
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
              <em>Note:</em>
              Ensure the authentication.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h2>
                    Create Stock Adjustment
                    <small class="float-right">Date: <?php echo date("d M Y")?></small>
                  </h2>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Warehouse
                  <address>
					  
                    <?php
                       echo Warehouse::warehouse_selectbox('cmbWarehouse');
                    ?>
                   <div class="customer-info"></div>
                  </address>
                  <div>
                     <!-- <strong>Shipping Address</string><br>
                     <textarea id="txtShippingAddress"></textarea> -->
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                 
                  <table>
                    <tr><td><b>Adjustment ID:</b></td><td><input type="text" style="width:60px" value="<?php echo Stock_adjustment::get_last_id()+1;?>"  readonly/></td></tr>
                    <tr><td><b>Adjustment Date:</b></td><td><input type="text" id="txtAdjustmentDate" value=<?php echo date("d-m-Y");?> /></td></tr>
                    <tr><td><b>Adjustment Type:</b></td><td><?php echo Stock_adjustment_type::stock_adjustment_type_selectbox('cmbAdjustmentType');?></td></tr>
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
                                          
                      <th>Subtotal</th>
                      <th><input type="button" id="clearAll" value="Clear" /></th>
                    </tr>
                    <tr>
                      <th></th>
                      <th>
                        <?php
                          echo Product::product_selectbox();
                       ?>
                      </th>
                        <th><input type="text" id="txtPrice" /></th>
                        <th><input type="text" id="txtQty" /></th>
                        
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
                  
                  
                    <strong>Remark</strong><br>
                    <textarea id="txtRemark"></textarea> 
                  
                  
                  
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
                  <button type="button" id="btnProcessAdjustment" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Process Order </button>
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
        const cart=new Cart("adjustment");

        printCart();
        
        //Show calander in textbox
        $("#txtOrderDate").datepicker({dateFormat: 'dd-mm-yy'});
        

        
        

        //Save into database table
        $("#btnProcessAdjustment").on("click",function(){
          

              let warehouse_id=$("#cmbWarehouse").val();
              let adjustment_date=$("#txtdjustmentDate").val();
              let adjustment_type=$("#cmbAdjustmentType").val();
              let remark=$("#txtRemark").val();

              let products= cart.getCart();

            console.log(adjustment_date);
              

              $.ajax({
                url:'api/create_adjustment',
                type:'POST',
                data:{
                  "cmbCustomer":warehouse_id,
                  "txtOrderDate":adjustment_date,
                  "txtShippingAddress":adjustment_type,
                  "txtRemark":remark,
                  "txtProducts":products
                },
                success:function(res){
                  console.log(res);
                  cart.clearCart();
                  $("#items").html("");
                }
            });

        });   
             

      
        // //Show customer other information
        // $("#cmbCustomer").on("change",function(){        
          
        //    $.ajax({
        //      url:'api/get_customer',
        //      type:'POST',
        //      data:{"cmbCustomer":$(this).val()},
        //      success:function(res){
        //          let customer=JSON.parse(res);
        //          console.log(customer);
              
        //       $(".customer-info").html(customer.mobile+"<br>"+customer.email);
        //      }
        //    });


        // });  //   


        
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
                       
          
       
       

        $("#btnAddToCart").on("click",function(){
          
            let item_id=$("#cmbProduct").val(); 
            let name=  $("#cmbProduct option:selected").text();          
            let price=$("#txtPrice").val();
            let qty=$("#txtQty").val();
            let discount=0;
            
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

    let adjustments= cart.getCart();
     let sn=1;          
     let $bill="";  
     let subtotal=0;
      if(adjustments!=null){
        adjustments.forEach(function(item,i){
        //$.each(adjustments,function(i,item){
                //console.log(item.name);
              let discount=item.discount!=null?item.discount:0;
              subtotal+=item.price*item.qty-discount;
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
            // $html+="<td data-field='discount'>";
            // $html+=item.total_discount;
            // $html+="</td>";
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
          
      }
                
     $("#items").html($bill); 

     //Order Summary
     $("#subtotal").html(subtotal);
    //  let tax=(subtotal*0.05).toFixed(2);
    //  $("#tax").html(tax);
     $("#net-total").html(parseFloat(subtotal)+parseFloat(tax));
   }

});
</script>  
<script src="js/cart.js"></script>
  
