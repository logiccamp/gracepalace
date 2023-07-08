<!DOCTYPE html>
<html>
   <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      
      <title><?php echo e(__('messages.site_name')); ?></title>
     <meta property="og:url" content="<?php echo e(__('messages.site_name')); ?>"/>
       <meta property="og:title" content="<?php echo e(__('messages.site_name')); ?>"/>
       <meta property="og:image" content="<?php echo e(asset('favicon.png')); ?>"/>
       <meta property="og:image:width" content="250px"/>
       <meta property="og:image:height" content="250px"/>
       <meta property="og:site_name" content="<?php echo e(__('messages.site_name')); ?>"/>
       <meta property="og:description" content="<?php echo e(__('messages.metadescweb')); ?>"/>
       <meta property="og:keyword" content="<?php echo e(__('messages.metakeyboard')); ?>"/>
    <link rel="shortcut icon" href="<?php echo e(asset('favicon.png')); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
         <?php if(__('messages.rtl')=='0'): ?>
         <link rel="stylesheet" type="text/css" href="<?php echo e(asset('burger/css/style.css').'?version=232132'); ?>">
         <?php else: ?>
           <link rel="stylesheet" type="text/css" href="<?php echo e(asset('burger/css/rtl.css').'?version=56565'); ?>">
         <?php endif; ?>
      <link rel="stylesheet" type="text/css" href="<?php echo e(asset('burger/css/bootstrap.min.css')); ?>">
      <link rel="stylesheet" type="text/css" href="<?php echo e(asset('burger/css/app.css')); ?>"/>
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?php echo e(asset('burger/css/font.css')); ?>">


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.css'>


      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo e(asset('burger/js/dropdown.js')); ?>"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
      <script type="text/javascript" src="<?php echo e(asset('burger/js/jquery.mixitup.min.js')); ?>"></script>
      <script type="text/javascript" src="<?php echo e(URL::to('js/code.js')); ?>"></script>
      <script type="text/javascript" src="<?php echo e(asset('burger/js/bootstrap.min.js')); ?>"></script>
     <script type="text/javascript" src='https://maps.google.com/maps/api/js?key=<?php echo e(Config::get("mapdetail.key")); ?>&sensor=false&libraries=places'></script>
