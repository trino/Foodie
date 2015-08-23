<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<!-- Head BEGIN -->
<head>
    <meta charset="utf-8">
    <title>didueat - <?php if(isset($title))echo $title;else echo $this->request->params['action'];?></title>

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
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">

    <!--- fonts for slider on the index page -->
    <!-- Fonts END -->

    <!-- Global styles START -->
    <link href="<?php echo $this->request->webroot;?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $this->request->webroot;?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Global styles END -->

    <!-- Page level plugin styles START -->
    <link href="<?php echo $this->request->webroot;?>plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <!--link href="<?php echo $this->request->webroot;?>/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet"-->
    <!--link href="<?php echo $this->request->webroot;?>/plugins/slider-layer-slider/css/layerslider.css" rel="stylesheet"-->
    <!-- Page level plugin styles END -->

    <!-- Theme styles START -->
    <link href="<?php echo $this->request->webroot;?>css/components.css" rel="stylesheet">
    <link href="<?php echo $this->request->webroot;?>css/style.css" rel="stylesheet">
    <link href="<?php echo $this->request->webroot;?>css/style-shop.css" rel="stylesheet" type="text/css">
    <!--link href="<?php echo $this->request->webroot;?>/css/style-layer-slider.css" rel="stylesheet"-->
    <link href="<?php echo $this->request->webroot;?>css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo $this->request->webroot;?>css/red.css" rel="stylesheet" id="style-color">
    <link href="<?php echo $this->request->webroot;?>/css/custom.css" rel="stylesheet">


    <!-- MAKE ALL CSS CHANGES TO HERE -->
    <link href="<?php echo $this->request->webroot;?>css/custom_css.css" rel="stylesheet">
    <link href="<?php echo $this->request->webroot;?>jqueryui/jquery-ui.css" rel="stylesheet">
    <!-- Theme styles END -->

    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->

    <!--[if lt IE 9]>
    <script src="<?php echo $this->request->webroot;?>plugins/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo $this->request->webroot;?>plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->request->webroot;?>plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->request->webroot;?>plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!--script src="<?php echo $this->request->webroot;?>/scripts/back-to-top.js" type="text/javascript"></script-->
    <!--script src="<?php echo $this->request->webroot;?>/scripts/sample.js" type="text/javascript"></script-->
    <script src="<?php echo $this->request->webroot;?>plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->request->webroot;?>scripts/menu_manager.js"></script>
    <script src="<?php echo $this->request->webroot;?>scripts/upload.js"></script>
    <script src="<?php echo $this->request->webroot;?>jqueryui/jquery-ui.js"></script>
    
    <!-- END CORE PLUGINS -->
</head>
<!-- Head END -->
<?php include_once("api.php"); ?>

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



<div id="registration-form"class="col-md-12" style="display: none;">
    <?php echo $this->element('user_info');?>
</div>




<div id="login-pop-up" style="display:none;">
    <div class="login-pop-up">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="login-form">
                <h1>Login</h1>
                <DIV ID="message" align="center"></DIV>
                <form role="form" action="<?php echo $this->request->webroot;?>cuisine/login" method="post" class="form-horizontal form-without-legend">
                    <input type="hidden" name="action" value="login">
                    <div class="form-group">
                        <label class="col-lg-4 control-label" for="email">Email <span class="require">*</span></label>
                        <div class="col-lg-8">
                            <input type="text" id="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label" for="password">Password <span class="require">*</span></label>
                        <div class="col-lg-8">
                            <input type="text" id="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-offset-4 padding-left-0">
                            <a href="#forget-passsword" class="fancybox-fast-view">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                            <input class="btn btn-primary" type="button" Value="Login" onclick="trylogin(); return false;">
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
    <DIV ID="forgot-message" align="center"></DIV>
    <form role="form" class="form-horizontal form-without-legend" method="post">
        <div class="form-group col-md-12">
            <label class="col-lg-4 control-label" for="email">Email</label>
            <div class="col-lg-8">
                <input type="hidden" Name="action" value="forgotpass">
                <input type="text" Name="Email" id="forgot-email" class="form-control">
            </div>
        </div>

        <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-5">
            <button class="btn btn-primary" type="button" onclick="forgotpass();">Send</button>
        </div>

    </form>
