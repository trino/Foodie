<?php //$Manager->fileinclude(__FILE__); ?>
<!-- BEGIN STEPS -->
<div class="steps-block steps-block-red">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-11 steps-block-col">
                <i class="fa fa-search"></i>
                <div>
                    <h3>Pick A Restaurant</h3>
                    <em>Choose your preference</em>
                </div>
                <span>&nbsp;</span>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-11 steps-block-col">
                <i class="fa fa-shopping-cart"></i>
                <div>
                    <h3>Order Online</h3>
                    <em>Get the best discount</em>
                </div>
                <span>&nbsp;</span>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-11 steps-block-col">
                <i class="fa fa-spoon"></i>
                <div>
                    <h3>Enjoy Your Meal</h3>
                    <em>No setup fees, hidden costs, or contracts</em>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END STEPS -->

<!-- BEGIN PRE-FOOTER -->
<div class="pre-footer">
    <div class="container-fluid">  <hr>
        <div class="row">
            <!-- END BOTTOM ABOUT BLOCK -->
            <!-- BEGIN BOTTOM INFO BLOCK -->
            <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2>Information</h2>
                <ul class="list-unstyled">
                    <li><i class="fa fa-angle-right"></i> <a href="#">Delivery Information</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Customer Service</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Order Tracking</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Shipping &amp; Returns</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="<?= $this->request->webroot; ?>pages/contact">Contact Us</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Careers</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Payment Methods</a></li>


                    <li><i class="fa fa-angle-right"></i> <a href="<?= $this->request->webroot; ?>pages/disclaimers">Disclaimers</a></li>
                </ul>
            </div>
            <!-- END INFO BLOCK -->

            <!-- BEGIN TWITTER BLOCK -->
            <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2 class="margin-bottom-0">Latest Tweets</h2>
                <a class="twitter-timeline" href="https://twitter.com/twitterapi" data-tweet-limit="2" data-theme="dark" data-link-color="#57C8EB" data-widget-id="455411516829736961" data-chrome="noheader nofooter noscrollbar noborders transparent">Loading tweets by @keenthemes...</a>
            </div>
            <!-- END TWITTER BLOCK -->

            <div class="col-md-4 col-sm-12 pre-footer-col">
                <h2 class="margin-bottom-0">Share your Experience</h2>
                <p>Leave comments or describe your experience using the DidUEat.ca website, how well your meal was and interaction with restarurants.</p>
                <form class="form">
                    <fieldset>
                        <div class="form-group margin-bottom-10">
                            <label class="col-lg-12 col-sm-12 control-label col-xs-12" for="Message">Message <span class="require">*</span></label>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <textarea style="height:150px" name="Message" class="form-control margin-bottom-10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="pull-right">
                                <input class="btn btn-primary" type="submit" value="Submit" />
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>            
            
            <div class="col-md-2 col-sm-6 pre-footer-col">
                <h2 class="margin-bottom-0">Cities</h2>
                <ul class="list-unstyled">
                    <li>Hamilton Delivery</li>
                </ul>
            </div>
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
                    <form action="#" method="post">
                        <input type="hidden" name="action" value="subscribe">
                        <div class="input-group">
                            <input type="text" name="email" placeholder="youremail@mail.com" class="form-control" <?php
                                if (isset($Profile)){
                                    echo ' VALUE="' . $Profile->Email . '"';
                                }
                            ?>>
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
    <div class="container-fluid">
        <div class="row">
            <!-- BEGIN COPYRIGHT -->
            <div class="col-md-4 col-sm-4 padding-top-10">
                2015 &copy; didueat.ca / ALL Rights Reserved.
            </div>
            <div class="col-md-4 col-sm-4 padding-top-10" align="center">
                This page took <?= round(microtime(true) - $Now, 2); ?> seconds to generate
            </div>
            <!-- END COPYRIGHT -->
            <!-- BEGIN PAYMENTS -->
            <div class="col-md-4 col-sm-4">
                <ul class="list-unstyled list-inline pull-right">
                    <li><img src="<?php echo $this->request->webroot;?>/img/payments/western-union.jpg" alt="We accept Western Union" title="We accept Western Union"></li>
                    <li><img src="<?php echo $this->request->webroot;?>/img/payments/american-express.jpg" alt="We accept American Express" title="We accept American Express"></li>
                    <li><img src="<?php echo $this->request->webroot;?>/img/payments/MasterCard.jpg" alt="We accept MasterCard" title="We accept MasterCard"></li>
                    <li><img src="<?php echo $this->request->webroot;?>/img/payments/PayPal.jpg" alt="We accept PayPal" title="We accept PayPal"></li>
                    <li><img src="<?php echo $this->request->webroot;?>/img/payments/visa.jpg" alt="We accept Visa" title="We accept Visa"></li>
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
                    <img src="<?php echo $this->request->webroot;?>/img/products/model7.jpg" alt="Cool green dress with red bell" class="img-responsive">
                </div>
                <div class="product-other-images">
                    <a href="#" class="active"><img alt="Berry Lace Dress" src="<?php echo $this->request->webroot;?>/img/products/model3.jpg"></a>
                    <a href="#"><img alt="Berry Lace Dress" src="<?php echo $this->request->webroot;?>/img/products/model4.jpg"></a>
                    <a href="#"><img alt="Berry Lace Dress" src="<?php echo $this->request->webroot;?>/img/products/model5.jpg"></a>
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




<!-- END fast view of a product -->

<!-- Load javascripts at bottom, this will reduce page load time -->


<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script src="<?php echo $this->request->webroot;?>/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
<script src="<?php echo $this->request->webroot;?>/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
<script src='<?php echo $this->request->webroot;?>/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
<script src="<?php echo $this->request->webroot;?>/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->

<!-- BEGIN LayerSlider -->
<script src="<?php echo $this->request->webroot;?>/plugins/slider-layer-slider/js/greensock.js" type="text/javascript"></script><!-- External libraries: GreenSock -->
<script src="<?php echo $this->request->webroot;?>/plugins/slider-layer-slider/js/layerslider.transitions.js" type="text/javascript"></script><!-- LayerSlider script files -->
<script src="<?php echo $this->request->webroot;?>/plugins/slider-layer-slider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script><!-- LayerSlider script files -->
<script src="<?php echo $this->request->webroot;?>/scripts/layerslider-init.js" type="text/javascript"></script>
<!-- END LayerSlider -->

<script src="<?php echo $this->request->webroot;?>/scripts/layout.js" type="text/javascript"></script>
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