<script src="<?php echo e(url('js/locationpicker.js')); ?>"></script>
   </head>
   <body>
        <?php echo $__env->make('user.cssclass', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <?php echo $__env->make('cookieConsent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <div id="overlaychk">
                        <div class="cv-spinner">
                           <span class="spinner"></span>
                        </div>
                     </div>
      <div class="login-re-modal">
      <div class="modal" id="myModal1">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <div class="login-modal-head">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
               </div>
               <div class="modal-body">
                  <div id="forgotbody">
                     <span id="for_success_msg"><?php echo e(__('messages.forgot_email_success')); ?></span>
                     <span id="for_error_msg"><?php echo e(__('messages.forgot_error')); ?></span>
                     <form class="for">
                        <label><?php echo e(__('messages.forgot_text')); ?><span>*</span></label>
                        <input type="text" required name="phone_for" id="modal-text" placeholder="<?php echo e(__('messages.forgot_placeholder')); ?>" >
                     </form>
                     <div class="for-1">
                        <div class="modal-login-button">
                           <button type="button" onclick="forgotaccount()">
                              <h6><?php echo e(__('messages.forgot_pwd')); ?></h6>
                           </button>
                        </div>
                     </div>
                     <div class="modal-forgot">
                        <a href="javascript:loginmodel()"><?php echo e(__('messages.login')); ?></a>
                     </div>
                  </div>
                  <div class="login-modal" id="loginmodel">
                     <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                           <a href="#tab1" id="logintab" class="nav-link active" data-toggle="tab"><?php echo e(__('messages.login')); ?></a>
                        </li>
                        <li class="nav-item">
                           <a href="#tab2" id="regtab" class="nav-link" data-toggle="tab"><?php echo e(__('messages.register')); ?></a>
                        </li>
                     </ul>
                     <div class="tab-content">
                        <div id="tab1" class="tab-pane show active">
                           <span id="login_error_msg"><?php echo e(__('messages.login_error')); ?></span>
                           <form>
                              <?php echo e(csrf_field()); ?>

                              <label><?php echo e(__('messages.phone_no')); ?> <span>*</span></label>
                              <input type="text" required name="phone" id="modal-text" placeholder="<?php echo e(__('messages.phone_no')); ?>" value="<?php echo e(isset($_COOKIE['phone'])?$_COOKIE['phone']:''); ?>">
                              <label><?php echo e(__('messages.password')); ?><span>*</span></label>
                              <input type="password" required name="password" id="modal-text" placeholder="<?php echo e(__('messages.password')); ?>" value="<?php echo e(isset($_COOKIE['password'])?$_COOKIE['password']:''); ?>">
                           </form>
                           <div class="modal-re">
                              <input type="checkbox" name="rem_me" value="1" <?php echo isset($_COOKIE[ 'rem_me'])? "checked": ''?>>
                              <p><?php echo e(__('messages.rem_me')); ?></p>
                           </div>
                           <span class="modal-forgot">
                           <a href="javascript:forgotmodel()" ><?php echo e(__('messages.forgot_u')); ?></a>
                           </span>
                           <div class="modal-login-button">
                              <button type="button" onclick="loginaccount()">
                                 <h6><?php echo e(__('messages.login')); ?></h6>
                              </button>
                           </div>
                        </div>
                        <div id="tab2" class="tab-pane">
                           <span id="reg_success_msg"><?php echo e(__('messages.register_suceess')); ?></span>
                           <span id="reg_error_msg"><?php echo e(__('messages.reg_error')); ?></span>
                           <form action="<?php echo e(url('userregister')); ?>" method="post">
                              <?php echo e(csrf_field()); ?>

                              <label><?php echo e(__('messages.name')); ?> <span>*</span></label>
                              <input type="text" required name="name" id="modal-text" placeholder="<?php echo e(__('messages.name')); ?>">
                              <label class="for_button_value">
                                 <?php echo e(__('messages.email')); ?>

                                 <span class="requiredfield">*</span>
                                 </label>
                                 <input type="text" required name="email" id="modal-text" placeholder="<?php echo e(__('messages.email')); ?>">
                              <label><?php echo e(__('messages.phone_no')); ?> <span>*</span></label>
                              <input type="text" required name="phone_reg" id="modal-text" placeholder="<?php echo e(__('messages.phone_no')); ?>">
                              <label><?php echo e(__('messages.password')); ?><span>*</span></label>
                              <input type="password" required name="password_reg" id="modal-text" placeholder="<?php echo e(__('messages.password')); ?>">
                              <label><?php echo e(__('messages.confirm_pwd')); ?><span>*</span></label>
                              <input type="password" required name="con_password_reg" id="modal-text" placeholder="<?php echo e(__('messages.confirm_pwd')); ?>" onchange="checkdata(this.value)">
                              <div class="modal-rg-content">
                                 <p><?php echo e(__('messages.reg_fixed')); ?></p>
                              </div>
                              <div class="modal-login-button">
                                 <button type="button" onclick="registeruser()">
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
      <div class="modal" id="myModal">
         <div class="modal-dialog modal-1">
            <?php $cartCollection = Cart::getContent(); 
               if($cartCollection->count()==0){
               
                     echo ' 
                     <div class="empty-box">
                     <div class="modal-header cart-h">
                      <button type="button" class="close" data-dismiss="modal">
                      <img src="'.asset("burger/images/close.png").'">
                      </button>
                      </div>
                      <div class="container">
                      <div class="cart-modal-empty col-md-8">
                      <img src="'.asset("burger/images/empty-cart.png").'">
                      <h1>'.__("messages.nocart").'</h1>
                        </div>
                         </div>
                         </div>';
                        }
               else{
                ?>
            <div class="modal-content">
               <div class="modal-header cart-h">
                  <button type="button" class="close" data-dismiss="modal">
                  <img src="<?php echo e(asset('burger/images/close.png')); ?>">
                  </button>
               </div>
               <div class="container">
                  <div class="cart-modal col-md-8">
                     <div class="modal-body main-modal ">
                        <?php $cartCollection = Cart::getContent();$i=0;?>
                        <?php $__currentLoopData = $cartCollection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="portfolio por-1 col-md-12 row">
                           <div class="por-img">
                              <div class="b-img">
                                 <?php $__currentLoopData = $allmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <?php if($item->name==$ai->menu_name): ?>
                                     <img src="<?php echo e(asset('upload/images/menu_item_icon/'.$ai->menu_image)); ?>" width="85px">
                                   <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                           </div>
                           <div class="b-text">
                              <div class="box-spa">
                                 <h1><?php echo e($item->name); ?></h1>
                                 <h2><?php $__currentLoopData = $item->attributes[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartinter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $menu_interdient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $me): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cartinter==$me->id): ?>
                                    <span><?php echo e($me->item_name); ?>,</span>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </h2>
                                 <p><?php echo e($item->quantity); ?> <img src="<?php echo e(asset('burger/images/cross.png')); ?>"> <?php echo e(Session::get("usercurrency").number_format($item->price, 2, '.', '')); ?>

                                 </p>
                              </div>
                              <span class="price">
                                 <?php $totalamount=(float)$item->quantity*(float)$item->price;?>
                                 <a href="<?php echo e(url('deletecartitem/'.$item->id)); ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                 <h1><?php echo e(Session::get("usercurrency")); ?><?php echo e(number_format($totalamount, 2, '.', '')); ?></h1>
                              </span>
                           </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                     <div class="total">
                        <h1><?php echo e(__("messages.subtotal")); ?>:</h1>
                        <?php $cartCollection = Cart::getContent();
                           $totalamountarr=array();
                           foreach ($cartCollection as $car) {
                              $totalamount="";
                              $totalamount=(float)$car->quantity*(float)$car->price;
                              $totalamountarr[]=round($totalamount,2);
                           
                           }
                           
                           ?>
                        <span><?php echo e(Session::get("usercurrency").number_format(Cart::getTotal(), 2, '.', '')); ?> </span>
                     </div>
                     <?php if(Session::get("orderstatus")==1){ ?>
                     <div class="viewcart">
                        <h1>
                           <a href="<?php echo e(url('cartdetails')); ?>" class="viewcarta">
                           <?php echo e(__('messages.view_cart')); ?>

                           </a>
                        </h1>
                     </div>
                     <?php }?>
                     <?php if(Session::get("orderstatus")==0){ ?>
                     <div class="last-box">
                        <div class="Delivery">
                           <img src="<?php echo e(asset('burger/images/delivery.png')); ?>" style="width:50px">
                        </div>
                        <div class="last-text">
                           <h1><?php echo e(__('messages.offline_order')); ?></h1>
                           <p><?php echo e(__('messages.off_time')); ?></p>
                        </div>
                     </div>
                     <?php }?>
                  </div>
               </div>
            </div>
            <?php }?>
         </div>
      </div>
      <div class="detail-backgroun1d-box" style="background : #000">
         <div class="container kb-nav detail-nav">
            <div class="first-section">
               <div class="row detail-navbar">
                  <div class="kb-nav-logo">
                     <a href="<?php echo e(url('/')); ?>">
                     <img src="<?php echo e(Session::get('logo')); ?>" class="img-fluid">
                     </a>
                  </div>
                  <div class="kb-menu">
                     <ul class="p-0">
                        <li><a href="<?php echo e(url('/')); ?>"><?php echo e(__('messages.home')); ?></a></li>
                        <li><a href="<?php echo e(url('aboutus')); ?>"><?php echo e(__('messages.aboutus')); ?></a></li>
                        <li><a href="<?php echo e(url('service')); ?>"><?php echo e(__('messages.service')); ?></a></li>
                        <li><a href="<?php echo e(url('contactus')); ?>"><?php echo e(__('messages.contact')); ?></a></li>
                     </ul>
                  </div>
                  <div class="kd-social">
                     <div class="login">
                        <?php if(empty(Session::get('login_user'))){?>
                        <a href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-user" aria-hidden="true"></i></a>
                        <?php }else{?>
                        <a href="<?php echo e(url('myaccount')); ?>" ><i class="fa fa-user" aria-hidden="true"></i></a>
                        <?php }?>
                        <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-shopping-cart" aria-hidden="true">
                        <span id="totalcart">
                        <?php $cartCollection = Cart::getContent();
                           $carttotal=0;
                            if($cartCollection->count()!=0)
                                {
                                    $carttotal=$cartCollection->count();
                                    echo '<div class="cric" style="border: 1px solid white;">'.$cartCollection->count().'</div>';
                                }
                           ?> 
                        </span>
                        <input type="hidden" id="carttotal" value="<?php echo e($carttotal); ?>">
                        </i></a>
                     </div>
                     <a href="<?php echo e(Session::get('facebook')); ?>"  target="_blank"> <i class="fa fa-facebook" aria-hidden="true"></i></a>
                     <a href="<?php echo e(Session::get('twitter')); ?>"  target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                     <a href="<?php echo e(Session::get('whatsapp')); ?>"  target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
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
               </div>
            </div>
         </div>
         <div class="main-pizza-sb-2" style="background-color : #000 !important">
            <div class="container">
               <div class="carousel">
                  <?php $i=0;?>
                  <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="box" id="box<?php echo e($i); ?>" onclick="changecategory('<?php echo e($ca->id); ?>','<?php echo e($i); ?>')">
                     <button class="pizza-category-menu">
                        <?php $img=asset('upload/images/menu_cat_icon/').'/'.$ca->cat_icon; ?>
                            <?php if(isset($itemdetails->category)&&$itemdetails->category==$ca->id): ?>
                               <div class="pizza-content-box slick-slide active" id="catdiv<?php echo e($i); ?>">
                           <?php else: ?>
                               <div class="pizza-content-box" id="catdiv<?php echo e($i); ?>">
                           <?php endif; ?>
                           <div class="pizza-content-imgb">
                              <img src="<?php echo e(asset($img)); ?>" alt="img">
                           </div>
                           <div class="pizza-content-textb">
                                 <?php if(isset($itemdetails->category)&&$itemdetails->category==$ca->id): ?>
                              <h3 id="cat1<?php echo e($i); ?>" class="slick-slide active"><?php echo e($ca->cat_name); ?></h3>
                           <?php else: ?>
                               <h3 id="cat1<?php echo e($i); ?>"><?php echo e($ca->cat_name); ?></h3>
                           <?php endif; ?>
                              
                           </div>
                        </div>
                     </button>
                  </div>
                  <?php $i++;?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  
               </div>
            </div>
         </div>
         <input type="hidden" id="totalcategory" value="<?php echo e($i); ?>">
      </div>
      <div class="container">
         <div class="portfolist_sb_b" id="category_div">
            
         </div>
      </div>
      <div id="main_content">
         <?php echo $__env->yieldContent('content'); ?>
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
                        <a href="<?php echo e(Session::get('twitter')); ?>"  target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="<?php echo e(Session::get('linkedin')); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="<?php echo e(Session::get('google_plus_id')); ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        <a href="<?php echo e(Session::get('whatsapp')); ?>" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                     </div>
                  </div>
                  <div class="col-md-3 info">
                     <div class="fo-text">
                        <h1><?php echo e(__('messages.information')); ?></h1>
                     </div>
                     <ul>
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
                     <ul>
                        <?php if(empty(Session::get('login_user'))): ?>
                        <li><a href="#" data-toggle="modal" data-target="#myModal1"><?php echo e(__('messages.myorder')); ?></a></li>
                        <?php endif; ?>
                        <?php if(!empty(Session::get('login_user'))): ?>
                        <li><a href="<?php echo e(url('myaccount')); ?>"><?php echo e(__('messages.myorder')); ?></a></li>
                        <?php endif; ?>
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
                           <a ><img src="<?php echo e(asset('burger/images/v-1.png')); ?>"></a>
                        </div>
                        <div class="v-img">
                           <a ><img src="<?php echo e(asset('burger/images/v-2.png')); ?>"></a>
                        </div>
                        <div class="v-img">
                           <a ><img src="<?php echo e(asset('burger/images/v-3.png')); ?>"></a>
                        </div>
                        <div class="v-img">
                           <a ><img src="<?php echo e(asset('burger/images/v-4.png')); ?>"></a>
                        </div>
                        <div class="v-img">
                           <a ><img src="<?php echo e(asset('burger/images/v-5.png')); ?>"></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <input type="hidden" id="currency" value='<?php echo e(Session::get("usercurrency")); ?>' />
      <input type="hidden" id="addcart" value='<?php echo e(__("messages.addcart")); ?>' />
      <input type="hidden" id="path_site" value="<?php echo e(url('/')); ?>" />
      <input type="hidden" id="forgot_error" value="<?php echo e(__('messages.forgot_error')); ?>"/>
      <input type="hidden" id="reg_error" value="<?php echo e(__('messages.reg_error')); ?>"/>
      <input type="hidden" id="pwdmatch" value="<?php echo e(__('messages.pwdmatch')); ?>" />
      <input type="hidden" id="login_error" value="<?php echo e(__('messages.login_error')); ?>" />
      <input type="hidden" id="required_field" value="<?php echo e(__('messages.required_field')); ?>" />
      <input type="hidden" id="login_error" value="<?php echo e(__('messages.login_error')); ?>" />
      <input type="hidden" id="forgot_error_2" value="<?php echo e(__('messages.forgot_error_2')); ?>">
      <input type="hidden" id="lat_env" value="<?php echo e(Config::get('mapdetail.lat')); ?>">
      <input type="hidden" id="long_env" value="<?php echo e(Config::get('mapdetail.long')); ?>">
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
    <input type="hidden" id="is_rtl" value="<?php echo e(__('messages.rtl')); ?>"/>
  <script type="text/javascript" src="<?php echo e(URL::to('js/code.js')); ?>?v=2132132"></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
   <script type="text/javascript" src="<?php echo e(URL::to('demo/button.js').'?version=1'); ?>"></script>
   <script src="<?php echo e(URL::to('demo/script.js').'?version=133'); ?>"></script>
  
</html><?php /**PATH C:\lara\www\kingburger\resources\views/user/subindex.blade.php ENDPATH**/ ?>