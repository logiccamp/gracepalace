<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1><?php echo e(__('messages.menu_category')); ?></h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li class="active"><?php echo e(__('messages.menu_category')); ?></li>
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
               <button  class="btn btn-primary btn-flat m-b-30 m-t-30" data-toggle="modal" data-target="#myModal"><?php echo e(__('messages.add_menu_cat')); ?></button>
               <div class="table-responsive dtdiv">
                  <table id="myCatTable" class="table table-striped dttablewidth">
                     <thead>
                        <tr>
                           <th><?php echo e(__('messages.id')); ?></th>
                           <th><?php echo e(__('messages.category_name')); ?></th>
                           <th><?php echo e(__('messages.category_icon')); ?></th>
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
               <h5 class="modal-title"><?php echo e(__('messages.add_menu_cat')); ?>

               </h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form name="menu_form_category" action="<?php echo e(url('add_menu_cateogry')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                  <div class="form-group">
                     <label><?php echo e(__('messages.category_name')); ?> <span class="reqfield">*</span></label>
                     <input type="text" class="form-control" placeholder=" <?php echo e(__('messages.category_name')); ?>" name="name" required>
                  </div>
                  <div class="form-group">
                     <label><?php echo e(__('messages.category_icon')); ?>(35 X35) <span class="reqfield">*</span></label>
                     <input type="file" class="form-control"  name="image" required  accept="image/*">
                  </div>
                  <div class="col-md-12">
                     <div class="col-md-6">
                           <?php if(Session::get("demo")==0): ?>
                           <input type="button" name="add_menu_cat"  class="btn btn-primary btn-md form-control" value="<?php echo e(__('messages.add')); ?>" onclick="disablebtn()">
                           <?php else: ?>
                            <input type="submit" name="add_menu_cat"  class="btn btn-primary btn-md form-control" value="<?php echo e(__('messages.add')); ?>">
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
<div class="modal fade" id="editMenu" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title"><?php echo e(__('messages.edit_menu_category')); ?>

               </h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form name="menu_form_category" action="<?php echo e(url('updatecategory')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="id" id="id"/>
                  <input type="hidden" name="real_image" id="real_image"/>
                  <div class="form-group">
                     <label><?php echo e(__('messages.category_name')); ?> <span class="reqfield">*</span></label>
                     <input type="text" class="form-control" placeholder="<?php echo e(__('messages.category_name')); ?>" name="name" id="name" required>
                  </div>
                  <div class="form-group">
                     <label><?php echo e(__('messages.category_icon')); ?>(35 X35) <span class="reqfield">*</span></label></br>
                     <img id="image1" class="cat_img" />
                     <input type="file" class="form-control"  name="image"   accept="image/*" >
                  </div>
                  <div class="col-md-12">
                     <div class="col-md-6">
                        
                         <?php if(Session::get("demo")==0): ?>
                           <input type="button" name="add_menu_cat"  class="btn btn-primary btn-md form-control" value="<?php echo e(__('messages.update')); ?>" onclick="disablebtn()">
                           <?php else: ?>
                           <input type="submit" name="add_menu_cat"  class="btn btn-primary btn-md form-control" value="<?php echo e(__('messages.update')); ?>">
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
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\kingburger\resources\views/admin/category/default.blade.php ENDPATH**/ ?>