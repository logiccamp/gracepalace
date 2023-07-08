<?php $__env->startSection('content'); ?>   
<div class="breadcrumbs breadsetting" style="margin-top: 5px">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1><?php echo e(__('messages.setting')); ?></h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li class="active"><?php echo e(__('messages.setting')); ?></li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="content mt-3">
<div class="row rowkey">
   <div class="col-md-9">
      <div class="card">
         <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                 <?php if(Session::has('message')): ?>
                     <div class="col-sm-12">
                        <div class="alert  <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible fade show" role="alert"><?php echo e(Session::get('message')); ?>

                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                     </div>
                     <?php endif; ?>
               <li class="nav-item">
                  <a class="nav-link <?= $tab==1?"active show ":"" ?>" id="step1-tab" data-toggle="tab" href="#step1" role="tab" aria-controls="step1" aria-selected="true"><?php echo e(__('messages.res_detail')); ?></a>
               </li>
                <li class="nav-item">
                  <a class="nav-link <?= $tab==2?"active show ":"" ?>" id="step3-tab" data-toggle="tab" href="#step3" role="tab" aria-controls="step3" aria-selected="true"><?php echo e(__('messages.payment')); ?></a>
               </li>
               <?php if($data->is_web!='0'): ?>
                  <li class="nav-item">
                     <a class="nav-link <?= $tab==3?"active show ":"" ?>" id="step2-tab" data-toggle="tab" href="#step2" role="tab" aria-controls="step2" aria-selected="true"><?php echo e(__('messages.soical_media')); ?></a>
                  </li>              
                  <li class="nav-item">
                     <a class="nav-link <?= $tab==4?"active show ":"" ?>" id="step4-tab" data-toggle="tab" href="#step4" role="tab" aria-controls="step4" aria-selected="true"><?php echo e(__('messages.web images')); ?></a>
                  </li>
               <?php endif; ?>
            </ul>
            <div class="tab-content pl-3 p-1" id="myTabContent">
              <div class="tab-pane fade <?= $tab==1?"active show ":"" ?>" id="step1" role="tabpanel" aria-labelledby="step1-tab">
                  <div class="tabdiv">
                      <form action="<?php echo e(url('saveresdetail')); ?>" method="post">
                           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                           <div class="form-group">
                              <label for="email" class=" form-control-label"><?php echo e(__('messages.order_status')); ?>:-</label>
                              <?php if($data->order_status=='1'): ?>
                                <?php if(Session::get("demo")==0): ?>
                                 <input type="button" name="add_menu_cat"  class="btn btn-primary btn-flat m-b-30 m-t-30 orderbtn" value="<?php echo e(__('messages.online')); ?>" onclick="disablebtn()">
                                 <?php else: ?>
                                  <button class="btn btn-primary btn-flat m-b-30 m-t-30 orderbtn" onclick="changeordersetting('0')"><?php echo e(__('messages.online')); ?></button>
                                 <?php endif; ?>
                             
                              <?php endif; ?>
                              <?php if($data->order_status=='0'): ?>
                               <?php if(Session::get("demo")==0): ?>
                                 <input type="button" name="add_menu_cat"  class="btn btn-primary btn-flat m-b-30 m-t-30 orderbtn" value="<?php echo e(__('messages.offline')); ?>" onclick="disablebtn()">
                                 <?php else: ?>
                                  <button class="btn btn-primary btn-flat m-b-30 m-t-30 orderbtn" onclick="changeordersetting('1')"><?php echo e(__('messages.offline')); ?></button>
                                 <?php endif; ?>
                              <?php endif; ?>
                           </div>
                           <div class="form-group">
                              <label for="address" class=" form-control-label"><?php echo e(__('messages.address')); ?><span class="reqfield">*</span></label>
                              <textarea id="address" name="address" placeholder="<?php echo e(__('messages.address')); ?>" class="form-control" required><?php echo e($data->address); ?></textarea>
                           </div>
                           <div class="form-group">
                              <label for="email" class=" form-control-label"><?php echo e(__('messages.email')); ?><span class="reqfield">*</span></label>
                              <input type="text"  id="email" name="email" placeholder="<?php echo e(__('messages.email')); ?>" class="form-control" value="<?php echo e($data->email); ?>" required>
                           </div>
                           <div class="form-group">
                              <label for="phone_no" class=" form-control-label"><?php echo e(__('messages.phone_no')); ?><span class="reqfield">*</span></label>
                              <input type="text" id="phone_no" name="phone_no" placeholder="<?php echo e(__('messages.phone_no')); ?>" class="form-control" value="<?php echo e($data->phone); ?>" required>
                           </div>
                           <div class="form-group">
                              <label for="phone_no" class=" form-control-label"><?php echo e(__('messages.delivery_charges')); ?><span class="reqfield">*</span></label>
                              <input type="text" id="delivery" name="delivery" placeholder="<?php echo e(__('messages.delivery_charges')); ?>" class="form-control" value="<?php echo e($data->delivery_charges); ?>" required>
                           </div>
                           <div class="form-group">
                                 <label for="name" class=" form-control-label">
                                 <?php echo e(__('messages.default_timezone')); ?>

                                 <span class="reqfield">*</span>
                                 </label>
                                 <select class="form-control" name="timezone" id="timezone" required="">
                                    <option value=""><?php echo e(__('messages.select_timezone')); ?></option>
                                    <?php $__currentLoopData = $timezone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tz=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tz); ?>" <?=$data->timezone ==$tz ? ' selected="selected"' : '';?>><?php echo e($value); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                              </div>
                           <div class="col-md-12"> 
                                <?php if(Session::get("demo")==0): ?>
                                     <button id="payment-button" type="button" class="btn btn-lg btn-info btn-block" onclick="disablebtn()">
                                 <?php echo e(__('messages.update')); ?>

                                 </button>
                                 <?php else: ?>
                                  <button class="btn btn-primary btnright" type="submit" > <?php echo e(__('messages.update')); ?></button>
                                 <?php endif; ?>
                           </div>
                     </form>
                  </div>
               </div>
               <div class="tab-pane fade <?= $tab==2?"active show ":"" ?>" id="step3" role="tabpanel" aria-labelledby="step3-tab">
                  <div class="tabdiv">
                     <form action="<?php echo e(url('savepaymentdata')); ?>" method="post">
                           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                     <div class="form-group">
                        <label for="stripe_key" class=" form-control-label"><?php echo e(__('messages.stripe_key')); ?><span class="reqfield">*</span></label>
                        <input type="password" id="stripe_key" name="stripe_key" placeholder="<?php echo e(__('messages.stripe_key')); ?>" class="form-control" required value="<?php echo e($data->stripe_key); ?>">
                       
                     </div>
                     <div class="form-group">
                        <label for="stripe_secret" class=" form-control-label"><?php echo e(__('messages.stripe_secert')); ?><span class="reqfield">*</span></label>
                        <input type="password" id="stripe_secret" name="stripe_secret" placeholder="<?php echo e(__('messages.stripe_secert')); ?>" class="form-control" required value="<?php echo e($data->stripe_secret); ?>">
                      
                     </div>
                     <div class="form-group">
                        <label for="paypal_client_id" class=" form-control-label"><?php echo e(__('messages.paypal_client_id')); ?><span class="reqfield">*</span></label>
                        <input type="password" id="paypal_client_id" name="paypal_client_id" placeholder="<?php echo e(__('messages.paypal_client_id')); ?>" class="form-control" required value="<?php echo e($data->paypal_client_id); ?>">
                       
                     </div>
                     <div class="form-group">
                        <label for="paypal_client_secret" class=" form-control-label"><?php echo e(__('messages.paypal_client_secert')); ?><span class="reqfield">*</span></label>
                        <input type="password" id="paypal_client_secret" name="paypal_client_secret" placeholder="<?php echo e(__('messages.paypal_client_secert')); ?>" class="form-control" required value="<?php echo e($data->paypal_client_secret); ?>">
                        
                     </div>
                     <div class="form-group paycheckbox">
                        <div class="col col-md-12">
                           <div class="form-check">
                              <div class="status">
                                 <label for="checkbox1" class="form-check-label ">
                                 <input type="checkbox" id="paypal_mode" name="paypal_mode" value="0" class="form-check-input" <?=$data->paypal_mode =='0' ? ' checked="checked"' : '';?>>
                                 <?php echo e(__('messages.paypal_test_pay')); ?>

                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                       <div class="form-group paycheckbox">
                        <div class="col col-md-12">
                           <div class="form-check">
                              <div class="status">
                                 <label for="checkbox1" class="form-check-label ">
                                 <input type="checkbox" id="stripe_active" name="stripe_active" value="1" class="form-check-input" <?=$data->stripe_active =='1' ? ' checked="checked"' : '';?>>
                                 <?php echo e(__('messages.stripe_enable')); ?>

                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                       <div class="form-group paycheckbox">
                        <div class="col col-md-12">
                           <div class="form-check">
                              <div class="status">
                                 <label for="checkbox1" class="form-check-label ">
                                 <input type="checkbox" id="paypal_active" name="paypal_active" value="1" class="form-check-input" <?=$data->paypal_active =='1' ? ' checked="checked"' : '';?>>
                                 <?php echo e(__('messages.paypal_enable')); ?>

                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group col-md-12">
                       
                           <?php if(Session::get("demo")==0): ?>
                               <button id="payment-button" type="button" class="btn btn-lg btn-info btn-block" onclick="disablebtn()">
                           <?php echo e(__('messages.update')); ?>

                           </button>
                           <?php else: ?>
                            <button class="btn btn-primary btnright" type="submit"> <?php echo e(__('messages.update')); ?></button>
                           <?php endif; ?>
                     </div>
                  </form>
                  </div>
               </div>
               <div class="tab-pane fade <?= $tab==3?"active show ":"" ?>" id="step2" role="tabpanel" aria-labelledby="step2-tab">
                  <div class="tabdiv">
                       <form action="<?php echo e(url('savesoicalsetting')); ?>" method="post">
                           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                     <div class="form-group">
                        <label for="email" class=" form-control-label"><?php echo e(__('messages.google_play_store')); ?>:-<span class="reqfield">*</span></label>
                        <input type="text"  id="playstore" name="playstore" placeholder="<?php echo e(__('messages.google_play_store')); ?>" class="form-control" value="<?php echo e($data->play_store_url); ?>" required>
                     </div>
                     <div class="form-group">
                        <label for="email" class=" form-control-label"><?php echo e(__('messages.app_store')); ?>:-<span class="reqfield">*</span></label>
                        <input type="text"  id="appstore" name="appstore" placeholder="<?php echo e(__('messages.app_store')); ?>" class="form-control" value="<?php echo e($data->app_store_url); ?>" required>
                     </div>
                     <div class="form-group">
                        <label for="email" class=" form-control-label"><?php echo e(__('messages.facebook_url')); ?>:-<span class="reqfield">*</span></label>
                        <input type="text"  id="facebook_id" name="facebook_id" placeholder="<?php echo e(__('messages.facebook_url')); ?> " class="form-control" value="<?php echo e($data->facebook_id); ?>" required>
                     </div>
                     <div class="form-group">
                        <label for="email" class=" form-control-label"><?php echo e(__('messages.twitter_url')); ?>:-<span class="reqfield">*</span></label>
                        <input type="text"  id="twitter_id" name="twitter_id" placeholder="<?php echo e(__('messages.twitter_url')); ?>" class="form-control" value="<?php echo e($data->twitter_id); ?>" required>
                     </div>
                     <div class="form-group">
                        <label for="email" class=" form-control-label"><?php echo e(__('messages.linkedin_id')); ?><span class="reqfield">*</span></label>
                        <input type="text"  id="linkedin_id" name="linkedin_id" placeholder="<?php echo e(__('messages.linkedin_id')); ?>" class="form-control" value="<?php echo e($data->linkedin_id); ?>" required>
                     </div>
                     <div class="form-group">
                        <label for="email" class=" form-control-label"><?php echo e(__('messages.googleplus_id')); ?><span class="reqfield">*</span></label>
                        <input type="text"  id="google_plus_id" name="google_plus_id" placeholder="<?php echo e(__('messages.googleplus_id')); ?>" class="form-control" value="<?php echo e($data->google_plus_id); ?>" required>
                     </div>
                     <div class="form-group">
                        <label for="email" class=" form-control-label"><?php echo e(__('messages.whatsapp')); ?><span class="reqfield">*</span></label>
                        <input type="text"  id="whatsapp" name="whatsapp" placeholder="<?php echo e(__('messages.whatsapp')); ?>" class="form-control" value="<?php echo e($data->whatsapp); ?>" required>
                     </div>
                       <div class="form-group paycheckbox">
                        <div class="col col-md-12">
                           <div class="form-check">
                              <div class="status">
                                 <label for="checkbox1" class="form-check-label ">
                                 <input type="checkbox" id="have_playstore" name="have_playstore" value="1" class="form-check-input" <?=$data->have_playstore =='1' ? ' checked="checked"' : '';?>>
                                 <?php echo e(__('messages.Android Applciation Link')); ?>

                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                       <div class="form-group paycheckbox">
                        <div class="col col-md-12">
                           <div class="form-check">
                              <div class="status">
                                 <label for="checkbox1" class="form-check-label ">
                                 <input type="checkbox" id="have_appstore" name="have_appstore" value="1" class="form-check-input" <?=$data->have_appstore =='1' ? ' checked="checked"' : '';?>>
                                 <?php echo e(__('messages.Ios Application Link')); ?>

                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group col-md-12">
                           <?php if(Session::get("demo")==0): ?>
                               <button id="payment-button" type="button" class="btn btn-lg btn-info btn-block" onclick="disablebtn()">
                           <?php echo e(__('messages.update')); ?>

                           </button>
                           <?php else: ?>
                            <button class="btn btn-primary btnright" type="submit"> <?php echo e(__('messages.update')); ?></button>
                           <?php endif; ?>
                        </form>
                     </div>
                  </div>
               </div>
              
               <div class="tab-pane fade <?= $tab==4?"active show ":"" ?>" id="step4" role="tabpanel" aria-labelledby="step4-tab">
                  <div class="tabdiv">
                      <form action="<?php echo e(url('savewebimage')); ?>" method="post" enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                     <div class="row">
                         <div class="form-group col-md-3" >
                             <img src="<?php echo e(asset('upload/web').'/'.$data->logo); ?>" class="webimage" />
                         </div>
                         <div class="form-group col-md-9">
                             <label for="stripe_key" class=" form-control-label"><?php echo e(__("messages.Logo")); ?> (100X100)<span class="reqfield">*</span></label>
                             <input type="file" name="logo" id="logo" onchange="Upload('logo',100,100)" class="form-control" >
                         </div>
                     </div>
                     <div class="row">
                         <div class="form-group col-md-3" >
                             <img src="<?php echo e(asset('upload/web').'/'.$data->main_banner); ?>" class="webimage" />
                         </div>
                         <div class="form-group col-md-9">
                             <label for="stripe_key" class=" form-control-label"><?php echo e(__("messages.Main Banner")); ?>(1920X840)<span class="reqfield">*</span></label>
                             <input type="file" name="main_banner" id="main_banner" class="form-control" onchange="Upload('main_banner',1920,840)" >
                         </div>
                     </div>
                     <div class="row">
                         <div class="form-group col-md-3" >
                             <img src="<?php echo e(asset('upload/web').'/'.$data->second_sec_img); ?>" class="webimage"/>
                         </div>
                         <div class="form-group col-md-9">
                             <label for="stripe_key" class=" form-control-label"><?php echo e(__("messages.Second Section Image")); ?>(480X318)<span class="reqfield">*</span></label>
                             <input type="file" name="second_sec_img" id="second_sec_img" class="form-control" onchange="Upload('second_sec_img',487,323)" >
                         </div>
                     </div>
                     <div class="row">
                         <div class="form-group col-md-3" >
                             <img src="<?php echo e(asset('upload/web').'/'.$data->secong_icon_img); ?>" class="webimage" />
                         </div>
                         <div class="form-group col-md-9">
                             <label for="stripe_key" class=" form-control-label"><?php echo e(__("messages.Second Section Icon")); ?> (57X51)<span class="reqfield">*</span></label>
                             <input type="file" name="secong_icon_img" id="secong_icon_img" class="form-control" onchange="Upload('secong_icon_img',73,65)" >
                         </div>
                     </div>
                     <div class="row">
                         <div class="form-group col-md-3" >
                             <img src="<?php echo e(asset('upload/web').'/'.$data->footer_up_img); ?>" class="webimage" />
                         </div>
                         <div class="form-group col-md-9">
                             <label for="stripe_key" class=" form-control-label"><?php echo e(__('messages.Footer Up Image')); ?>(356X303)<span class="reqfield">*</span></label>
                             <input type="file" name="footer_up_img" id="footer_up_img" class="form-control" onchange="Upload('footer_up_img',447,380)" >
                         </div>
                     </div>
                     <div class="row">
                         <div class="form-group col-md-3" >
                             <img src="<?php echo e(asset('upload/web').'/'.$data->footer_img); ?>" class="webimage"/>
                         </div>
                         <div class="form-group col-md-9">
                             <label for="stripe_key" class=" form-control-label"><?php echo e(__('messages.Footer Image')); ?>(1920X840)<span class="reqfield">*</span></label>
                             <input type="file" name="footer_img" id="footer_img" class="form-control" onchange="Upload('footer_up_img',1920,840)">
                         </div>
                     </div>
                    
                    
                     <div class="form-group col-md-12">
                       
                           <?php if(Session::get("demo")==0): ?>
                               <button id="payment-button" type="button" class="btn btn-lg btn-info btn-block" onclick="disablebtn()">
                           <?php echo e(__('messages.update')); ?>

                           </button>
                           <?php else: ?>
                            <button class="btn btn-primary btnright" type="submit"> <?php echo e(__('messages.update')); ?></button>
                           <?php endif; ?>
                     </div>
                  </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<input type="hidden" id="req_msg" value="<?php echo e(__('successerr.req_fields')); ?>">
<input type="hidden" id="datasave" value="<?php echo e(__('successerr.data_save')); ?>">
<?php $__env->stopSection(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\kingburger\resources\views/admin/setting.blade.php ENDPATH**/ ?>