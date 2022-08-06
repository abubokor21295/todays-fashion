<div class="container">
                <h2 class="title text-center mb-4">New Arrivals</h2><!-- End .title text-center -->

                <div class="products">
                    <div class="row justify-content-center">
                    <?php 
                            $result=Product::get_products_site_new();
                            foreach($result as $row){

                            ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <span class="product-label label-sale">Sale</span>
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
                        </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                                <?php }; ?>
                       
                    </div><!-- End .row -->
                </div><!-- End .products -->

                <div class="more-container text-center mt-2">
                    <a href="new-product" class="btn btn-outline-dark-2 btn-more"><span>show more</span></a>
                </div><!-- End .more-container -->
</div>