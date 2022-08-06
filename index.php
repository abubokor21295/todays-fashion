<?php
require_once("admin/configs/db_config.php");
require_once("admin/models/product.class.php");
?>
<!DOCTYPE html>
<html lang="en">


<!-- molla/index-6.html  22 Nov 2019 09:56:18 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>today's fashion</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/f.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/f.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/f.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="assets/images/if.png">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/skins/skin-demo-6.css">
    <link rel="stylesheet" href="assets/css/demos/demo-6.css">
</head>

<body>
    <div class="page-wrapper">
        <header class="header header-6">
           <?php include("site/header/header.php") ?>
           
        </header><!-- End .header -->

        
        

            <?php
                if(isset($_GET["page"])){
                    if($_GET["page"]=="home"){
                        include("site/home.php");
                    }elseif($_GET["page"]=="product-details"){
                        include("site/pages/product_details.php");
                    }elseif($_GET["page"]=="men-product"){
                        include("site/pages/men_product.php");
                    }elseif($_GET["page"]=="women-product"){
                        include("site/pages/women_product.php");
                    }elseif($_GET["page"]=="child-product"){
                        include("site/pages/child_product.php");
                    }elseif($_GET["page"]=="new-product"){
                        include("site/pages/new_product.php");
                    }elseif($_GET["page"]=="watch"){
                        include("site/pages/watch.php");
                    }elseif($_GET["page"]=="signin"){
                        include("site/signin.php");
                    }elseif($_GET["page"]=="cart"){
                        include("site/pages/cart.php");
                    }elseif($_GET["page"]=="wishlist"){
                        include("site/pages/wishlist.php");
                    }elseif($_GET["page"]=="about"){
                        include("site/pages/about.php");
                    }elseif($_GET["page"]=="checkout"){
                        include("site/pages/checkout.php");
                    }else{
                        include("site/home.php");
                    }
                }else{
                    include("site/home.php");
                }
            ?>

        <!-- End .main -->
        <?php include("site/header/footer.php") ?>
        <!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <?php include("site/mobile_menu.php") ?>
    <!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
    <?php include("site/signin.php") ?>
    <!-- End .modal -->

    <!-- <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row no-gutters bg-white newsletter-popup-content">
                    <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                        <div class="banner-content text-center">
                            <img src="assets/images/popup/newsletter/logo.png" class="logo" alt="logo" width="60" height="15">
                            <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                            <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your favorite products.</p>
                            <form action="#">
                                <div class="input-group input-group-round">
                                    <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn" type="submit"><span>go</span></button> -->
                                    <!--</div>--><!-- .End .input-group-append -->
                                <!--</div>--><!-- .End .input-group -->
                            <!-- </form>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label> -->
                            <!--</div>--><!-- End .custom-checkbox -->
                        <!-- </div>
                    </div>
                    <div class="col-xl-2-5col col-lg-5 ">
                        <img src="assets/images/popup/newsletter/img-1.jpg" class="newsletter-img" alt="newsletter">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/demos/demo-6.js"></script>
    <script>
      $(function() {  
          
        const cart=new Cart("addCart");
        //Show calander in textbox
        //$("#txtOrderDate").datepicker({dateFormat: 'dd-mm-yy'});
        //$("#txtDueDate").datepicker({dateFormat: 'dd-mm-yy'});
        
        
        
        

        //Save into database table
        $("#btnProcessOrder").on("click",function(){
          

              let customer_id=$("#cmbCustomer").val();
              let order_date=$("#txtOrderDate").val();
              let due_date=$("#txtDueDate").val();
              let discount=0;
              let vat=0;
              let shipping_address=$("#txtShippingAddress").val();
              let remark=$("#txtRemark").val();
			  let order_total=$("#net-total").val();
              let products= cart.getCart();
              

              $.ajax({
                url:'api/OrderApi/save',
                type:'POST',
                data:{
                  "cmbCustomer":customer_id,
                  "txtOrderDate":order_date,
                  "txtDueDate":due_date,
                  "txtShippingAddress":shipping_address,
                  "txtDiscount":discount,
                  "txtVat":vat,
                  "txtRemark":remark,
				  "order_total":order_total,
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
        $("#cmbCustomer").on("change",function(){        
          
           $.ajax({
             url:'api/CustomerApi/find',
             type:'GET',
             data:{"id":$(this).val()},
             success:function(res){
               //console.log(res);
                 let data=JSON.parse(res);
                 //console.log(data.customer);
              let customer=data.customer;
              $(".customer-info").html(customer.mobile+"<br>"+customer.email);
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

        $(".btnAddToCart").on("click",function(){
            
            let item_id=$(this).data("item-id"); 
            let name=  $(this).data("name");          
            let price=$(this).data("price");
            let qty=1;
            let discount=$(this).data("discount");
            let total_discount=discount*qty;
            let subtotal=price*qty-total_discount;
            // alert(subtotal);
           
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

            let orders=cart.getCart();
            let sn=1;          
            let $bill="";  
            let subtotal=0;
            if(orders!=null){
            orders.forEach(function(item,i){
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
            $("#items").html($bill); //id trom cart.php

            //Order Summary
            $("#cartCount").html(sn-1);
            $("#subtotal").html(subtotal);
            let tax=(subtotal*0.05).toFixed(2);
            $("#tax").html(tax);
            $(".CartTotal").html(parseFloat(subtotal)+parseFloat(tax));
        }
                printCart();
    })
</script>  
<script src="js/cart.js"></script>
</body>


<!-- molla/index-6.html  22 Nov 2019 09:56:39 GMT -->
</html>