 <?php $__env->startSection('content'); ?>
<?php 
   function readMoreHelper1($story_desc, $chars = 75) {
    $story_desc = substr($story_desc,0,$chars);  
    $story_desc = substr($story_desc,0,strrpos($story_desc,' '));  
    $story_desc = $story_desc."...";  
    return $story_desc;  
   }
   function headreadMoreHelper1($story_desc, $chars =75) {
    $story_desc = substr($story_desc,0,$chars);  
    $story_desc = substr($story_desc,0,strrpos($story_desc,' '));  
    $story_desc = $story_desc;  
    return $story_desc;  
   }  
   
   ?>
<div class="container detail-section-2">
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
      <div class="col-lg-5 col-md-5 col-sm-6 col-12">
         <img src="<?php echo e(asset('upload/images/menu_item_icon/'.$itemdetails->menu_image)); ?>" class="img-fluid detail-product-img" alt="<?php echo e(__('messages.res_image')); ?>">
      </div>
      <input type="hidden" name="item_id" id="item_id" value="<?php echo e($itemdetails->id); ?>" />
      <div class="col-lg-7 col-md-7 col-sm-6 col-12">
         <div class="detail-product-box">
            <div class="detail-descri">
               <div class="detail-product-head">
                  <h4><?php echo e($itemdetails->menu_name); ?></h4>
                  <input type="hidden" name="menu_name" id="menu_name" value="<?php echo e($itemdetails->menu_name); ?>"/>
                  <p><?php echo e(Session::get("usercurrency")); ?><span id="price"><?php echo e($itemdetails->price); ?></span></p>
                  <input type="hidden" id="origin_price" name="origin_price" value="<?php echo e($itemdetails->price); ?>" />
               </div>
               <div class="detail-product-content">
                  <p><?php echo e($itemdetails->description); ?></p>
               </div>
               <div class="detail-share-buttons">
                  <div class="detail-facebook">
                     <a href="javascript:shareonsoical(1,'<?php echo e($itemdetails->id); ?>')">
                     <i class="fa fa-facebook-square" aria-hidden="true"></i>
                     <span><?php echo e(__('messages.share')); ?></span>
                     <span id="facebook_share_id"><?php echo e($itemdetails->facebook_share); ?></span>
                     </a>
                  </div>
                  <div class="detail-tweet">
                     <a href="javascript:shareonsoical(2,'<?php echo e($itemdetails->id); ?>')">
                     <i class="fa fa-twitter" aria-hidden="true"></i>
                     <span><?php echo e(__('messages.tweet')); ?></span>
                     <span id="twitter_share_id"><?php echo e($itemdetails->twitter_share); ?></span>
                     </a>
                  </div>
               </div>
            </div>
            <div class="detail-ingredients">
               <div class="detail-ingredients-heading">
                  <h2><?php echo e(__('messages.ingredients')); ?></h2>
               </div>
               <div class="row">
                  <div class="col-lg-6 col-md-6">
                     <div class="detail-ingredients-head detail-ingredients-head-1">
                        <h3><?php echo e(__('messages.FI')); ?></h3>
                        <form>
                           <?php $i=0;?>
                           <?php $__currentLoopData = $menu_interdient1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($mi->type==0): ?>
                           <p>
                              <input type="checkbox" id="checkbox-<?php echo e($i); ?>" class="checkbox-custom" name="interdient" value="<?php echo e($mi->id); ?>">
                              <label for="checkbox-<?php echo e($i); ?>" class="checkbox-custom-label">
                              <?php echo e($mi->item_name); ?>

                              </label>
                           </p>
                           <?php $i++;?>
                           <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </form>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                     <div class="detail-ingredients-head">
                        <h3><?php echo e(__('messages.PI')); ?></h3>
                        <form>
                           <?php $__currentLoopData = $menu_interdient1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($mi->type==1): ?>
                           <p>
                              <input type="checkbox" id="checkbox-<?php echo e($i); ?>" class="checkbox-custom" name="interdient" value="<?php echo e($mi->id); ?>" onclick="addprice('<?php echo e($mi->price); ?>','<?php echo e($i); ?>')">
                              <label for="checkbox-<?php echo e($i); ?>" class="checkbox-custom-label">
                              <?php echo e($mi->item_name); ?>

                              </label>
                           </p>
                           <?php $i++;?>
                           <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <div class="detail-plus-button min-add-button">
               <div class="input-group">
                  <a data-decrease>
                  <i class="fa fa-minus" aria-hidden="true" onclick="decreaseValue()"></i>
                  </a>
                  <input type="text" id="number" name="qty" value="<?php echo e(__('messages.qty_pl')); ?>" />
                  <a data-increase>
                  <i class="fa fa-plus" aria-hidden="true" onclick="increaseValue()"></i>
                  </a>
               </div>
            </div>
            <a href="javascript:addtocart()">
               <div class="detail-plus-add-cart">
                  <span><?php echo e(__('messages.addcart')); ?></span>
               </div>
            </a>
         </div>
      </div>
   </div>
