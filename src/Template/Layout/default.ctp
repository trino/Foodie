<?php include("subpages/header.php"); ?>
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
            <?php echo $this->element('user_info');?>
      </div>
        </div>        
    </div>
    <!-- END TOP BAR -->

    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href="<?php echo $this->request->webroot;?>"><img src="<?php echo $this->request->webroot;?>assets/frontend/layout/img/logos/logo-shop-red.png" alt="Metronic Shop UI"></a>

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
                        <h4><a href="<?php echo $this->request->webroot;?>cuisine/american">American</a></h4>
                        <ul>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 1</a></li>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 1</a></li>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 1</a></li>

                        </ul>
                        <h4><a href="<?php echo $this->request->webroot;?>cuisine/asian">Asian</a></h4>
                        <ul>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 2</a></li>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 2</a></li>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 2</a></li>

                        </ul>
                        <h4><a href="<?php echo $this->request->webroot;?>cuisine/chinese">Chinese</a></h4>
                        <ul>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 3</a></li>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 3</a></li>

                        </ul>
                      </div>
                      <div class="col-md-4 header-navigation-col">

                        <h4><a href="<?php echo $this->request->webroot;?>cuisine/german">German</a></h4>
                        <ul>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 4</a></li>

                        </ul>
                        <h4><a href="<?php echo $this->request->webroot;?>cuisine/halal">Halal</a></h4>
                        <ul>
                          <li><a href="<?php echo $this->request->webroot;?>/restaurants/restaurant-1">Restaurant 5</a></li>

                        </ul>
                        <h4><a href="<?php echo $this->request->webroot;?>cuisine/indain">Indian</a></h4>
                        <ul>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 6</a></li>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 6</a></li>

                        </ul>
                        <h4><a href="<?php echo $this->request->webroot;?>cuisine/italian">Italian</a></h4>
                        <ul>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 7</a></li>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 7</a></li>
                        </ul>
                      </div>
                      <div class="col-md-4 header-navigation-col">



                        <h4><a href="<?php echo $this->request->webroot;?>cuisine/korean">Korean</a></h4>
                        <ul>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 8</a></li>
                        </ul>
                        <h4><a href="<?php echo $this->request->webroot;?>cuisine/latin">Latin</a></h4>
                        <ul>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 9</a></li>
                          <li><a href="<?php echo $this->request->webroot;?>restaurants/restaurant-1">Restaurant 9</a></li>
                        </ul>
                        <h4><a href="<?php echo $this->request->webroot;?>cuisine/north-american">North American</a></h4>
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
   <div class="main">
        
        

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <?php //include('common/sidebar.php');
           echo $this->element('sidebar');
          ?>
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
         
            
          <?= $this->fetch('content') ?>
       
          <!-- END CONTENT -->
          
         
          
        </div>
        <!-- END SIDEBAR & CONTENT -->

        

    </div>





<?php include("subpages/footer.php"); ?>