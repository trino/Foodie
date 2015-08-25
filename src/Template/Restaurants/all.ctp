<div class="main">
    <div class="col-md-12 col-xs-12">

        <div class="content-page">
            
            <?php
                if (!isset($restaurant)) {
                    $restaurant = "";
                }
                $doHR = false;
            ?>
            
            <div class="row margin-bottom-10">
                <div class="col-md-8 col-xs-12">
                    <h1 class="">
                    <a href="#"><?php echo ucfirst(str_replace('-', ' ', $restaurant)); ?></a> Local Restaurants
                    </h1>
    
                <div class="margin-bottom-15">
                    <h4>Pick your cuisine type:</h4>
                    <a href="#" clicked>All</a> | 
                    <?php foreach($Genres as $ID => $Genre){
                        echo '<a href="#' . $ID . '"><strong>' . $Genre . '</strong></a> |';
                    } ?>
               
                </div>
         
            
            
                <?php
                    foreach ($Restaurants as $Restaurant) {
                            if ($doHR) {
                                echo '<hr class="blog-post-sep">';
                            }
                            $doHR = true;
                            ?>

                            <div class="row margin-bottom-10">
                                <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2>
                                            <a href="<?php echo $this->request->webroot; ?>restaurants/<?php echo $Restaurant->Slug; ?>"><?= $Restaurant->Name; ?></a>
                                        </h2>

                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-3 col-sm-3 margin-bottom-15">
                                        <img class="img-responsive" alt="" src="<?php echo $this->request->webroot; ?>/img/works/img4.jpg">
                                    </div>
                                    <div class="col-md-9 col-sm-9">
                                        <strong><?php echo $Restaurant->Address; ?>, <?php echo $Restaurant->City; ?>, <?php echo $Restaurant->Province; ?></strong><br />
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i><br />
                                        <strong>Thai</strong>

                                        <ul class="blog-info">
                                            <li><i class="fa fa-calendar"></i> Thai</li>
                                            <li><i class="fa fa-comments"></i> Delivery, Pickup</li>
                                            <li><i class="fa fa-tags"></i> Est. Wait 40 min</li>
                                            <li><i class="fa fa-tags"></i> Open 10am - 10am</li>
                                        </ul>
                                        <p><?= $Restaurant->Description; ?></p>
                                        <a href="blog-item.html" class=" btn btn-success">Order Online</a>
                                    </div>
                                </div>

        </div>
                            </div>
                    <?php } ?>
        
            <div class="row">
                <div class="col-md-12  margin-bottom-10">
                    <button align="" class="loadmore btn btn-primary">Load More</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="pricing-item">
                <div class="pricing-head margin-bottom-20">
                  <h3>Our Most Popular Dishes in your area</h3>
                </div>
                <div class="pricing-content row">
                    <div class="col-md-4">
                        <img class="img-responsive" alt="" src="<?php echo $this->request->webroot; ?>/img/works/img4.jpg">
                    </div>
                    <div class="col-md-8">
                        <h4>Hanmburger with Fries</h4>
                        <blockquote>American</blockquote>
                    </div>
                    <div class="col-md-4">
                        <img class="img-responsive" alt="" src="<?php echo $this->request->webroot; ?>/img/works/img4.jpg">
                    </div>
                    <div class="col-md-8">
                        <h4>Hanmburger with Fries</h4>
                        <blockquote>American</blockquote>
                    </div>
                    <div class="col-md-4">
                        <img class="img-responsive" alt="" src="<?php echo $this->request->webroot; ?>/img/works/img4.jpg">
                    </div>
                    <div class="col-md-8">
                        <h4>Hanmburger with Fries</h4>
                        <blockquote>American</blockquote>
                    </div>
                    <div class="col-md-4">
                        <img class="img-responsive" alt="" src="<?php echo $this->request->webroot; ?>/img/works/img4.jpg">
                    </div>
                    <div class="col-md-8">
                        <h4>Hanmburger with Fries</h4>
                        <blockquote>American</blockquote>
                    </div>
                    <div class="col-md-4">
                        <img class="img-responsive" alt="" src="<?php echo $this->request->webroot; ?>/img/works/img4.jpg">
                    </div>
                    <div class="col-md-8">
                        <h4>Hanmburger with Fries</h4>
                        <blockquote>American</blockquote>
                    </div>
                </div>
                <div class="pricing-footer">
                </div>
            </div>
        </div>
   </div>
        <!--hr class="blog-post-sep">
        <ul class="pagination">
            <li><a href="#">Prev</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li class="active"><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">Next</a></li>
        </ul-->



    </div>
    </div>
</div>