</div>



<!-- END TOP BAR -->

<!-- BEGIN HEADER -->
<div class="header">
    <div class="container-fluid">
        <a class="site-logo" href="<?php echo $this->request->webroot;?>"><img src="<?php echo $this->request->webroot;?>img/logos/logo.png" alt="Metronic Shop UI"></a>

        <a href="#header-nav" class="mobi-toggler fancybox-fast-view"><i class="fa fa-bars"></i></a>

        <!-- BEGIN NAVIGATION -->
         <div class="header-navigation-wrap" id="header-nav" >
        <div class="header-navigation" >
            <ul>

                <!--li><a href="<?php echo $this->request->webroot;?>">Home</a></li-->
                <li><a href="<?php echo $this->request->webroot;?>restaurants/all">Local Restaurants</a></li>
                <li><a href="<?php echo $this->request->webroot;?>restaurants/signup">Sign Up Restaurants</a></li>
                <!--li><a href="<?php echo $this->request->webroot;?>pages/contact">Contact Us</a></li-->

                <li><a style="" href="mailto:info@trinoweb.com?cc=info@didueat.ca our name address phone number">Email</a></li>
                <?php
                    $userName = "Not logged in";
                    $Restaurant = $userName;
                    if($Profile) {
                        $userName = ucfirst($Profile->Name);
                        $Restaurant = $Profile->RestaurantID;
                    }
                ?>
                <!-- BEGIN TOP BAR MENU -->
                    <?php
                        if($userID){
                            //echo '<li><a href="shop-account.html">My Account</a></li>';
                            echo '<li><a href="' . $this->request->webroot . 'users/dashboard">' . $userName . "'s Dashboard</a></li>";
                            echo '<li><a href="' . $this->request->webroot . 'users/logout">Log Out</a></li>';
                        } else {
                            echo '<li><a href="#login-pop-up" class="fancybox-fast-view">Log In</a></li>';
                        }
                    ?>


                <!-- BEGIN TOP SEARCH -->
                <li class="menu-search">
                    <span class="sep"></span>
                    <i class="fa fa-search search-btn"></i>
                    <div class="search-box">
                        <form action="#">
                            <div class="input-group" valign="center">
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
        </div>
        <!-- END NAVIGATION -->
        
    </div>
</div>
<!-- Header END -->

<SCRIPT>
    function getvalue(ElementID){
        return document.getElementById(ElementID).value;
    }
    function setvalue(ElementID, Value){
        document.getElementById(ElementID).innerHTML = Value;
    }

    function escapechars(text){
        return text.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
    }

    function forgotpass(){
        $.ajax({
            url: "<?php echo $this->request->webroot;?>",
            data: "action=forgotpass&Email=" + escapechars(getvalue("forgot-email")),
            type: "post",
            success: function (msg) {
                setvalue("forgot-message", msg);
            },
            failure: function (msg){
                setvalue("forgot-message", "ERROR: " + msg);
            }
        });
        return false;
    }

    function trylogin(){
        $.ajax({
            url: "<?php echo $this->request->webroot;?>",
            data: "action=login&email=" + getvalue("email") + "&password=" + getvalue("password"),
            type: "post",
            success: function (msg) {
                if(msg) {
                    if(ValidURL(msg)){
                        window.location = msg;
                    } else {
                        setvalue("message", msg);
                    }
                } else {
                    location.reload();
                }
            },
            failure: function (msg){
                setvalue("message", "ERROR: " + msg);
            }
        });
        return false;
    }

    function ValidURL(str) {
        var pattern = new RegExp('^(https?:\/\/)?'+ // protocol
            '((([a-z\d]([a-z\d-]*[a-z\d])*)\.)+[a-z]{2,}|'+ // domain name
            '((\d{1,3}\.){3}\d{1,3}))'+ // OR ip (v4) address
            '(\:\d+)?(\/[-a-z\d%_.~+]*)*'+ // port and path
            '(\?[;&a-z\d%_.~+=-]*)?'+ // query string
            '(\#[-a-z\d_]*)?$','i'); // fragment locater
        return pattern.test(str);
    }
</SCRIPT>