<?php
function readMoreHelper($story_desc, $chars = 75)
{
   $story_desc = substr($story_desc, 0, $chars);
   $story_desc = substr($story_desc, 0, strrpos($story_desc, ' '));
   $story_desc = $story_desc . "...";
   return $story_desc;
}
function headreadMoreHelper($story_desc, $chars = 75)
{
   $story_desc = substr($story_desc, 0, $chars);
   $story_desc = substr($story_desc, 0, strrpos($story_desc, ' '));
   $story_desc = $story_desc;
   return $story_desc;
}
?>
<!DOCTYPE html>
<html>

<head>

   <title><?php echo e(__('messages.site_name')); ?></title>

   <meta charset="UTF-8">
   <meta property="og:url" content="<?php echo e(__('messages.site_name')); ?>" />
   <meta property="og:title" content="<?php echo e(__('messages.site_name')); ?>" />
   <meta property="og:image" content="<?php echo e(asset('favicon.png')); ?>" />
   <meta property="og:image:width" content="250px" />
   <meta property="og:image:height" content="250px" />
   <meta property="og:site_name" content="<?php echo e(__('messages.site_name')); ?>" />
   <meta property="og:description" content="<?php echo e(__('messages.metadescweb')); ?>" />
   <meta property="og:keyword" content="<?php echo e(__('messages.metakeyboard')); ?>" />
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="shortcut icon" href="<?php echo e(asset('favicon.png')); ?>">
   <?php if(__('messages.rtl')=='0'): ?>

   <link rel="stylesheet" type="text/css" href="<?php echo e(asset('burger/css/style.css')); ?>">
   <?php else: ?>
   <link rel="stylesheet" type="text/css" href="<?php echo e(asset('burger/css/rtl.css')); ?>">
   <?php endif; ?>
   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.css'>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script type="text/javascript" src="<?php echo e(asset('burger/js/bootstrap.min.js')); ?>"></script>
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo e(asset('burger/css/app.css')); ?>" />
   <link rel="stylesheet" href="<?php echo e(asset('burger/css/font.css')); ?>">



   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <link rel="stylesheet" type="text/css" href="<?php echo e(asset('burger/css/bootstrap.min.css')); ?>">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <script type="text/javascript" src="<?php echo e(asset('burger/js/dropdown.js')); ?>"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
   <script type="text/javascript" src=""></script>
   <script type="text/javascript" src="<?php echo e(asset('burger/js/jquery.mixitup.min.js')); ?>"></script>
   <script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyC1JUHjsnQZtKx5eBOpG42E_CLoJ1s39AU&sensor=false&libraries=places'></script>
   <script src="<?php echo e(url('js/locationpicker.js')); ?>"></script>

   <script>
      // $('.carousel').carousel()

      var current = 1;

      setInterval(() => {
         if(current == 1){
            $(".first-section .img").removeClass("one")
            $(".first-section .img").addClass("two")
            $(".first-section .img").fadeOut(100)
            $(".first-section .img").fadeIn(500)
            current = 2;
         }else if(current == 2){
            $(".first-section .img").removeClass("two")
            $(".first-section .img").addClass("three")
            $(".first-section .img").fadeOut(100)
            $(".first-section .img").fadeIn(500)
            current = 3;
         }else {
            $(".first-section .img").removeClass("three")
            $(".first-section .img").addClass("one")
            $(".first-section .img").fadeOut(100)
            $(".first-section .img").fadeIn(500)
            current = 1;
         }
      }, 5000);
   </script>
   <style>
      .my-carousel {
         height : 100vh;
      }
   </style>
</head>

