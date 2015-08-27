<?php

$Restaurants = $Manager->enum_restaurants();
$Genres =  $Manager->enum_genres();
?>

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
         
            <div class="row margin-bottom-20 resturant-grid">
            
                <?php
                    foreach ($Restaurants as $Restaurant) {
                            if ($doHR) {
                                //echo '<hr class="blog-post-sep">';
                            }
                            $doHR = true;
                            ?>

                          
                                <div class="col-md-3">
                                        <h2>
                                            <a href="<?php echo $this->request->webroot; ?>restaurants/<?php echo $Restaurant->Slug; ?>"><?= $Restaurant->Name; ?></a>
                                        </h2>
                                    <div class="clearfix"></div>
                                    <div class="resturants-items">
                                    <div class="margin-bottom-15">
                                        <img class="img-responsive" alt="" src="<?php echo $this->request->webroot; ?>/img/works/img4.jpg">
                                    </div>
                                    <div class="rating-details">
                                        <strong><?php echo $Restaurant->Address; ?>, <?php echo $Restaurant->City; ?>, <?php echo $Restaurant->Province; ?></strong><br />
                                        
                                        <strong>Thai</strong>

                                        <ul class="blog-info">
                                            <li><i class="fa fa-map-marker"></i> Thai</li>
                                            <li><i class="fa fa-truck"></i> Delivery, Pickup</li>
                                            <li><i class="fa fa-tags"></i> Est. Wait 40 min</li>
                                        </ul>
                                        <p><?= $Restaurant->Description; ?></p>
                                        <a href="blog-item.html" class=" btn btn-success">Order Online</a>
                                    </div>
                                    </div>


        </div>
        
                          
                    <?php } ?>
                    
        </div>
            <div class="row">
                <div class="col-md-12  margin-bottom-10">
                    <button align="" class="loadmore btn btn-primary">Load More</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            
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