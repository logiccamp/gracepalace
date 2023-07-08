 
<?php $__env->startSection('content'); ?>
<div class="cart-bill-and-category">
   <div class="container">
      <div class="cart-head">
         <h1><?php echo e(__('messages.cart')); ?></h1>
      </div>
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
         <div class="col-lg-8">
            <div class="container">
               <div class="cart-category">
                  <div class="row">
                     <table class="table table-image table-striped">
                        <thead class="cart-quantity-heading">
                           <tr class="cart-category-head">
                              <th scope="col" class="cart-category-tab">
                              </th>
                              <th scope="col" class="cart-category-tab">
                              </th>
                              <th scope="col" class="cart-category-tab">
                                 <?php echo e(__('messages.product')); ?>

                              </th>
                              <th scope="col" class="cart-category-tab">
                                 <?php echo e(__('messages.price')); ?>

                              </th>
                              <th scope="col" class="cart-category-tab">
                                 <?php echo e(__('messages.qty')); ?>

                              </th>
                              <th scope="col" class="cart-category-tab">
                                 <?php echo e(__('messages.total')); ?>

                              </th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $cartCollection = Cart::getContent();$i=0;?>
                           <?php $__currentLoopData = $cartCollection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr class="cart-box-items">
                              <th scope="row" class="cart-category-items">
                                 <a href="<?php echo e(url('deletecartitem/'.$item->id)); ?>">
                                 <i class="fa fa-trash-o" aria-hidden="true"></i>
                                 </a>
                              </th>
                              <td class="cart-product-image">
                                 <?php $__currentLoopData = $allmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                 <?php if($item->name==$ai->menu_name): ?>
                                 <img src="<?php echo e(asset('upload/images/menu_item_icon/'.$ai->menu_image)); ?>" class="cartth">
                                 <?php endif; ?> 
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </td>
                              <td class="cart-category-items prod">
                                 <h6><?php echo e(__('messages.product')); ?>:</h6>
                                 <p class="cartitemtxt">  
                                    <?php echo e($item->name); ?>

                                 </p>
                                 <?php $__currentLoopData = $item->attributes[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartinter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                 <?php $__currentLoopData = $menu_interdient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $me): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($cartinter==$me->id): ?>
                                 <span>
                                 <?php echo e($me->item_name); ?>,
                                 </span> 
                                 <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </td>
                              <td class="cart-category-items">
                                 <h6><?php echo e(__('messages.price')); ?>:</h6>
                                 <p>
                                    <?php echo e(Session::get("usercurrency")); ?>

                                    <span id="price_pro<?php echo e($item->id); ?>">
                                    <?php echo e(number_format($item->price, 2, '.', '')); ?>

                                    </span>
                                 </p>
                              </td>
                              <td class="cart-category-shape">
                                 <h6><?php echo e(__('messages.qty')); ?>:</h6>
                                 <div class="cart-quantity">
                                    <div class="increment">
                                       <div class="button-increment">
                                          <button class="" type="button" value="+" onclick="addqty('<?php echo e($item->id); ?>','<?php echo e($i); ?>')">
                                          <a>
                                          <i class="fa fa-plus" aria-hidden="true">
                                          </i>
                                          </a>
                                          </button>
                                          <input type="text" class="input-text qty" id="adults" name="qty<?php echo e($i); ?>" value="<?php echo e($item->quantity); ?>" readonly />
                                          <button class=" .cart-category .cart-quantity-button" type="button" value="-" onclick="minusqty('<?php echo e($item->id); ?>','<?php echo e($i); ?>')">
                                          <a>
                                          <i class="fa fa-minus" aria-hidden="true">
                                          </i>
                                          </a>
                                          </button>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                              <td class="cart-category-items">
                                 <?php $totalamount=(float)$item->quantity*(float)$item->price;?>
                                 <h6><?php echo e(__('messages.total')); ?>:</h6>
                                 <p id="producttotal<?php echo e($item->id); ?>">
                                    <?php echo e(Session::get("usercurrency")); ?><?php echo e(number_format($totalamount, 2, '.', '')); ?>

                                 </p>
                              </td>
                           </tr>
                           <?php $i++;?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="cart-bill-box">
               <div class="cart-bill-box-head">
                  <h4>
                     <?php echo e(__('messages.cart_total')); ?>

                  </h4>
               </div>
               <div class="cart-b-subtotal">
                  <div class="cart-bs-head">
                     <h4>
                        <?php echo e(__('messages.subtotal')); ?>

                     </h4>
                     <p id="subtotal">
                       <?php echo e(Session::get("usercurrency").number_format(Cart::getTotal(), 2, '.', '')); ?>

                     </p>
                  </div>
               </div>
               <div class="cart-b-subtotal">
                  <div class="cart-bs-head cart-bs-ftotal">
                     <h4><?php echo e(__('messages.total')); ?></h4>
                     <p class="cartfinaltotal" id="finaltotal"><?php echo e(Session::get("usercurrency").number_format(Cart::getTotal(), 2, '.', '')); ?>

                     </p>
                  </div>
               </div>
            </div>
            <div class="cart-shipping-box">
               <div class="cart-b-shipping">
                  <div class="cart-bs-heading">
                     <h4><?php echo e(__('messages.shipping')); ?></h4>
                     <?php echo e(Form::open(array('url' => 'checkout'))); ?>

                        <div class="cart-bs-content">
                          <?php echo e(Form::token()); ?>

                           <p>
                              <input type="checkbox" id="home1" name="delivery_option" class="checkbox-custom" value="0" onclick="changeoptioncart(this.value)">
                              <label for="home1" class="checkbox-custom-label">
                              <?php echo e(__('messages.HD')); ?>

                              </label>
                           </p>
                           <div class="cart-bs-content-2">
                              <p>
                                 <input type="checkbox" id="home2" class="checkbox-custom" value="1" name="delivery_option" onclick="changeoptioncart(this.value)">
                                 <label for="home2" class="checkbox-custom-label">
                                 <?php echo e(__('messages.LP')); ?>

                                 </label>
                              </p>
                           </div>
                        </div>
                        <div class="cart-bsc-note">
                           <p><?php echo e(__('messages.ship_sug')); ?></p>
                        </div>
                        <div>
                           <button type="submit" class="checkout-but">
                           <span><?php echo e(__('messages.btn_checkout')); ?></span>
                           </button>
                        </div>
                     <?php echo e(Form::close()); ?>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.subindex', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\kingburger\resources\views/user/cartdetails.blade.php ENDPATH**/ ?>