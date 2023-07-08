 <?php $__env->startSection('content'); ?>


<div class="checkout-h">
   <div class="container">
      <h1><?php echo e(__('messages.checkout')); ?></h1>
   </div>
</div>

<div class="checkout-back">
   <div class="container">
      <div class="row">
         <?php if(Session::has('message')): ?>
         <div class="col-sm-12">
            <div class="alert  <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible fade show" role="alert"><?php echo e(Session::get('message')); ?>

               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
         </div>
         <?php endif; ?>
         <div class="checkbox-box col-lg-8 col-md-12">
            <div class="accordion indicator-plus-before round-indicator" id="accordionH">
               <div class="check-pa">
                  <div class="card m-b-0">
                     <?php $showfirst="";?>
                     <?php if(!Session::get('login_user')): ?>
                     <div class="card-header collapsed" id="headingOneH" href="#collapseOneH" data-toggle="collapse">
                        <div class="checkbox-acco1">
                           <p><?php echo e(__('messages.returning_customer')); ?></p>
                           <a class="card-title"><?php echo e(__('messages.click_login')); ?></a>
                        </div>
                     </div>
                     <?php $showfirst="show";?>
                     <?php endif; ?>
                     <?php if(Session::get('login_user')): ?>
                     <div class="card-header collapsed" id="headingOneH">
                        <div class="checkbox-acco1">
                           <p><?php echo e(Session::get('user_phone')); ?></p>
                        </div>
                     </div>
                     <?php endif; ?>
                     <div class="collapse <?php echo e($showfirst); ?>" id="collapseOneH">
                        <div class="card-body">
                           <p><?php echo e(__('messages.checkout_login_tab')); ?> <a href="javascript:;" onclick="changemodel()" data-toggle="modal" data-target="#myModal1"><?php echo e(__('messages.register_with_us')); ?>.</a></p>
                           <form>
                              <span id="check_login_error_msg"><?php echo e(__('messages.login_error')); ?></span>
                              <div class="row">
                                 <div class="phone col-md-6">
                                    <label><?php echo e(__('messages.phone_no')); ?></label>
                                    <span>*</span>
                                    <input type="text" required name="phone_check" id="modal-text" placeholder="<?php echo e(__('messages.phone_no')); ?>" value="<?php echo e(isset($_COOKIE['phone'])?$_COOKIE['phone']:''); ?>">
                                 </div>
                                 <div class="phone col-md-6">
                                    <label><?php echo e(__('messages.password')); ?></label><span>*</span>
                                    <input type="password" required name="password_check" id="modal-text" placeholder="<?php echo e(__('messages.password')); ?>" value="<?php echo e(isset($_COOKIE['password'])?$_COOKIE['password']:''); ?>">
                                 </div>
                              </div>
                              <div class="sub">
                                 <input type="button" onclick="checkloginaccount()" name="submit" value="<?php echo e(__('messages.login')); ?>">
                              </div>
                              <div class="check">
                                 <input type="checkbox" name="rem_me_check" value="1" <?php echo isset($_COOKIE[ 'rem_me'])? "checked": ''?>>
                                 <p><?php echo e(__('messages.rem_me')); ?></p>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="card m-b-0">
                     <?php $showsec="";?>
                     <?php if(Session::get('login_user')&&Session::get("orderstatus")==1): ?>
                     <div class="card-header d-detail" id="headingTwoH" href="#collapseTwoH" data-toggle="collapse">
                        <h1><?php echo e(__('messages.DD')); ?></h1>
                        <?php $showsec="show";?>
                     </div>
                     <?php endif; ?>
                     <?php if(empty(Session::get('login_user'))): ?>
                     <div class="card-header d-detail" id="headingTwoH" >
                        <h1><?php echo e(__('messages.DD')); ?></h1>
                     </div>
                     <?php endif; ?>
                     <?php if($shipping==0){ $display="block";}else{ $display="none";}?>
                     <div class="collapse <?php echo e($showsec); ?> " id="collapseTwoH">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-6 billing">
                                 <h1><?php echo e(__('messages.billing_detail')); ?></h1>
                                 <form>
                                    <div class="phone">
                                       <label><?php echo e(__('messages.phone_no')); ?></label><span>*</span>
                                       <input type="text" name="order_phone" id="order_phone" value="<?php echo e(Session::get('user_phone')); ?>" placeholder="<?php echo e(__('messages.phone_no')); ?>">
                                    </div>
                                    <div class="city" id="cityorder" >
                                       <label><?php echo e(__('messages.city')); ?></label><span>*</span>
                                       <select name="order_city" id="order_city">
                                          <option value=""><?php echo e(__('messages.sel_city')); ?></option>
                                          <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ci): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($ci->city_name); ?>"><?php echo e($ci->city_name); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </select>
                                    </div>
                                 </form>
                              </div>
                              <div class="col-md-6 additional">
                                 <h1><?php echo e(__('messages.AI')); ?></h1>
                                 <p><?php echo e(__('messages.order_note')); ?></p>
                                 <div class="add-box">
                                    <textarea placeholder="<?php echo e(__('messages.order_place')); ?>" id="order_notes" name="order_notes"></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12 p-0" style="display:<?php echo $display;?>" id="addressorder">
                              <label><?php echo e(__('messages.search_loc')); ?></label>
                              <span>*</span>
                              <input  type="text" id="us2-address" name="address" placeholder="<?php echo e(__('messages.ent_ser_loc')); ?>" required data-parsley-required="true"/>
                           </div>
                           <div class="map" id="maporder" style="display:<?php echo $display;?>">
                              <div class="form-group">
                                 <div class="col-md-12 p-0">
                                    <div id="us2"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <input type="hidden" name="lat" id="us2-lat" value="<?php echo e($latitude); ?>" />
                     <input type="hidden" name="lon" id="us2-lon" value="<?php echo e($longtitude); ?>" />
                     <input type="hidden" name="radius" id="us2-radius" />
                     <?php if(Session::get('login_user')&&Session::get("orderstatus")==1): ?>
                     <div class="card-header d-detail payment" id="heading3H" href="#collapseTH" data-toggle="collapse">
                        <h1><?php echo e(__('messages.pay_type')); ?></h1>
                        <?php $showsec="show";?>
                     </div>
                     <?php endif; ?>
                     <?php if(empty(Session::get('login_user'))): ?>
                     <div class="card-header d-detail payment" id="heading3H" >
                        <h1><?php echo e(__('messages.pay_type')); ?></h1>
                     </div>
                     <?php endif; ?>
                     <div class="collapse <?php echo e($showsec); ?> " id="collapseTH">
                        <div class="cashswipe">
                           <div class="radio check">
                              <input type="checkbox" name="order_payment_type" id="order_payment_type_1" value="Cash" onchange="changebutton(this.value)">
                              <img id="pay1" onclick="changebutton('Cash')" src="<?php echo e(asset('burger/images/5.png')); ?>"/>
                           </div>
                           <?php if($setting->paypal_active=='1'): ?>
                           <div class="check">
                              <input type="checkbox" name="order_payment_type" id="order_payment_type_3" value="Paypal" onchange="changebutton(this.value)">
                              <img id="pay2" onclick="changebutton('Paypal')" src="<?php echo e(asset('burger/images/1.png')); ?>"/>
                           </div>
                           <?php endif; ?>
                           <?php if($setting->stripe_active=='1'): ?>
                           <div class="check">
                              <input type="checkbox" name="order_payment_type" id="order_payment_type_4" value="Stripe" onchange="changebutton(this.value)">
                              <img id="pay3" onclick="changebutton('Stripe')" src="<?php echo e(asset('burger/images/2.png')); ?>"/>
                           </div>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="cart-bill-box cart-t">
               <div class="cart-bill-box-head">
                  <h4><?php echo e(__('messages.cart_total')); ?></h4>
               </div>
               <div class="cart-b-subtotal">
                  <div class="cart-bs-head">
                     <h4><?php echo e(__('messages.subtotal')); ?></h4>
                     <?php $cartCollection = Cart::getContent();
                        $totalamountarr=array();
                        foreach ($cartCollection as $car) {
                         $totalamount="";
                         $totalamount=(float)$car->quantity*(float)$car->price;
                         $totalamountarr[]=round($totalamount,2);
                        
                        }
                        
                        ?>
                     <p><?php echo e(Session::get("usercurrency")); ?><span id="subtotal_order"><?php echo number_format(array_sum($totalamountarr), 2, '.', '');?></span></p>
                  </div>
               </div>
               <input type="hidden" name="subtotalorder" id="subtotalorder" value="<?php echo e(array_sum($totalamountarr)); ?>">
               <div class="cart-b-subtotal" id="dcorder" style="display: <?php echo $display;?>">
                  <div class="cart-bs-head">
                     <h4><?php echo e(__('messages.DC')); ?></h4>
                     <p><?php echo e(Session::get("usercurrency")); ?><span id="delivery_charges_order"><?php echo e(number_format($delivery_charges, 2, '.', '')); ?></span></p>
                  </div>
               </div>
               <div class="cart-b-subtotal">
                  <div class="cart-bs-head cart-bs-ftotal">
                     <h4><?php echo e(__('messages.total')); ?></h4>
                     <?php if($shipping==0){
                        $charges=$delivery_charges;
                        }else{
                          $charges=0;
                        }
                        ?>
                     <p><?php echo e(Session::get("usercurrency")); ?><span id="finaltotal_order"><?php $total=
                        array_sum($totalamountarr)+$charges;?> <?php echo e(number_format($total, 2, '.', '')); ?></span></p>
                  </div>
               </div>
            </div>
            <input type="hidden" name="delivery_charges" id="delivery_charges" value="<?php echo e($delivery_charges); ?>" />
            <div class="cart-shipping-box cart-t">
               <div class="cart-b-shipping">
                  <div class="cart-bs-heading">
                     <h4><?php echo e(__('messages.shipping')); ?></h4>
                     <div class="cart-bs-content">
                        <form>
                           <p>
                              <input type="checkbox" id="home1" name="shipping_type" class="checkbox-custom" value="0" onclick="changeoption(this.value)" <?php echo ($shipping==0 ? 'checked' : '');?> >
                              <label for="home1" class="checkbox-custom-label">
                              <?php echo e(__('messages.HD')); ?>

                              </label>
                           </p>
                        </form>
                        <div class="cart-bs-content-2">
                           <form>
                              <p>
                                 <input type="checkbox" id="home2" name="shipping_type" class="checkbox-custom" value="1" onclick="changeoption(this.value)" <?php echo ($shipping==1 ? 'checked' : '');?>>
                                 <label for="home2" class="checkbox-custom-label">
                                 <?php echo e(__('messages.LP')); ?>

                                 </label>
                              </p>
                           </form>
                        </div>
                     </div>
                     <div class="cart-bsc-note">
                        <p><?php echo e(__('messages.ship_sug')); ?></p>
                     </div>
                  </div>
               </div>
               <?php if(Session::get('login_user')): ?>
               <div id="orderplace1">
                  <button type="button" onclick="orderplace()">
                  <span style=""><?php echo e(__('messages.place_order')); ?></span>
                  </button>
               </div>
               <div id="orderplacestrip">
                  <form action="<?php echo e(url('make-payment')); ?>" method="POST">
                     <?php echo e(csrf_field()); ?>

                     <input type="hidden" name="phone_or" id="phone_or" required="" />
                     <input type="hidden" name="note_or" id="note_or"/>
                     <input type="hidden" name="city_or" id="city_or" required="" />
                     <input type="hidden" name="address_or" id="address_or" required="" />
                     <input type="hidden" name="payment_type_or" id="payment_type_or" required="" />
                     <input type="hidden" name="shipping_type_or" id="shipping_type_or" required="" />
                     <input type="hidden" name="total_price_or" id="total_price_or" required="" />
                     <input type="hidden" name="subtotal_or" id="subtotal_or" required="" />
                     <input type="hidden" name="lat_long_or" id="lat_long_or" required="">
                     <input type="hidden" name="charage_or" id="charage_or" required="" />
                     <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="<?php echo e(Session::get('stripe_key')); ?>"
                        data-amount=""
                        data-id="stripid"
                        data-name="<?php echo e(__('messages.site_name')); ?>"
                        data-label="<?php echo e(__('messages.place_order')); ?>"
                        data-description=""
                        data-image="<?php echo e(asset('burger/images/web-nav-logo.jpg')); ?>"
                        data-locale="auto"></script>
                  </form>
               </div>
               <div id="orderplacepaypal">
                  <form action="<?php echo e(url('paypal')); ?>" method="POST">
                     <?php echo e(csrf_field()); ?>

                     <input type="hidden" name="phone_pal" id="phone_pal" required="" />
                     <input type="hidden" name="note_pal" id="note_pal"/>
                     <input type="hidden" name="city_pal" id="city_pal" required="" />
                     <input type="hidden" name="address_pal" id="address_pal" required="" />
                     <input type="hidden" name="lat_long_pal" id="lat_long_pal" required="">
                     <input type="hidden" name="payment_type_pal" id="payment_type_pal" required="" />
                     <input type="hidden" name="shipping_type_pal" id="shipping_type_pal" required="" />
                     <input type="hidden" name="total_price_pal" id="total_price_pal" required="" />
                     <input type="hidden" name="subtotal_pal" id="subtotal_pal" required="" />
                     <input type="hidden" name="charage_pal" id="charage_pal" required="" />
                     <button type="submit">
                     <span style=""><?php echo e(__('messages.place_order')); ?></span>
                     </button>
                  </form>
               </div>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.subindex', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\kingburger\resources\views/user/checkout.blade.php ENDPATH**/ ?>