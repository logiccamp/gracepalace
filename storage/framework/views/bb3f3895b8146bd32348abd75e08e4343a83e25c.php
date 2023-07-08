<!doctype html>
<html class="no-js" lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title><?php echo e(__('messages.site_name')); ?></title>
       
       <meta property="og:type" content="website"/>
       <meta property="og:url" content="<?php echo e(__('messages.site_name')); ?>"/>
       <meta property="og:title" content="<?php echo e(__('messages.site_name')); ?>"/>
       <meta property="og:image" content="<?php echo e(asset('favicon.png')); ?>"/>
       <meta property="og:image:width" content="250px"/>
       <meta property="og:image:height" content="250px"/>
       <meta property="og:site_name" content="<?php echo e(__('messages.site_name')); ?>"/>
       <meta property="og:description" content="<?php echo e(__('messages.metadescweb')); ?>"/>
       <meta property="og:keyword" content="<?php echo e(__('messages.metakeyboard')); ?>"/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="/favicon.png">
      <link rel="stylesheet" href="/admin_panel/vendors/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="/admin_panel/vendors/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="/admin_panel/vendors/themify-icons/css/themify-icons.css">
      <link rel="stylesheet" href="/admin_panel/vendors/flag-icon-css/css/flag-icon.min.css">
      <link rel="stylesheet" href="/admin_panel/vendors/selectFX/css/cs-skin-elastic.css">
       <?php if(__('messages.rtl')=='0'): ?>
          <link rel="stylesheet" href="/admin_panel/assets/css/style.css">
         <?php else: ?>
          <link rel="stylesheet" href="/admin_panel/assets/css/style.css">
           <link rel="stylesheet" href="admin_panel/assets/css/rtl.css?v=159623">
         <?php endif; ?>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="/css/code.css">
   </head>
   <body class="bg-dark">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-logo">
                  <h4 class="loginh4"><?php echo e(__('messages.site_name')); ?><font class="loginfontcolor"> <?php echo e(__('messages.admin')); ?></font></h4>
               </div>
               <div class="login-form">
                  <div id="respond" class="comment-respond">
                     <?php if(Session::has('message')): ?>
                     <div class="col-sm-12">
                        <div class="alert  <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible fade show" role="alert"><?php echo e(Session::get('message')); ?>

                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                     </div>
                     <?php endif; ?>
                  </div>
                  <form action="/postlogin" method="post">
                     <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                     <div class="form-group">
                        <label><?php echo e(__('messages.email')); ?></label>
                        <input type="email" class="form-control" placeholder="<?php echo e(__('messages.email')); ?>" required name="email" id="email">
                     </div>
                     <div class="form-group">
                        <label><?php echo e(__('messages.password')); ?></label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="<?php echo e(__('messages.password')); ?>">
                     </div>
                     <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30"><?php echo e(__('messages.login')); ?></button>
                     <a href="/deliveryboy" class="btn btn-success btn-flat m-b-30 m-t-30 adminbtn"><?php echo e(__('messages.sing_delivery')); ?></a></p>
                     
                  </form>
               </div>
            </div>
         </div>
      </div>
      
      <script src="/admin_panel/vendors/jquery/dist/jquery.min.js"></script>
      <script src="/admin_panel/vendors/popper.js/dist/umd/popper.min.js"></script>
      <script src="/admin_panel/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="/admin_panel/assets/js/main.js"></script>
      <script type="text/javascript" src="/js/admin.js"></script>
   </body>
</html><?php /**PATH C:\lara\www\kingburger\resources\views/admin/login.blade.php ENDPATH**/ ?>