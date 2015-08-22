<div class="main">



    <div class="col-md-10 col-xs-7">

        <div class="content-page">

            <?php
                if (!isset($restaurant)) {
                    $restaurant = "";
                }
                $doHR = false;

                ?>


            <div class="row">
                <h1 class="">
                    <a href="#"><?php echo ucfirst(str_replace('-', ' ', $restaurant)); ?></a> Local Restaurants</h1>

                <?php
    foreach ($Restaurants as $Restaurant) {
            if ($doHR) {
                echo '<hr class="blog-post-sep">';
            }
            $doHR = true;
            ?>

            <div class="row">
                <div class="col-md-2 col-sm-2">
                    <img class="img-responsive" alt="" src="<?php echo $this->request->webroot; ?>/img/works/img4.jpg">
                </div>
                <div class="col-md-8 col-sm-8">
                    <h2>
                        <a href="<?php echo $this->request->webroot; ?>restaurants/<?php echo $Restaurant->Slug; ?>"><?= $Restaurant->Name; ?></a>
                    </h2>
                    <ul class="blog-info">
                        <li><i class="fa fa-calendar"></i> Thai</li>
                        <li><i class="fa fa-comments"></i> Delivery, Pickup</li>
                        <li><i class="fa fa-tags"></i> Est. Wait 40 min</li>
                        <li><i class="fa fa-tags"></i> Open 10am - 10am</li>
                    </ul>
                    <p><?= $Restaurant->Description; ?></p>
                    <a href="blog-item.html" class="more"> Order Online <i class="icon-angle-right"></i></a>
                </div>
            </div>
        <?php } ?>

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

        <div class="row">
            <div class="col-md-12  margin-bottom-10">
                <button align="" class="loadmore btn btn-primary">Load More</button>
            </div>
        </div>


    </div>
    </div>
    </div>
</div>