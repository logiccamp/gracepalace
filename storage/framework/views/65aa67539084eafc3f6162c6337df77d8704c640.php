<?php $__env->startSection('content'); ?>
<div class="container">
      <div class="about-heading d-none">
          <h2><?php echo e(__('messages.aboutus')); ?></h2>
          <p><?php echo e(__('messages.aboutush')); ?></p>
      </div>
      <div class="about-history-1">
          <div class="row">
              <div class="col-lg-8 col-md-8">
                  <div class="about-history">
                     <h2><?php echo e(__('messages.aboutusdesch')); ?></h2>
                  </div>
                  <div class="about-content-1">
                    <p><?php echo e(__('messages.the')); ?> <span><?php echo e(__('messages.history_ki')); ?></span><?php echo e(__('messages.aboutdesc1')); ?></p>
                  </div>
                  <div class="about-content-1">
                    <p><?php echo e(__('messages.aboutdesc2')); ?><span><?php echo e(__('messages.boulang')); ?></span><?php echo e(__('messages.aboutdesc4')); ?></p>
                  </div>
              </div>
               <div class="col-lg-4 col-md-4">
                <img src="<?php echo e(asset('burger/images/burger-1.png')); ?>" class="about-image-1">
               </div>
          </div>
      </div>
   
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.subindex', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\kingburger\resources\views/user/about.blade.php ENDPATH**/ ?>