</div>
<div class="detail-related-box">
   <div class="container">
      <div class="detail-related-head">
         <h3><?php echo e(__('messages.realted_pro')); ?></h3>
      </div>
      <?php for($i=0;$i<count($related_item);$i++) { ?>
       <div class="row">
         <?php if(!empty($related_item[$i])): ?>
        
         <div class="col-lg-6 col-md-6">
            <div class="bor detail-related-tab">
               <div class="items">
                  <div class="b-img">
                     <a href="<?php echo e(url('detailitem/'.$related_item[$i]->id)); ?>">
                     <img src="<?php echo e(asset('upload/images/menu_item_icon/'.$related_item[$i]->menu_image)); ?>" class="img-fluid">
                     </a>
                  </div>
                  <div class="bor">
                     <div class="b-text">
                        <a href="<?php echo e(url('detailitem/'.$related_item[$i]->id)); ?>">
                           <h1><?php echo e($related_item[$i]->menu_name); ?></h1>
                        </a>
                        <p><?php echo e($related_item[$i]->description); ?></p>
                     </div>
                     <div class="price">
                        <h1><?php echo e(Session::get("usercurrency")); ?><?php echo e($related_item[$i]->price); ?></h1>
                        <div class="cart">
                           <a href="<?php echo e(url('detailitem/'.$related_item[$i]->id)); ?>"><?php echo e(__('messages.addcart')); ?></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
          <?php $i++;?>
         <?php endif; ?>
         <?php if(!empty($related_item[$i])): ?>
         <div class="col-lg-6 col-md-6">
            <div class="bor detail-related-tab">
               <div class="items">
                  <div class="b-img">
                     <a href="<?php echo e(url('detailitem/'.$related_item[$i]->id)); ?>">
                     <img src="<?php echo e(asset('upload/images/menu_item_icon/'.$related_item[$i]->menu_image)); ?>" class="img-fluid">
                     </a>
                  </div>
                  <div class="bor">
                     <div class="b-text">
                        <a href="<?php echo e(url('detailitem/'.$related_item[$i]->id)); ?>">
                           <h1><?php echo e($related_item[$i]->menu_name); ?></h1>
                        </a>
                        <p><?php echo e($related_item[$i]->description); ?></p>
                     </div>
                     <div class="price">
                        <h1><?php echo e(Session::get("usercurrency")); ?><?php echo e($related_item[$i]->price); ?></h1>
                        <div class="cart">
                           <a href="<?php echo e(url('detailitem/'.$related_item[$i]->id)); ?>"><?php echo e(__('messages.addcart')); ?></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php endif; ?>
         </div>
     <?php } ?>
  
   </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.subindex', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\kingburger\resources\views/user/detailitem.blade.php ENDPATH**/ ?>