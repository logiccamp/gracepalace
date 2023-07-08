<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1><?php echo e(__('messages.dashboard')); ?></h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li class="active"><?php echo e(__('messages.dashboard')); ?></li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="content mt-3">
   <div class="col-sm-4 ">
      <div class="card text-white bg-flat-color-1 dashbox1">
         <div class="card-body pb-0">
            <div class="col-md-12" >
               <h4 class="mb-0">
                  <span class="count dashbozsi"><?php echo e($today_order); ?></span>
               </h4>
            </div>
            <div class="col-md-12">
               <p class="text-light"><?php echo e(__('messages.today_order')); ?></p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-4 ">
      <div class="card text-white bg-flat-color-1 dashbox2">
         <div class="card-body pb-0">
            <div class="col-md-12">
               <h4 class="mb-0">
                  <span class="count dashbozsi"><?php echo e($total_user); ?></span>
               </h4>
            </div>
            <div class="col-md-12">
               <p class="text-light"><?php echo e(__('messages.total_order')); ?></p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-4 ">
      <div class="card text-white bg-flat-color-1 dashbox3">
         <div class="card-body pb-0">
            <div class="col-md-12" >
               <h4 class="mb-0">
                  <span class="count dashbozsi"><?php echo e($total_accept); ?></span>
               </h4>
            </div>
            <div class="col-md-12">
               <p class="text-light"><?php echo e(__('messages.total_accept_order')); ?></p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-12">
      <div class="card">
         <div class="card-body">
            <?php if(Session::has('message')): ?>
            <div class="col-sm-12">
               <div class="alert  <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible fade show" role="alert"><?php echo e(Session::get('message')); ?>

                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            </div>
            <?php endif; ?>
            <div class="table-responsive dtdiv">
               <table id="orderTable" class="table table-striped dttablewidth">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th><?php echo e(__('messages.name')); ?></th>
                        <th><?php echo e(__('messages.address')); ?></th>
                        <th><?php echo e(__('messages.more_detail')); ?></th>
                        <th><?php echo e(__('messages.print')); ?></th>
                        <th><?php echo e(__('messages.status')); ?></th>
                        <th><?php echo e(__('messages.action')); ?></th>
                     </tr>
                  </thead>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="moreinfo" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="orderheader">  </h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <div>
                  <div class="container">
                     <h5 class="moredetailinfo"><?php echo e(__('messages.person_detail')); ?></h5>
                     <div><b id="username"></b></div>
                     <div id="phoneno"></div>
                     <div id="ordertime"></div>
                     <div id="address" class="moreaddress"></div>
                     <div id="paymenttype"></div>
                     <div id="note"></div>
                     <div id="pickup_time"></div>
                  </div>
                  <h5 class="orderh"><?php echo e(__('messages.order_detail')); ?></h5>
                  <table class="table" id="itemdata">
                     <tbody>
                        <tr>
                           <th><?php echo e(__('messages.item_name')); ?></th>
                           <th><?php echo e(__('messages.item_qty')); ?></th>
                           <th><?php echo e(__('messages.price')); ?></th>
                           <th><?php echo e(__('messages.total_price')); ?></th>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="assignorder" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title"><?php echo e(__('messages.ass_header')); ?>

               </h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form name="menu_form_category" action="<?php echo e(url('assignorder')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                  <div class="form-group">
                     <label><?php echo e(__('messages.order_id')); ?></label>
                     <input type="text" class="form-control" placeholder="<?php echo e(__('messages.order_id')); ?>" name="id" id="order_id" readonly>
                  </div>
                  <div class="form-group">
                     <label><?php echo e(__('messages.sel_del_boy')); ?></label>
                     <select class="form-control" name="assign_id" required>
                        <option value=""><?php echo e(__('messages.sel_del_boy')); ?></option>
                        <?php $__currentLoopData = $delivery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </select>
                  </div>
                  <div class="col-md-12">
                     <div class="col-md-6">
                        <input type="submit" name="add_menu_cat"  class="btn btn-primary btn-md form-control" value="<?php echo e(__('messages.add')); ?>">
                     </div>
                     <div class="col-md-6">
                        <input type="button" class="btn btn-secondary btn-md form-control" data-dismiss="modal" value="<?php echo e(__('messages.close')); ?>">
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<input type="hidden" id="order_no_msg" value="<?php echo e(__('messages.order_no')); ?>">
<input type="hidden" id="order_pay_type" value="<?php echo e(__('messages.pay_type')); ?>">
<input type="hidden" id="ordermsgnote" value="<?php echo e(__('messages.note')); ?>">
<input type="hidden" id="orderpicktime" value="<?php echo e(__('messages.pickuptime')); ?>">
<input type="hidden" id="orderitem_name" value="<?php echo e(__('messages.item_name')); ?>">
<input type="hidden" id="ordermsg_item_qty" value="<?php echo e(__('messages.item_qty')); ?>">
<input type="hidden" id="ordermsg_price" value="<?php echo e(__('messages.price')); ?>">
<input type="hidden" id="ordermsg_totalprice" value="<?php echo e(__('messages.total_price')); ?>">
<input type="hidden" id="ordermsg_subtotal" value="<?php echo e(__('messages.subtotal')); ?>">
<input type="hidden" id="ordermsg_delivery_charges" value="<?php echo e(__('messages.delivery_charges')); ?>">
<input type="hidden" id="ordermsg_total" value="<?php echo e(__('messages.total')); ?>">
<input type="hidden" id="ordermsg_confirm" value="<?php echo e(__('successerr.order_con_msg')); ?>">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\kingburger\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>