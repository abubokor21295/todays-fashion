<div class="container">
                <div class="heading heading-center mb-3">
                    <h2 class="title">Trending</h2><!-- End .title -->

                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="trending-all-link" data-toggle="tab" href="#trending-all-tab" role="tab" aria-controls="trending-all-tab" aria-selected="true">Women</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" id="trending-men-link" data-toggle="tab" href="#trending-men-tab" role="tab" aria-controls="trending-men-tab" aria-selected="false">Men</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="trending-child-link" data-toggle="tab" href="#trending-child-tab" role="tab" aria-controls="trending-child-tab" aria-selected="false">Children</a>
                        </li>
                    </ul>
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" id="trending-all-tab" role="tabpanel" aria-labelledby="trending-all-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": false
                                    }
                                }
                            }'>
                            <?php 
                            $result=Product::get_products_site_women();
                            foreach($result as $row){

                            ?>
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <a href="product-details?id=<?php echo $row->id ?>">
                                        <img src="admin/img/<?php echo $row->photo ?>" alt="Product image" class="product-image">
                                        <img src="admin/img/<?php echo $row->photo ?>" alt="Product image" class="product-image-hover">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                    <button type="button" data-item-id="<?php echo  $row->id ?>" data-name="<?php echo  $row->name ?>" data-price="<?php echo  $row->regular_price ?>" data-discount="<?php echo  $row->offer_discount ?>" class="btn-product btn-cart btnAddToCart"><span>add to cart</span></button>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="product-details?id=<?php echo $row->id ?>">Clothing</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product-details?id=<?php echo $row->id ?>"><?php echo $row->name ?></a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                    <?php echo $row->offer_price ?>
                                    </div><!-- End .product-price -->

                                    <!-- <div class="product-nav product-nav-thumbs">
                                        <a href="#" class="active">
                                            <img src="assets/images/demos/demo-6/products/product-1-thumb.jpg" alt="product desc">
                                        </a>
                                        <a href="#">
                                            <img src="assets/images/demos/demo-6/products/product-1-2-thumb.jpg" alt="product desc">
                                        </a>
                                        <a href="#">
                                            <img src="assets/images/demos/demo-6/products/product-1-3-thumb.jpg" alt="product desc">
                                        </a>
                                    </div>End .product-nav -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                            
                            <?php }; ?>



                            <div class="product product-7 text-center">
                               

                                <div class="product-body">
                                   
                                    <h1><a href="new-product">Click for more?</a></h1><!-- End .product-title -->
                                   
                                   
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                            
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->


                    <div class="tab-pane p-0 fade" id="trending-men-tab" role="tabpanel" aria-labelledby="trending-men-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":0
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": false
                                    }
                                }
                            }'>
                            <?php 
                            $result=Product::get_products_site_men();
                            foreach($result as $row){

                            ?>
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <span class="product-label label-sale">sale</span>
                                    <a href="product-details?id=<?php echo $row->id ?>">
                                        <img src="admin/img/<?php echo $row->photo ?>" alt="Product image" class="product-image">
                                        <img src="admin/img/<?php echo $row->photo ?>" alt="Product image" class="product-image-hover">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                    <button type="button" data-item-id="<?php echo  $row->id ?>" data-name="<?php echo  $row->name ?>" data-price="<?php echo  $row->regular_price ?>" data-discount="<?php echo  $row->offer_discount ?>" class="btn-product btn-cart btnAddToCart"><span>add to cart</span></button>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="product-details?id=<?php echo $row->id ?>">Clothing</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product-details?id=<?php echo $row->id ?>"><?php echo $row->name ?></a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price"><?php echo $row->offer_price ?></span>
                                        <span class="old-price"><?php echo $row->regular_price ?></span>
                                    </div><!-- End .product-price -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                            <?php }; ?>

                            <div class="product product-7 text-center">
                               

                               <div class="product-body">
                                  
                                   <h1><a href="men-product">Click for more?</a></h1><!-- End .product-title -->
                                  
                                  
                               </div><!-- End .product-body -->
                           </div><!-- End .product -->
                        </div><!-- End .owl-carousel -->
                    </div>

                   <div class="tab-pane p-0 fade" id="trending-child-tab" role="tabpanel" aria-labelledby="trending-child-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":0
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": false
                                    }
                                }
                            }'>
                            <?php 
                            $result=Product::get_products_site_child();
                            foreach($result as $row){

                            ?>
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <span class="product-label label-sale">sale</span>
                                    <a href="product-details?id=<?php echo $row->id ?>">
                                        <img src="admin/img/<?php echo $row->photo ?>" alt="Product image" class="product-image">
                                        <img src="admin/img/<?php echo $row->photo ?>" alt="Product image" class="product-image-hover">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                    <button type="button" data-item-id="<?php echo  $row->id ?>" data-name="<?php echo  $row->name ?>" data-price="<?php echo  $row->regular_price ?>" data-discount="<?php echo  $row->offer_discount ?>" class="btn-product btn-cart btnAddToCart"><span>add to cart</span></button>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Clothing</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product-details?id=<?php echo $row->id ?>"><?php echo $row->name ?></a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price"><?php echo $row->offer_price ?></span>
                                        <span class="old-price"><?php echo $row->regular_price ?></span>
                                    </div><!-- End .product-price -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                            <?php }; ?>

                            <div class="product product-7 text-center">
                               

                               <div class="product-body">
                                  
                                   <h1><a href="child-product">Click for more?</a></h1><!-- End .product-title -->
                                  
                                  
                               </div><!-- End .product-body -->
                           </div><!-- End .product -->
                        </div><!-- End .owl-carousel -->
                    </div>
                    <!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
</div>