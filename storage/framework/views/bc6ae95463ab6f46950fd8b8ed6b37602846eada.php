<?php $__env->startSection('content'); ?>
<div class="container">
   <div class="contact-h">
      <h1><?php echo e(__('messages.contact_us')); ?></h1>
      <p><?php echo e(__('messages.service_sugg')); ?></p>
   </div>
   <div class="contact-add">
      <div class="row">
         <div class="col-md-8">
            <div class="contact-head">
               <h1><?php echo e(__('messages.leave_msg')); ?></h1>
               <p><?php echo e(__('messages.contact_sugg')); ?></p>
               <?php if(Session::has('message')): ?>
               <div class="col-sm-12">
                  <div class="alert  <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible fade show" role="alert"><?php echo e(Session::get('message')); ?>

                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
               </div>
               <?php endif; ?>
               <form action="<?php echo e(url('savecontact')); ?>" method="post">
                  <?php echo e(csrf_field()); ?>

                  <br>
                  <input type="text" name="name" id="acco-tab-fo" required placeholder="<?php echo e(__('messages.name')); ?>" />
                  <br>
                  <input type="email" name="email" id="acco-tab-fo" required placeholder="<?php echo e(__('messages.email')); ?>"/>
                  <br>
                  <input type="text" name="phone" id="acco-tab-fo" required placeholder="<?php echo e(__('messages.phone_no')); ?>"/>
                  <br>
                  <textarea name="message" required placeholder="<?php echo e(__('messages.msg')); ?>"></textarea>
                  <button class="submit" type="submit"><?php echo e(__('messages.submit')); ?></button>
               </form>
            </div>
         </div>
         <div class="col-md-4">
            <div class="contact-head-1">
               <h1><?php echo e(__('messages.our_add')); ?></h1>
               <p> 
               <div class="f-location col-md-12 p-0">
                  <div class="col-md-1 col-1 icons"> 
                     <i class="fa fa-address-book" aria-hidden="true"></i>
                  </div>
                  <div class="col-md-10 col-10 co-add">
                     <p><?php echo e(Session::get('address')); ?></p>
                  </div>
               </div>
               <div class="f-location col-md-12 p-0">
                  <div class="col-md-1 col-1 icons"> 
                     <i class="fa fa-envelope" aria-hidden="true"></i>
                  </div>
                  <div class="col-md-10 col-10 co-add">
                     <p><?php echo e(Session::get('phone')); ?></p>
                  </div>
               </div>
               <div class="f-location col-md-12 p-0">
                  <div class="col-md-1 col-1 icons"> 
                     <i class="fa fa-phone" aria-hidden="true"></i>
                  </div>
                  <div class="col-md-10 col-10 co-add">
                     <p><?php echo e(Session::get('email')); ?></p>
                  </div>
               </div>
               </p>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.subindex', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\kingburger\resources\views/user/contact.blade.php ENDPATH**/ ?>