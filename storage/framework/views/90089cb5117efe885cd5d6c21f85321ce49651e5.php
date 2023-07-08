<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1><?php echo e(__('messages.menu_item')); ?></h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li class="active"><?php echo e(__('messages.menu_item')); ?></li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="content mt-3">
   <div class="row">
      <div class="col-12">
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
               <button  class="btn btn-primary btn-flat m-b-30 m-t-30" data-toggle="modal" data-target="#myModal"><?php echo e(__('messages.add')); ?><?php echo e(__('messages.menu_item')); ?></button>
               <div class="table-responsive dtdiv">
                  <table id="menutb" class="table table-striped dttablewidth">
                     <thead>
                        <tr>
                           <th><?php echo e(__('messages.id')); ?></th>
                           <th><?php echo e(__('messages.item_name')); ?></th>
                           <th><?php echo e(__('messages.category')); ?></th>
                           <th><?php echo e(__('messages.description')); ?></th>
                           <th><?php echo e(__('messages.price')); ?></th>
                           <th><?php echo e(__('messages.image')); ?></th>
                           <th><?php echo e(__('messages.action')); ?></th>
                        </tr>
                     </thead>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title"><?php echo e(__('messages.add')); ?><?php echo e(__('messages.menu_item')); ?>

               </h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form name="menu_form_category" action="<?php echo e(url('add_menu_item')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                  <div class="form-group">
                     <label><?php echo e(__('messages.select_cat')); ?></label>
                     <select class="form-control" name="category" required>
                        <option value=""><?php echo e(__('messages.select_cat')); ?></option>
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($c->id); ?>"><?php echo e($c->cat_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label><?php echo e(__('messages.item_name')); ?></label>
                     <input type="text" class="form-control" placeholder="<?php echo e(__('messages.item_name')); ?>" name="name" required>
                  </div>
                  <div class="form-group">
                     <label><?php echo e(__('messages.description')); ?></label>
                     <textarea class="form-control" required name="description" placeholder="<?php echo e(__('messages.description')); ?>" ></textarea>         
                  </div>
                  <div class="form-group">
                     <label><?php echo e(__('messages.price')); ?></label>
                     <input type="text" class="form-control" placeholder="<?php echo e(__('messages.price')); ?>" name="price"  required>
                  </div>
                  <div class="form-group">
                     <label><?php echo e(__('messages.image')); ?>(60X65)</label>
                     <input type="file" class="form-control"  name="image" required  accept="image/*">
                  </div>
                  <div class="col-md-12">
                     <div class="col-md-6">
                          <?php if(Session::get("demo")==0): ?>
                               <button id="payment-button" type="button" class="btn btn-primary btn-md form-control" onclick="disablebtn()">
                           <?php echo e(__('messages.add')); ?>

                           </button>
                           <?php else: ?>
                             <button id="payment-button" type="submit" class="btn btn-primary btn-md form-control">
                           <?php echo e(__('messages.add')); ?>

                           </button>
                           <?php endif; ?>
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
<div class="modal fade" id="edititem" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title"><?php echo e(__('messages.edit')); ?><?php echo e(__('messages.menu_item')); ?>

               </h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form name="menu_form_category" action="<?php echo e(url('update_menu_item')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="id" id="id">
                  <input type="hidden" name="real_image" id="real_image">
                  <div class="form-group">
                     <label><?php echo e(__('messages.select_cat')); ?></label>
                     <select class="form-control" name="category" id="category" required>
                        <option value=""><?php echo e(__('messages.select_cat')); ?></option>
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($c->id); ?>"><?php echo e($c->cat_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label><?php echo e(__('messages.item_name')); ?></label>
                     <input type="text" class="form-control" placeholder="<?php echo e(__('messages.item_name')); ?>" id="name" name="name" required>
                  </div>
                  <div class="form-group">
                     <label><?php echo e(__('messages.description')); ?></label>
                     <textarea class="form-control" required name="description" id="description" placeholder="<?php echo e(__('messages.description')); ?>" ></textarea>         
                  </div>
                  <div class="form-group">
                     <label><?php echo e(__('messages.price')); ?></label>
                     <input type="text" class="form-control" placeholder="<?php echo e(__('messages.price')); ?>" id="price" name="price"  required>
                  </div>
                  <div class="form-group">
                     <label><?php echo e(__('messages.image')); ?>(60X65)</label></br>
                     <img src="" id="image1" class="menuimage" />
                     <input type="file" class="form-control"  name="image"   accept="image/*">
                  </div>
                  <div class="col-md-12">
                     <div class="col-md-6">
                          <?php if(Session::get("demo")==0): ?>
                               <button id="payment-button" type="button" class="btn btn-primary btn-md form-control" onclick="disablebtn()">
                           <?php echo e(__('messages.update')); ?>

                           </button>
                           <?php else: ?>
                             <button id="payment-button" type="submit" class="btn btn-primary btn-md form-control">
                           <?php echo e(__('messages.update')); ?>

                           </button>
                           <?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\kingburger\resources\views/admin/item/default.blade.php ENDPATH**/ ?>