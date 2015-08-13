<?php
    $userName = "Not logged in";
    $Restaurant = $userName;
    if($Profile) {
        $userName = $Profile->Name;
        $Restaurant = $Profile->RestaurantID;
    }
?>
<div class="col-md-6 col-sm-6 additional-shop-info">
    <ul class="list-unstyled list-inline">
        <li><i class="fa fa-phone"></i><span>+1 456 6717</span></li>
        <!-- BEGIN CURRENCIES -->
        <li class="shop-currencies">
            <a href="javascript:void(0);" style="display: none;">€</a>
            <a href="javascript:void(0);" style="display: none;">£</a>
            <a href="javascript:void(0);" class="current">$CDN</a>
        </li>
        <!-- END CURRENCIES -->
        <!-- BEGIN LANGS -->
        <li class="langs-block" style="display: none;">
            <a href="javascript:void(0);" class="current">English </a>
            <div class="langs-block-others-wrapper"><div class="langs-block-others">
              <a href="javascript:void(0);">French</a>
            </div></div>
        </li>
        <!-- END LANGS -->
    </ul>
</div>
<!-- END TOP BAR LEFT PART -->
<!-- BEGIN TOP BAR MENU -->
<div class="col-md-6 col-sm-6 additional-nav">
     <ul class="list-unstyled list-inline pull-right">
        <?php
            if($userID){
                //echo '<li><a href="shop-account.html">My Account</a></li>';
                echo '<li><a href="' . $this->request->webroot . 'users/dashboard">Your Dashboard</a></li>';
                if ($Restaurant) {
                    echo '<li><a href="' . $this->request->webroot . 'restaurants/dashboard">Restaurant Dashboard</a></li>';
                }
                echo '<li><a href="' . $this->request->webroot . 'users/logout">Log Out</a></li>';
            } else {
                echo '<li><a href="#login-pop-up" class="fancybox-fast-view">Log In</a></li>';
            }
        ?>
        <li><a href="shop-checkout.html">Checkout</a></li>
    </ul>
</div>