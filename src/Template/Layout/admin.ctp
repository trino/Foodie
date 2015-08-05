<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 3.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest (the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>Foodie - <?php if(isset($title))echo $title;else echo $this->request->params['action'];?></title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->  
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="<?php echo $this->request->webroot;?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo $this->request->webroot;?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="<?php echo $this->request->webroot;?>assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="<?php echo $this->request->webroot;?>assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="<?php echo $this->request->webroot;?>assets/global/plugins/slider-layer-slider/css/layerslider.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="<?php echo $this->request->webroot;?>assets/global/css/components.css" rel="stylesheet">
  <link href="<?php echo $this->request->webroot;?>assets/frontend/layout/css/style.css" rel="stylesheet">
  <link href="<?php echo $this->request->webroot;?>assets/frontend/pages/css/style-shop.css" rel="stylesheet" type="text/css">
  <link href="<?php echo $this->request->webroot;?>assets/frontend/pages/css/style-layer-slider.css" rel="stylesheet">
  <link href="<?php echo $this->request->webroot;?>assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
  <link href="<?php echo $this->request->webroot;?>assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="<?php echo $this->request->webroot;?>assets/frontend/layout/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
  
  <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="<?php echo $this->request->webroot;?>assets/global/plugins/respond.min.js"></script>  
    <![endif]-->
    <script src="<?php echo $this->request->webroot;?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->request->webroot;?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->request->webroot;?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="<?php echo $this->request->webroot;?>assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
     <script src="<?php echo $this->request->webroot;?>assets/frontend/layout/scripts/sample.js" type="text/javascript"></script>
    <script src="<?php echo $this->request->webroot;?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">
    
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=222640917866457";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
    <!-- BEGIN STYLE CUSTOMIZER -->
    <div class="color-panel hidden-sm">
      <div class="color-mode-icons icon-color"></div>
      <div class="color-mode-icons icon-color-close"></div>
      <div class="color-mode">
        <p>THEME COLOR</p>
        <ul class="inline">
          <li class="color-red current color-default" data-style="red"></li>
          <li class="color-blue" data-style="blue"></li>
          <li class="color-green" data-style="green"></li>
          <li class="color-orange" data-style="orange"></li>
          <li class="color-gray" data-style="gray"></li>
          <li class="color-turquoise" data-style="turquoise"></li>
        </ul>
      </div>
    </div>
    <!-- END BEGIN STYLE CUSTOMIZER --> 

    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <?php echo $this->element('mini_nav');?>
                <!-- END TOP BAR MENU -->
            </div>
            <div id="login-pop-up" style="display:none;">
               <div class="login-pop-up">
               
               <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="login-form">
               <h1>Login</h1>
               <form role="form" class="form-horizontal form-without-legend">
                            <div class="form-group">
                              <label class="col-lg-4 control-label" for="email">Email <span class="require">*</span></label>
                              <div class="col-lg-8">
                                <input type="text" id="email" class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-4 control-label" for="password">Password <span class="require">*</span></label>
                              <div class="col-lg-8">
                                <input type="text" id="password" class="form-control">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-8 col-md-offset-4 padding-left-0">
                                <a href="#forget-passsword" class="fancybox-fast-view">Forget Password?</a>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                                <button class="btn btn-primary" type="submit">Login</button>
                              </div>
                              </div>
                              <div class="col-md-6">
                              <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                                <a href="#registration-form" class="btn btn-primary fancybox-fast-view" type="button">Sign Up</a>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          </form>
               </div>
              
               </div>
        
              </div>
      </div>
      <div id="forget-passsword" style="display: none;">
          <h1>Forgot Your Password?</h1>
          <form role="form" class="form-horizontal form-without-legend">                    
            <div class="form-group col-md-12">
              <label class="col-lg-4 control-label" for="email">Email</label>
              <div class="col-lg-8">
                <input type="text" id="email" class="form-control">
              </div>
            </div>
           
              <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-5">
                <button class="btn btn-primary" type="submit">Send</button>
              </div>
          
          </form>
     </div>
        <div id="registration-form"class="col-md-12" style="display: none;">
            <form role="form" class="form-horizontal">
                    <fieldset>
                      <legend>Your personal details</legend>
                      <div class="form-group">
                        <label class="col-lg-4 control-label" for="firstname">First Name <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" id="firstname" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label" for="lastname">Last Name <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" id="lastname" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label" for="email">Email <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" id="email" class="form-control">
                        </div>
                      </div>
                    </fieldset>
                    <fieldset>
                      <legend>Your password</legend>
                      <div class="form-group">
                        <label class="col-lg-4 control-label" for="password">Password <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" id="password" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label" for="confirm-password">Confirm password <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" id="confirm-password" class="form-control">
                        </div>
                      </div>
                    </fieldset>
                    <fieldset>
                      <legend>Newsletter</legend>
                      <div class="checkbox form-group">
                        <label>
                          <div class="col-lg-4 col-sm-4">Singup for Newsletter</div>
                          <div class="col-lg-8 col-sm-8">
                            <div class="checker"><span><input type="checkbox"></span></div>
                          </div>
                        </label>
                      </div>
                    </fieldset>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                        <button class="btn btn-primary" type="submit">Create an account</button>
                        <button class="btn btn-default" type="button">Cancel</button>
                      </div>
                    </div>
                  </form>
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->

    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href="shop-index.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/layout/img/logos/logo-shop-red.png" alt="Metronic Shop UI"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
        
        <!-- BEGIN CART -->
        <div class="top-cart-block">
          <div class="top-cart-info">
            <a href="javascript:void(0);" class="top-cart-info-count">3 items</a>
            <a href="javascript:void(0);" class="top-cart-info-value">$1260</a>
          </div>
          <i class="fa fa-shopping-cart"></i>
                        
          <div class="top-cart-content-wrapper">
            <div class="top-cart-content">
              <ul class="scroller" style="height: 250px;">
                <li>
                  <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count">x 1</span>
                  <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
                  <em>$1230</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
                <li>
                  <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count">x 1</span>
                  <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
                  <em>$1230</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
                <li>
                  <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count">x 1</span>
                  <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
                  <em>$1230</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
                <li>
                  <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count">x 1</span>
                  <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
                  <em>$1230</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
                <li>
                  <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count">x 1</span>
                  <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
                  <em>$1230</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
                <li>
                  <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count">x 1</span>
                  <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
                  <em>$1230</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
                <li>
                  <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count">x 1</span>
                  <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
                  <em>$1230</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
                <li>
                  <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count">x 1</span>
                  <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
                  <em>$1230</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
              </ul>
              <div class="text-right">
                <a href="shop-shopping-cart.html" class="btn btn-default">View Cart</a>
                <a href="shop-checkout.html" class="btn btn-primary">Checkout</a>
              </div>
            </div>
          </div>            
        </div>
        <!--END CART -->

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
          <ul>
            
           <?php /* <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                Woman 
                
              </a>
                
              <!-- BEGIN DROPDOWN MENU -->
              <ul class="dropdown-menu">
                <li class="dropdown-submenu">
                  <a href="shop-product-list.html">Hi Tops <i class="fa fa-angle-right"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="shop-product-list.html">Second Level Link</a></li>
                    <li><a href="shop-product-list.html">Second Level Link</a></li>
                    <li class="dropdown-submenu">
                      <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                        Second Level Link 
                        <i class="fa fa-angle-right"></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="shop-product-list.html">Third Level Link</a></li>
                        <li><a href="shop-product-list.html">Third Level Link</a></li>
                        <li><a href="shop-product-list.html">Third Level Link</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="shop-product-list.html">Running Shoes</a></li>
                <li><a href="shop-product-list.html">Jackets and Coats</a></li>
              </ul>
              <!-- END DROPDOWN MENU -->
            </li><?php */?>
            
            <li><a href="<?php echo $this->request->webroot;?>">Home</a></li>
            <li class="dropdown dropdown-megamenu">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                Restaurants
                
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="header-navigation-content">
                    <div class="row">
                      <div class="col-md-4 header-navigation-col">
                        <h4><a href="<?php echo $this->request->webroot;?>cusine/american">American</a></h4>
                        <ul>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 1</a></li>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 1</a></li>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 1</a></li>
                          
                        </ul>
                        <h4><a href="<?php echo $this->request->webroot;?>cusine/asian">Asian</a></h4>
                        <ul>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 2</a></li>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 2</a></li>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 2</a></li>
                          
                        </ul>
                        <h4><a href="<?php echo $this->request->webroot;?>cusine/chinese">Chinese</a></h4>
                        <ul>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 3</a></li>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 3</a></li>
                          
                        </ul>
                      </div>
                      <div class="col-md-4 header-navigation-col">
                        
                        <h4><a href="<?php echo $this->request->webroot;?>cusine/german">German</a></h4>
                        <ul>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 4</a></li>
                          
                        </ul>
                        <h4><a href="<?php echo $this->request->webroot;?>cusine/halal">Halal</a></h4>
                        <ul>
                          <li><a href="<?php echo $this->request->webroot;?>/restaurants/restaurant-1">Restaurant 5</a></li>
                          
                        </ul>
                        <h4><a href="<?php echo $this->request->webroot;?>cusine/indain">Indian</a></h4>
                        <ul>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 6</a></li>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 6</a></li>
                          
                        </ul>
                        <h4><a href="<?php echo $this->request->webroot;?>cusine/italian">Italian</a></h4>
                        <ul>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 7</a></li>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 7</a></li>
                        </ul>
                      </div>
                      <div class="col-md-4 header-navigation-col">
                        

                        
                        <h4><a href="<?php echo $this->request->webroot;?>cusine/korean">Korean</a></h4>
                        <ul>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 8</a></li>
                        </ul>
                        <h4><a href="<?php echo $this->request->webroot;?>cusine/latin">Latin</a></h4>
                        <ul>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 9</a></li>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 9</a></li>
                        </ul>
                        <h4><a href="<?php echo $this->request->webroot;?>cusine/north-american">North American</a></h4>
                        <ul>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 10</a></li>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 10</a></li>
                        </ul>
                      </div>
                      <div class="col-md-12 nav-brands">
                        <ul>
                          <li><a href="#"><img title="esprit" alt="esprit" src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/brands/esprit.jpg"></a></li>
                          <li><a href="#"><img title="gap" alt="gap" src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/brands/gap.jpg"></a></li>
                          <li><a href="#"><img title="next" alt="next" src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/brands/next.jpg"></a></li>
                          <li><a href="#"><img title="puma" alt="puma" src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/brands/puma.jpg"></a></li>
                          <li><a href="#"><img title="zara" alt="zara" src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/brands/zara.jpg"></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            <li><a href="<?php echo $this->request->webroot;?>pages/about">About Us</a></li>
            <li><a href="<?php echo $this->request->webroot;?>pages/contact">Contact Us</a></li>
            <?php /*<li class="dropdown dropdown100 nav-catalogue">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                New
                
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="header-navigation-content">
                    <div class="row">
                      <div class="col-md-3 col-sm-4 col-xs-6">
                        <div class="product-item">
                          <div class="pi-img-wrapper">
                            <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/products/model4.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                          </div>
                          <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                          <div class="pi-price">$29.00</div>
                          <a href="#" class="btn btn-default add2cart">Add to cart</a>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-6">
                        <div class="product-item">
                          <div class="pi-img-wrapper">
                            <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/products/model3.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                          </div>
                          <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                          <div class="pi-price">$29.00</div>
                          <a href="#" class="btn btn-default add2cart">Add to cart</a>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-6">
                        <div class="product-item">
                          <div class="pi-img-wrapper">
                            <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/products/model7.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                          </div>
                          <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                          <div class="pi-price">$29.00</div>
                          <a href="#" class="btn btn-default add2cart">Add to cart</a>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-6">
                        <div class="product-item">
                          <div class="pi-img-wrapper">
                            <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/products/model4.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                          </div>
                          <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                          <div class="pi-price">$29.00</div>
                          <a href="#" class="btn btn-default add2cart">Add to cart</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                Pages 
                
              </a>
                
              <ul class="dropdown-menu">
                <li class="active"><a href="shop-index.html">Home Default</a></li>
                <li><a href="shop-index-header-fix.html">Home Header Fixed</a></li>
                <li><a href="shop-index-light-footer.html">Home Light Footer</a></li>
                <li><a href="shop-product-list.html">Product List</a></li>
                <li><a href="shop-search-result.html">Search Result</a></li>
                <li><a href="shop-item.html">Product Page</a></li>
                <li><a href="shop-shopping-cart-null.html">Shopping Cart (Null Cart)</a></li>
                <li><a href="shop-shopping-cart.html">Shopping Cart</a></li>
                <li><a href="shop-checkout.html">Checkout</a></li>
                <li><a href="shop-about.html">About</a></li>
                <li><a href="shop-contacts.html">Contacts</a></li>
                <li><a href="shop-account.html">My account</a></li>
                <li><a href="shop-wishlist.html">My Wish List</a></li>
                <li><a href="shop-goods-compare.html">Product Comparison</a></li>
                <li><a href="shop-standart-forms.html">Standart Forms</a></li>
                <li><a href="shop-faq.html">FAQ</a></li>
                <li><a href="shop-privacy-policy.html">Privacy Policy</a></li>
                <li><a href="shop-terms-conditions-page.html">Terms &amp; Conditions</a></li>
              </ul>
            </li>
            <li><a href="index.html" target="_blank">Corporate</a></li>
            <li><a href="onepage-index.html" target="_blank">One Page</a></li>
            <li><a href="http://keenthemes.com/preview/metronic/theme/templates/admin&amp;page=ecommerce_index.html" target="_blank">Admin theme</a></li>
            <?php */?>
            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="#">
                  <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                  </div>
                </form>
              </div> 
            </li>
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->

   
   
   
   
   
   <?= $this->Flash->render() ?>
  
            
          <?= $this->fetch('content') ?>
    
    
   
   
   
   
   

    <!-- BEGIN STEPS -->
    <div class="steps-block steps-block-red">
      <div class="container">
        <div class="row">
          <div class="col-md-4 steps-block-col">
            <i class="fa fa-truck"></i>
            <div>
              <h2>Free shipping</h2>
              <em>Express delivery withing 3 days</em>
            </div>
            <span>&nbsp;</span>
          </div>
          <div class="col-md-4 steps-block-col">
            <i class="fa fa-gift"></i>
            <div>
              <h2>Daily Gifts</h2>
              <em>3 Gifts daily for lucky customers</em>
            </div>
            <span>&nbsp;</span>
          </div>
          <div class="col-md-4 steps-block-col">
            <i class="fa fa-phone"></i>
            <div>
              <h2>477 505 8877</h2>
              <em>24/7 customer care available</em>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END STEPS -->

    <!-- BEGIN PRE-FOOTER -->
    <div class="pre-footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN BOTTOM ABOUT BLOCK -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>About us</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod tincidunt ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip  commodo consequat. </p>
            <p>Duis autem vel eum iriure dolor vulputate velit esse molestie at dolore.</p>
          </div>
          <!-- END BOTTOM ABOUT BLOCK -->
          <!-- BEGIN BOTTOM INFO BLOCK -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>Information</h2>
            <ul class="list-unstyled">
              <li><i class="fa fa-angle-right"></i> <a href="#">Delivery Information</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Customer Service</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Order Tracking</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Shipping &amp; Returns</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="contacts.html">Contact Us</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Careers</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Payment Methods</a></li>
            </ul>
          </div>
          <!-- END INFO BLOCK -->

          <!-- BEGIN TWITTER BLOCK --> 
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2 class="margin-bottom-0">Latest Tweets</h2>
            <a class="twitter-timeline" href="https://twitter.com/twitterapi" data-tweet-limit="2" data-theme="dark" data-link-color="#57C8EB" data-widget-id="455411516829736961" data-chrome="noheader nofooter noscrollbar noborders transparent">Loading tweets by @keenthemes...</a>      
          </div>
          <!-- END TWITTER BLOCK -->

          <!-- BEGIN BOTTOM CONTACTS -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>Our Contacts</h2>
            <address class="margin-bottom-40">
              35, Lorem Lis Street, Park Ave<br>
              California, US<br>
              Phone: 300 323 3456<br>
              Fax: 300 323 1456<br>
              Email: <a href="mailto:info@metronic.com">info@metronic.com</a><br>
              Skype: <a href="skype:metronic">metronic</a>
            </address>
          </div>
          <!-- END BOTTOM CONTACTS -->
        </div>
        <hr>
        <div class="row">
          <!-- BEGIN SOCIAL ICONS -->
          <div class="col-md-6 col-sm-6">
            <ul class="social-icons">
              <li><a class="rss" data-original-title="rss" href="#"></a></li>
              <li><a class="facebook" data-original-title="facebook" href="#"></a></li>
              <li><a class="twitter" data-original-title="twitter" href="#"></a></li>
              <li><a class="googleplus" data-original-title="googleplus" href="#"></a></li>
              <li><a class="linkedin" data-original-title="linkedin" href="#"></a></li>
              <li><a class="youtube" data-original-title="youtube" href="#"></a></li>
              <li><a class="vimeo" data-original-title="vimeo" href="#"></a></li>
              <li><a class="skype" data-original-title="skype" href="#"></a></li>
            </ul>
          </div>
          <!-- END SOCIAL ICONS -->
          <!-- BEGIN NEWLETTER -->
          <div class="col-md-6 col-sm-6">
            <div class="pre-footer-subscribe-box pull-right">
              <h2>Newsletter</h2>
              <form action="#">
                <div class="input-group">
                  <input type="text" placeholder="youremail@mail.com" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Subscribe</button>
                  </span>
                </div>
              </form>
            </div> 
          </div>
          <!-- END NEWLETTER -->
        </div>
      </div>
    </div>
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN COPYRIGHT -->
          <div class="col-md-6 col-sm-6 padding-top-10">
            2014 © Metronic Shop UI. ALL Rights Reserved. 
          </div>
          <!-- END COPYRIGHT -->
          <!-- BEGIN PAYMENTS -->
          <div class="col-md-6 col-sm-6">
            <ul class="list-unstyled list-inline pull-right">
              <li><img src="<?php echo $this->request->webroot;?>assets/frontend/layout/img/payments/western-union.jpg" alt="We accept Western Union" title="We accept Western Union"></li>
              <li><img src="<?php echo $this->request->webroot;?>assets/frontend/layout/img/payments/american-express.jpg" alt="We accept American Express" title="We accept American Express"></li>
              <li><img src="<?php echo $this->request->webroot;?>assets/frontend/layout/img/payments/MasterCard.jpg" alt="We accept MasterCard" title="We accept MasterCard"></li>
              <li><img src="<?php echo $this->request->webroot;?>assets/frontend/layout/img/payments/PayPal.jpg" alt="We accept PayPal" title="We accept PayPal"></li>
              <li><img src="<?php echo $this->request->webroot;?>assets/frontend/layout/img/payments/visa.jpg" alt="We accept Visa" title="We accept Visa"></li>
            </ul>
          </div>
          <!-- END PAYMENTS -->
        </div>
      </div>
    </div>
    <!-- END FOOTER -->

    <!-- BEGIN fast view of a product -->
    <div id="product-pop-up" style="display: none; width: 700px;">
            <div class="product-page product-pop-up">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                  <div class="product-main-image">
                    <img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/products/model7.jpg" alt="Cool green dress with red bell" class="img-responsive">
                  </div>
                  <div class="product-other-images">
                    <a href="#" class="active"><img alt="Berry Lace Dress" src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/products/model3.jpg"></a>
                    <a href="#"><img alt="Berry Lace Dress" src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/products/model4.jpg"></a>
                    <a href="#"><img alt="Berry Lace Dress" src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/products/model5.jpg"></a>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                  <h2>Cool green dress with red bell</h2>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span>$</span>47.00</strong>
                      <em>$<span>62.00</span></em>
                    </div>
                    <div class="availability">
                      Availability: <strong>In Stock</strong>
                    </div>
                  </div>
                  <div class="description">
                    <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat 
Nostrud duis molestie at dolore.</p>
                  </div>
                  <div class="product-page-options">
                    <div class="pull-left">
                      <label class="control-label">Size:</label>
                      <select class="form-control input-sm">
                        <option>L</option>
                        <option>M</option>
                        <option>XL</option>
                      </select>
                    </div>
                    <div class="pull-left">
                      <label class="control-label">Color:</label>
                      <select class="form-control input-sm">
                        <option>Red</option>
                        <option>Blue</option>
                        <option>Black</option>
                      </select>
                    </div>
                  </div>
                  <div class="product-page-cart">
                    <div class="product-quantity">
                        <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                    </div>
                    <button class="btn btn-primary" type="submit">Add to cart</button>
                    <a href="shop-item.html" class="btn btn-default">More details</a>
                  </div>
                </div>

                <div class="sticker sticker-sale"></div>
              </div>
            </div>
    </div>
    
        <!-- BEGIN CART -->
        <div class="bottom-cart">
          <div class="top-cart-info">
            <a href="javascript:void(0);" class="top-cart-info-count">3 items</a>
            <a href="javascript:void(0);" class="top-cart-info-value">$1260</a>
          </div>
          <i class="fa fa-shopping-cart clickable" onclick="showHide('sub2')"></i>
                        
          <div class="top-cart-content-wrapper">
            <div class="top-cart-content" id="sub2">
              <ul class="scroller" style="height: 250px;">
                <li>
                  <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count">x 1</span>
                  <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
                  <em>$1230</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
                <li>
                  <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count">x 1</span>
                  <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
                  <em>$1230</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
                <li>
                  <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count">x 1</span>
                  <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
                  <em>$1230</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
                <li>
                  <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count">x 1</span>
                  <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
                  <em>$1230</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
                <li>
                  <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count">x 1</span>
                  <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
                  <em>$1230</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
                <li>
                  <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count">x 1</span>
                  <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
                  <em>$1230</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
                <li>
                  <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count">x 1</span>
                  <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
                  <em>$1230</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
                <li>
                  <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count">x 1</span>
                  <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
                  <em>$1230</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
              </ul>
              <div class="text-right">
                <a href="shop-shopping-cart.html" class="btn btn-default">View Cart</a>
                <a href="shop-checkout.html" class="btn btn-primary">Checkout</a>
              </div>
            </div>
          </div>            
        </div>
        <!--END CART -->
    
    
    <!-- END fast view of a product -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="<?php echo $this->request->webroot;?>assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="<?php echo $this->request->webroot;?>assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
    <script src='<?php echo $this->request->webroot;?>assets/global/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
    <script src="<?php echo $this->request->webroot;?>assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->

    <!-- BEGIN LayerSlider -->
    <script src="<?php echo $this->request->webroot;?>assets/global/plugins/slider-layer-slider/js/greensock.js" type="text/javascript"></script><!-- External libraries: GreenSock -->
    <script src="<?php echo $this->request->webroot;?>assets/global/plugins/slider-layer-slider/js/layerslider.transitions.js" type="text/javascript"></script><!-- LayerSlider script files -->
    <script src="<?php echo $this->request->webroot;?>assets/global/plugins/slider-layer-slider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script><!-- LayerSlider script files -->
    <script src="<?php echo $this->request->webroot;?>assets/frontend/pages/scripts/layerslider-init.js" type="text/javascript"></script>
    <!-- END LayerSlider -->

    <script src="<?php echo $this->request->webroot;?>assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            LayersliderInit.initLayerSlider();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initTwitter();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>