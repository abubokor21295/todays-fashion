<div class="container">
        <div class="d-flex justify-content-center row m-0 p-0">
            <div class="col-md-12">
                <div class="receipt bg-white rounded p-3"><img src="assets/dist/img/tf_logo_6.png" width="250">
                    
                    <hr>
                    <div>
                      <h6 class="mt-2 mb-3">Customer Details</h6>
                      <address>
                        <select name="customer_id" [ngModel]>
                            <option *ngFor="let customer of customers" value="{{customer.id}}">{{customer.name}} </option>    
                        </select>
                      
                      <div id="customer-info"></div>
    
                     </address>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center order-details">
                        <div><span class="d-block fs-12">Order ID</span><input type="text" style="width:60px" value=""  readonly/></div>
                        <div><span class="d-block fs-12">Order date</span><input type="text" id="txtOrderDate" value="" /></div>
                        <div><span class="d-block fs-12">Delivary date</span><input type="text" id="txtDueDate" value="" /></div>
                        <!-- <div><span class="d-block fs-12">Payment method</span><span class="font-weight-bold">Credit card</span><img class="ml-1 mb-1" src="https://i.imgur.com/ZZr3Yqj.png" width="20"></div> -->
                        <div><span class="d-block fs-12">Shipping Address</span><textarea id="txtShippingAddress"></textarea></div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 ">
                          <form #cartForm="ngForm"  >
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
                                     <select name="product_id" [ngModel]>
                                         <option *ngFor="let product of products" value="{{product.id}}">{{product.name}} </option>    
                                     </select>
                                  </th>
                                    <th><input type="text" id="txtPrice" [ngModel] name="price" /></th>
                                    <th><input type="text" id="txtQty" [ngModel] name="qty" /></th>
                                    <th><input type="text" id="txtDiscount" [ngModel] name="discount" /></th>
                                    <th></th>
                                    <th><input type="button" (click)="handleAddToCart(cartForm.value)" id="btnAddToCart" value=" + " /></th>
                                  </tr>
                                </thead>
                                <tbody id="items">                    
                                  
                                </tbody>
                              </table>
                          </form>
                        </div>
                        <!-- /.col -->
                      </div>
                    <div class="mt-5 amount row">
                        <div class="d-flex justify-content-center col-md-6"><img src="https://i.imgur.com/AXdWCWr.gif" width="250" height="100"></div>
                        <div class="col-md-6">
                            <div class="billing">
                                <div class="d-flex justify-content-between"><span>Subtotal</span><span class="font-weight-bold">$120</span></div>
                                <div class="d-flex justify-content-between mt-2"><span>Shipping fee</span><span class="font-weight-bold">$15</span></div>
                                <div class="d-flex justify-content-between mt-2"><span>Tax</span><span class="font-weight-bold">$5</span></div>
                                <div class="d-flex justify-content-between mt-2"><span class="text-success">Discount</span><span class="font-weight-bold text-success">$25</span></div>
                                <hr>
                                <div class="d-flex justify-content-between mt-1"><span class="font-weight-bold">Total</span><span class="font-weight-bold text-success">$165</span></div>
                            </div>
                        </div>
                    </div><span class="d-block">Remark</span><textarea id="txtRemark"></textarea><span class="d-block mt-3 text-black-50 fs-15">We will be sending a shipping confirmation email when the item is shipped!</span>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center footer">
                        <div class="thanks"><span class="d-block font-weight-bold">Thanks for shopping</span><span>Today's Fashion team</span></div>
                        <div class="d-flex flex-column justify-content-end align-items-end"><span class="d-block font-weight-bold">Need Help?</span><span>Call - 974493933</span></div>
                    </div>
                </div>
            </div>
        </div>
</div>