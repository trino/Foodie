<?php
    if (!$Restaurant) {
        echo 'This user is not assigned to a restaurant';
    } else {
        include_once("common/api.php");
?>
        <div class="content-page row">
            <?php echo $this->element('user_menu'); ?>
            <div class="col-xs-12  col-sm-8">
                <div class="deleteme">
                    <h3 class="sidebar__title">Restaurant Detail Manager</h3>
                    <hr class="shop__divider">
                    <div class="dashboard">
                        <?php echo $this->element('restaurant_info'); ?>
                    </div>
                    <div class="clearfix  hidden-xs"></div>
                </div>
                <hr class="shop__divider">
            </div>
        </div>
        <div class="clearfix"></div>
<?php } ?>