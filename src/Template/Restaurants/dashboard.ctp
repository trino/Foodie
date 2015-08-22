<?php
    if (!$Restaurant) {
        echo 'This user is not assigned to a restaurant';
    } else {
        include_once("common/api.php");
        ?>
        <!-- Big banner -->
        <!--div class="row " style="padding-top: 20px;">
            <div class="col-xs-12">
                <div class="">
                    <div class="banners--big">
    Welcome, test
    </div>
                </div>
            </div>
        </div-->
        <div class="col-md-12">
            <?php echo $this->element('user_menu'); ?>
            <div class="col-xs-10  col-sm-9">
                <div class="deleteme">


                    <h3 class="sidebar__title">Restaurant Detail Manager</h3>
                    <hr class="shop__divider">
                    <div class="dashboard">


                        <?php echo $this->element('restaurant_info'); ?>


                    </div>


                    <div class="clearfix  hidden-xs"></div>
                </div>
                <hr class="shop__divider">
                <?php /*<div class="shop__pagination">
          <ul class="pagination">
            <li><a class="pagination--nav" href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
            <li><a href="#">1</a></li>
            <li><a class="active" href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a class="pagination--nav" href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
          </ul>
        </div><?php */ ?>
            </div>
        </div>

    <?php } ?>