<body>
   <?php echo $__env->make('cookieConsent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php echo $__env->make('user.cssclass', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php echo $__env->make('user.chat_icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <div class="login-re-modal">
      <div class="modal" id="myModal1">
         <div class="modal-dialog">
            <div class="modal-content">
               <div id="overlaychk">
                  <div class="cv-spinner">
                     <span class="spinner"></span>
                  </div>
               </div>
               <div class="modal-header">
                  <div class="login-modal-head">
                     <button type="button" class="close" data-dismiss="modal">
                        &times;
                     </button>
                  </div>
               </div>
               <div class="modal-body">

                  <div id="forgotbody" class="forgotbody">
                     <span class="for_success_msg" id="for_success_msg">
                        <?php echo e(__('messages.forgot_email_success')); ?>

                     </span>
                     <span class="for_error_msg" id="for_error_msg">
                        <?php echo e(__('messages.forgot_error')); ?>

                     </span>
                     <form>
                        <label class="for_label">
                           <?php echo e(__('messages.forgot_text')); ?>

                           <span class="requiredfield">*</span>
                        </label>
                        <input type="text" required name="phone_for" id="modal-text" placeholder="<?php echo e(__('messages.forgot_placeholder')); ?>" class="reuiredtextfields" />
                     </form>
                     <div class="for_btn_div">
                        <div class="modal-login-button for_btn_div_model">
                           <button type="button" onclick="forgotaccount()" class="for_button">
                              <h6 class="for_button_value">
                                 <?php echo e(__('messages.forgot_pwd')); ?>

                              </h6>
                           </button>
                        </div>
                     </div>
                     <div class="modal-forgot">
                        <a href="javascript:loginmodel()">
                           <?php echo e(__('messages.login')); ?>

                        </a>
                     </div>
                  </div>
                  <div class="login-modal" id="loginmodel">
                     <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                           <a href="#tab1" class="nav-link active" data-toggle="tab">
                              <?php echo e(__('messages.login')); ?>

                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="#tab2" class="nav-link" data-toggle="tab">
                              <?php echo e(__('messages.register')); ?>

                           </a>
                        </li>
                     </ul>
                     <div class="tab-content">
                        <div id="tab1" class="tab-pane show active">
                           <span id="login_error_msg" class="for_error_msg">
                              <?php echo e(__('messages.login_error')); ?>

                           </span>
                           <label class="for_button_value">
                              <?php echo e(__('messages.phone_no')); ?>

                              <span class="requiredfield">*</span>
                           </label>
                           <input type="text" required name="phone" id="modal-text" placeholder="<?php echo e(__('messages.phone_no')); ?>" value="<?php echo e(isset($_COOKIE['phone'])?$_COOKIE['phone']:''); ?>">
                           <label class="for_button_value">
                              <?php echo e(__('messages.password')); ?>

                              <span class="requiredfield">*</span>
                           </label>
                           <input type="password" required name="password" id="modal-text" placeholder="<?php echo e(__('messages.password')); ?>" value="<?php echo e(isset($_COOKIE['password'])?$_COOKIE['password']:''); ?>">
                           <div class="modal-re">
                              <input type="checkbox" name="rem_me" value="1" <?php echo isset($_COOKIE['rem_me']) ? "checked" : '' ?>>
                              <p><?php echo e(__('messages.rem_me')); ?></p>
                           </div>
                           <span class="modal-forgot">
                              <a href="javascript:forgotmodel()"><?php echo e(__('messages.forgot_u')); ?></a>
                           </span>
                           <div class="modal-login-button ">
                              <button type="button" onclick="loginaccount()" class="for_button">
                                 <h6 class="for_button_value"><?php echo e(__('messages.login')); ?></h6>
                              </button>
                           </div>
                        </div>
                        <div id="tab2" class="tab-pane ">
                           <span class="for_success_msg" id="reg_success_msg">
                              <?php echo e(__('messages.register_suceess')); ?>

                           </span>
                           <span class="for_error_msg" id="reg_error_msg">
                              <?php echo e(__('messages.reg_error')); ?>

                           </span>
                           <form action="<?php echo e(url('userregister')); ?>" method="post">
                              <?php echo e(csrf_field()); ?>

                              <label class="for_button_value">
                                 <?php echo e(__('messages.name')); ?>

                                 <span class="requiredfield">*</span>
                              </label>
                              <input type="text" required name="name" id="modal-text" placeholder="<?php echo e(__('messages.name')); ?>">
                              <label class="for_button_value">
                                 <?php echo e(__('messages.email')); ?>

                                 <span class="requiredfield">*</span>
                              </label>
                              <input type="text" required name="email" id="modal-text" placeholder="<?php echo e(__('messages.email')); ?>">
                              <label class="for_button_value">
                                 <?php echo e(__('messages.phone_no')); ?>

                                 <span class="requiredfield">*</span>
                              </label>
                              <input type="text" required name="phone_reg" id="modal-text" placeholder="<?php echo e(__('messages.phone_no')); ?>">
                              <label class="for_button_value">
                                 <?php echo e(__('messages.password')); ?>

                                 <span class="requiredfield">*</span>
                              </label>
                              <input type="password" required name="password_reg" id="modal-text" placeholder="<?php echo e(__('messages.password')); ?>">
                              <label class="for_button_value">
                                 <?php echo e(__('messages.confirm_pwd')); ?>

                                 <span sclass="requiredfield">*</span>
                              </label>
                              <input type="password" required name="con_password_reg" id="modal-text" placeholder="<?php echo e(__('messages.confirm_pwd')); ?>" onchange="checkboth(this.value)">
                              <div class="modal-rg-content">
                                 <p><?php echo e(__('messages.reg_fixed')); ?></p>
                              </div>
                              <div class="modal-login-button">
                                 <button type="button" onclick="registeruser()" class="for_button">
                                    <h6><?php echo e(__('messages.register')); ?></h6>
                                 </button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="modal model1my" id="myModal">
      <div class="modal-dialog modal-1">
         <?php $cartCollection = Cart::getContent();
         if ($cartCollection->count() == 0) { ?>
            <div class="empty-box">
               <div class="modal-header cart-h">
                  <button type="button" class="close" data-dismiss="modal">
                     <img src='<?php echo e(asset("burger/images/close.png")); ?>'>
                  </button>
               </div>
               <div class="container">
                  <div class="cart-modal-empty col-md-8">
                     <img src='<?php echo e(asset("burger/images/empty-cart.png")); ?>'>
                     <h1><?php echo e(__('messages.nocart')); ?></h1>
                  </div>
               </div>
            </div>
         <?php } else { ?>
            <div class="modal-content">
               <div class="modal-header cart-h">
                  <button type="button" class="close" data-dismiss="modal">
                     <img src="<?php echo e(asset('burger/images/close.png')); ?>">
                  </button>
               </div>
               <div class="container">
                  <div class="cart-modal col-md-8">
                     <div class="modal-body main-modal ">
                        <?php $cartCollection = Cart::getContent();
                        $i = 0; ?>
                        <?php $__currentLoopData = $cartCollection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="portfolio por-1 col-md-12 row">
                           <div class="por-img">
                              <div class="b-img">
                                 <?php $__currentLoopData = $allmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($item->name==$ai->menu_name): ?>
                                 <img src="<?php echo e(asset('upload/images/menu_item_icon/'.$ai->menu_image)); ?>" class="cartth">
                                 <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                           </div>
                           <div class="b-text">
                              <div class="box-spa">
                                 <h1><?php echo e($item->name); ?></h1>
                                 <h2>
                                    <?php $__currentLoopData = $item->attributes[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartinter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $ingredient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $me): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cartinter==$me->id): ?>
                                    <span><?php echo e($me->item_name); ?>,</span>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </h2>
                                 <p><?php echo e($item->quantity); ?>

                                    <img src="<?php echo e(asset('burger/images/cross.png')); ?>">
                                    <?php echo e(Session::get("usercurrency").number_format($item->price, 2, '.', '')); ?>

                                 </p>
                              </div>
                              <span class="price">
                                 <?php $totalamount = (float)$item->quantity * (float)$item->price; ?>
                                 <a href="<?php echo e(url('deletecartitem/'.$item->id)); ?>">
                                    <i class="fa fa-trash-o" aria-hidden="true">
                                    </i>
                                 </a>
                                 <h1>
                                    <?php echo e(Session::get("usercurrency")); ?><?php echo e(number_format($totalamount, 2, '.', '')); ?>

                                 </h1>
                              </span>
                           </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                     <div class="total">
                        <h1><?php echo e(__('messages.subtotal')); ?> :</h1>
                        <span>
                           <?php echo e(Session::get("usercurrency").number_format(Cart::getTotal(), 2, '.', '')); ?>

                        </span>
                     </div>
                     <?php if (Session::get("orderstatus") == 1) { ?>
                        <div class="viewcart">
                           <h1>
                              <a href="<?php echo e(url('cartdetails')); ?>" class="viewcarta">
                                 <?php echo e(__('messages.view_cart')); ?>

                              </a>
                           </h1>
                        </div>
                     <?php } ?>
                     <?php if (Session::get("orderstatus") == 0) { ?>
                        <div class="last-box">
                           <div class="Delivery">
                              <img src="<?php echo e(asset('burger/images/delivery.png')); ?>" style="width:50px">
                           </div>
                           <div class="last-text">
                              <h1><?php echo e(__('messages.offline_order')); ?></h1>
                              <p><?php echo e(__('messages.off_time')); ?></p>
                           </div>
                        </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
         <?php } ?>
      </div>
   </div>
   <div class="first-section">
      <div class="one img">
      </div>
      <div class="container kb-nav">
         <div class="row">
            <div class="kb-nav-logo">
               <a href="<?php echo e(url('/')); ?>">
                  <img src="<?php echo e(Session::get('logo')); ?>" class="img-fluid">
               </a>
            </div>
            <div class="kb-menu">
               <ul class="p-0">
                  <li>
                     <a href="<?php echo e(url('/')); ?>" class="for_button_value">
                        <?php echo e(__('messages.home')); ?>

                     </a>
                  </li>
                  <li>
                     <a href="<?php echo e(url('aboutus')); ?>" class="for_button_value">
                        <?php echo e(__('messages.aboutus')); ?>

                     </a>
                  </li>
                  <li>
                     <a href="<?php echo e(url('service')); ?>" class="for_button_value">
                        <?php echo e(__('messages.service')); ?>

                     </a>
                  </li>
                  <li>
                     <a href="<?php echo e(url('contactus')); ?>" class="for_button_value">
                        <?php echo e(__('messages.contact')); ?>

                     </a>
                  </li>
               </ul>
            </div>
            <div class="kd-social">
               <div class="login">
                  <?php if (empty(Session::get('login_user'))) { ?>
                     <a href="#" data-toggle="modal" data-target="#myModal1">
                        <i class="fa fa-user" aria-hidden="true"></i>
                     </a>
                  <?php } else { ?>
                     <a href="<?php echo e(url('myaccount')); ?>">
                        <i class="fa fa-user" aria-hidden="true"></i>
                     </a>
                  <?php } ?>
                  <a href="#" data-toggle="modal" data-target="#myModal">
                     <i class="fa fa-shopping-cart" aria-hidden="true">
                        <span id="totalcart">
                           <?php $cartCollection = Cart::getContent();
                           $carttotal = 0;
                           if ($cartCollection->count() != 0) {
                              $carttotal = $cartCollection->count();
                              echo '<div class="cric">' . $cartCollection->count() . '</div>';
                           }
                           ?>
                        </span>
                        <input type="hidden" id="carttotal" value="<?php echo e($carttotal); ?>">
                     </i></a>
               </div>
               <a href="<?php echo e(Session::get('facebook')); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
               <a href="<?php echo e(Session::get('twitter')); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
               <a href="<?php echo e(Session::get('whatsapp')); ?>" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
            </div>
            <div class="tm">
               <div id="toggle" onclick="changetab()">
                  <div class="one"></div>
                  <div class="two"></div>
                  <div class="three"></div>
               </div>
            </div>
            <div class="col-12">
               <div id="menu">
                  <ul class="p-0">
                     <li><a href="<?php echo e(url('/')); ?>"><?php echo e(__('messages.home')); ?></a></li>
                     <li><a href="<?php echo e(url('aboutus')); ?>"><?php echo e(__('messages.aboutus')); ?></a></li>
                     <li><a href="<?php echo e(url('service')); ?>"><?php echo e(__('messages.service')); ?></a></li>
                     <li><a href="<?php echo e(url('contactus')); ?>"><?php echo e(__('messages.contact')); ?></a></li>
                  </ul>
               </div>
            </div>
            <div class="kb-text-box">
               <h1><?php echo e(__('messages.silder1h')); ?></h1>
               <h2><?php echo e(__('messages.silderh2')); ?></h2>
               <p><?php echo e(__('messages.silderp')); ?>.</p>
            </div>

         </div>
      </div>
   </div>
   <!-- coming here -->
   <div class="secound-section d-none">
      <div class="container">
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-6 about-img">
                  <img src="<?php echo e(Session::get('second_sec_img')); ?>" class="img-fluid">
               </div>
               <div class="col-md-6 about-text">
                  <img src="<?php echo e(Session::get('secong_icon_img')); ?>" class="img-fluid">
                  <h5><?php echo e(__('messages.silder23')); ?>

                  </h5>
                  <p>
                     <?php echo e(__('messages.psilder23')); ?>

                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="heading">

      <h1>

         <?php echo e(__('messages.menu_title')); ?>

      </h1>

   </div>


   <div class="main-pizza-sb">
      <div class="container">
         <div class="carousel">
            <?php $i = 0; ?>
            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($i==0): ?>
            <div class="box King_script_active" id="box<?php echo e($i); ?>" onclick="changecategory('<?php echo e($ca->id); ?>','<?php echo e($i); ?>')">
               <?php else: ?>
               <div class="box" id="box<?php echo e($i); ?>" onclick="changecategory('<?php echo e($ca->id); ?>','<?php echo e($i); ?>')">
                  <?php endif; ?>
                  <button class="pizza-category-menu">
                     <?php $img = asset('upload/images/menu_cat_icon/') . '/' . $ca->cat_icon; ?>
                     <div class="pizza-content-box">
                        <div class="pizza-content-imgb">
                           <img src="<?php echo e(asset($img)); ?>" alt="img">
                        </div>
                        <div class="pizza-content-textb">
                           <h3><?php echo e($ca->cat_name); ?></h3>
                        </div>
                     </div>
                  </button>
               </div>
               <?php $i++; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
         </div>
      </div>
      <input type="hidden" id="totalcategory" value="<?php echo e($i); ?>">
   </div>
   <div class="container">
      <div class="portfolist_sb_b" id="portfoliolist">
         <div class="row">
            <?php $i = 0; ?>
            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($i==0): ?>
            <div id="category<?php echo e($i); ?>" class="mtcat">
               <?php else: ?>
               <div id="category<?php echo e($i); ?>" style="display: none" class="mtcat">
                  <?php endif; ?>
                  <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($it->category==$ca->id): ?>
                  <div class="portfolio <?php echo e($it->categoryitem->id); ?> col-md-6 burger w3-container  w3-animate-zoom portfoliocat" data-cat="<?php echo e($it->categoryitem->id); ?>" data-bound>
                     <div class="items">
                        <div class="b-img">
                           <a href="<?php echo e(url('detailitem/'.$it->id)); ?>"><img src="<?php echo e(asset('upload/images/menu_item_icon/'.$it->menu_image)); ?>"></a>
                        </div>
                        <div class="bor">
                           <div class="b-text">
                              <h1><a href="<?php echo e(url('detailitem/'.$it->id)); ?>"><?php echo e($it->menu_name); ?></a></h1>
                              <p>
                                 <?php echo e(substr($it->description,0,75)); ?>

                              </p>
                           </div>
                           <div class="price">
                              <h1><?php echo e(Session::get("usercurrency")); ?> <?php echo e($it->price); ?></h1>
                              <div class="cart">
                                 <a href="<?php echo e(url('detailitem/'.$it->id)); ?>"><?php echo e(__('messages.addcart')); ?></a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php $i++; ?>
               </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
         </div>
      </div>
      <div class="play d-none">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="play-logo">
                     <img src="<?php echo e(Session::get('logo')); ?>">
                  </div>
                  <div class="play-b">
                     <img src="<?php echo e(Session::get('footer_up_img')); ?>">
                  </div>
               </div>
               <div class="col-md-6 text-box">
                  <div class="head">
                     <h1><?php echo e(__('messages.bannerh')); ?></h1>
                     <p><?php echo e(__('messages.bannerp')); ?></p>
                  </div>
                  <h2><?php echo e(__('messages.bennerh2')); ?></h2>
                  <ul>
                     <li>
                        <span>
                           <div class="crl"></div>
                        </span>
                        <?php echo e(__('messages.b1')); ?>

                     </li>
                     <li>
                        <span>
                           <div class="crl"></div>
                        </span>
                        <?php echo e(__('messages.b2')); ?>

                     </li>
                     <li>
                        <span>
                           <div class="crl"></div>
                        </span>
                        <?php echo e(__('messages.b3')); ?>

                     </li>
                     <li>
                        <span>
                           <div class="crl"></div>
                        </span>
                        <?php echo e(__('messages.b4')); ?>

                     </li>
                  </ul>
                  <div class="row">
                     <?php if($setting->have_playstore=='1'): ?>
                     <div class="col-md-5 col-sm-5 col-5 google">
                        <a href="<?php echo e(Session::get('playstore')); ?>" target="_blank"><img src="<?php echo e(asset('burger/images/Google-Play-icon.png')); ?>" class="img-fluid"></a>
                     </div>
                     <?php endif; ?>
                     <?php if($setting->have_appstore=='1'): ?>
                     <div class="col-md-5 col-sm-5 col-5 apple">
                        <a href="<?php echo e(Session::get('appstore')); ?>" target="_blank"><img src="<?php echo e(asset('burger/images/App-Store-icon.png')); ?>" class="img-fluid"></a>
                     </div>
                     <?php endif; ?>
                  </div>

               </div>
            </div>
         </div>
      </div>
      <div class="footer-section">
         <div class="footer">
            <div class="container kb-footer">
               <div class="row">
                  <div class="col-md-3 about">
                     <img src="<?php echo e(Session::get('logo')); ?>">
                     <p><?php echo e(__('messages.footer_text')); ?></p>
                     <div class="footer-social">
                        <a href="<?php echo e(Session::get('facebook')); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="<?php echo e(Session::get('twitter')); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="<?php echo e(Session::get('linkedin')); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="<?php echo e(Session::get('google_plus_id')); ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        <a href="<?php echo e(Session::get('whatsapp')); ?>" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                     </div>
                  </div>
                  <div class="col-md-3 info">
                     <div class="fo-text">
                        <h1><?php echo e(__('messages.information')); ?></h1>
                     </div>
                     <ul class="textdata">
                        <li><a href="<?php echo e(url('/')); ?>"><?php echo e(__('messages.home')); ?></a></li>
                        <li><a href="<?php echo e(url('aboutus')); ?>"><?php echo e(__('messages.aboutus')); ?></a></li>
                        <li><a href="<?php echo e(url('service')); ?>"><?php echo e(__('messages.service')); ?></a></li>
                        <li><a href="<?php echo e(url('contactus')); ?>"><?php echo e(__('messages.contact')); ?></a></li>
                     </ul>
                  </div>
                  <div class="col-md-3 info">
                     <div class="fo-text">
                        <h1><?php echo e(__('messages.myaccount')); ?></h1>
                     </div>
                     <ul class="textdata">
                        <?php if(empty(Session::get('login_user'))): ?>
                        <li><a href="#" data-toggle="modal" data-target="#myModal1"><?php echo e(__('messages.myorder')); ?></a></li>
                        <?php endif; ?>
                        <?php if(!empty(Session::get('login_user'))): ?>
                        <li><a href="<?php echo e(url('myaccount')); ?>"><?php echo e(__('messages.myorder')); ?></a></li>
                        <?php endif; ?>
                        <?php $cartCollection = Cart::getContent(); ?>
                        <?php if(count($cartCollection)!=0): ?>
                        <li><a href="<?php echo e(url('cartdetails')); ?>"><?php echo e(__('messages.checkout')); ?></a></li>
                        <?php endif; ?>
                        <?php if(count($cartCollection)==0): ?>
                        <li><a href="#" data-toggle="modal" data-target="#myModal"><?php echo e(__('messages.checkout')); ?></a></li>
                        <?php endif; ?>
                        <li><a href="#" data-toggle="modal" data-target="#myModal"><?php echo e(__('messages.cart')); ?></a></li>
                        <li><a href="<?php echo e(url('termofuse')); ?>"><?php echo e(__('messages.terms')); ?></a></li>
                     </ul>
                  </div>
                  <div class="col-md-3 info">
                     <div class="fo-text">
                        <h1><?php echo e(__('messages.contact_us')); ?></h1>
                     </div>
                     <div class="f-location">
                        <img src="<?php echo e(asset('burger/images/location.png')); ?>">
                     </div>
                     <span>
                        <?php echo e(Session::get('address')); ?>

                     </span>
                     <div class="f-location">
                        <img src="<?php echo e(asset('burger/images/phone.png')); ?>">
                     </div>
                     <span>
                        <?php echo e(Session::get('phone')); ?>

                     </span>
                     <div class="f-location">
                        <img src="<?php echo e(asset('burger/images/email.png')); ?>">
                     </div>
                     <span>
                        <?php echo e(Session::get('email')); ?>

                     </span>
                  </div>
               </div>
            </div>
            <div class="right">
               <div class="container">
                  <div class="row">
                     <div class="col-md-6">
                        <h1><?php echo e(__('messages.copyright')); ?> © <?php echo e(Session::get('current_year')); ?> <?php echo e(__('messages.site_name')); ?>. <?php echo e(__('messages.f1')); ?>.</h1>
                     </div>
                     <div class="col-md-6 v-box">
                        <div class="v-img">
                           <a href="#"><img src="<?php echo e(asset('burger/images/v-1.png')); ?>"></a>
                        </div>
                        <div class="v-img">
                           <a href="#"><img src="<?php echo e(asset('burger/images/v-2.png')); ?>"></a>
                        </div>
                        <div class="v-img">
                           <a href="#"><img src="<?php echo e(asset('burger/images/v-3.png')); ?>"></a>
                        </div>
                        <div class="v-img">
                           <a href="#"><img src="<?php echo e(asset('burger/images/v-4.png')); ?>"></a>
                        </div>
                        <div class="v-img">
                           <a href="#"><img src="<?php echo e(asset('burger/images/v-5.png')); ?>"></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="img-aa"></div>
</body>
<div class="modal modal-2" id="myModal2">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header logout">
            <h4 class="modal-title"><?php echo e(__('messages.register')); ?></h4>
            <p><?php echo e(Session::get('user_phone')); ?></p>
            <h1><?php echo e(__('messages.logout_msg')); ?></h1>
            <div class="logout-but">
               <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(__('messages.cancel')); ?></button>
               <button type="button" class="btn-1" data-dismiss="modal" onclick="logout()"><i class="fa fa-sign-out" aria-hidden="true"></i><?php echo e(__('messages.logout')); ?>

               </button>
            </div>
         </div>
      </div>
   </div>
</div>
<input type="hidden" id="is_rtl" value="<?php echo e(__('messages.rtl')); ?>" />
<input type="hidden" id="currency" value='<?php echo e(Session::get("usercurrency")); ?>' />
<input type="hidden" id="addcart" value='<?php echo e(__("messages.addcart")); ?>' />
<input type="hidden" id="path_site" value="<?php echo e(url('/')); ?>" />
<input type="hidden" id="forgot_error" value="<?php echo e(__('messages.forgot_error')); ?>" />
<input type="hidden" id="reg_error" value="<?php echo e(__('messages.reg_error')); ?>" />
<input type="hidden" id="pwdmatch" value="<?php echo e(__('messages.pwdmatch')); ?>" />
<input type="hidden" id="login_error" value="<?php echo e(__('messages.login_error')); ?>" />
<input type="hidden" id="required_field" value="<?php echo e(__('messages.required_field')); ?>" />
<input type="hidden" id="login_error" value="<?php echo e(__('messages.login_error')); ?>" />
<input type="hidden" id="forgot_error_2" value="<?php echo e(__('messages.forgot_error_2')); ?>">

<script type="text/javascript" src="<?php echo e(URL::to('js/code.js').'?version=965326'); ?>"></script>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script type="text/javascript" src="<?php echo e(URL::to('demo/button.js')); ?>"></script>
<script src="<?php echo e(URL::to('demo/script.js')); ?>"></script>
<script type="text/javascript">
   function changecategory(cat_id, id) {
      var total = $("#totalcategory").val();
      console.log(id);
      for (var i = 0; i < total; i++) {
         document.getElementById("category" + i).style.display = "none";
         $("#box" + i).removeClass('King_script_active');
      }
      document.getElementById("category" + id).style.display = "block";
      $("#box" + id).addClass('King_script_active');
   }
</script>

</html><?php /**PATH C:\lara\www\kingburger\resources\views/user/index.blade.php ENDPATH**/ ?>