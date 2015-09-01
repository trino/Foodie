<div class="col-md-12">
    <?php echo $this->element('user_menu');?>
    <div class="col-xs-10  col-sm-9">
        <div class="deleteme">
            <h3 class="sidebar__title">Restaurant Manager</h3>
            <hr class="shop__divider">
            <div class="dashboard">
                <table class="table table-theme table-striped">
                    <THEAD>
                    <TR>
                        <TH>ID</TH>
                        <TH>Name</TH>
                        <TH>Email</TH>
                        <TH>Phone</TH>
                        <TH>Type</TH>
                        <TH>Actions</TH>
                    </TR>
                    </THEAD>
                    <TBODY>
                    <?php
                        include_once("common/api.php");
                        $Restuaurants = $Manager->enum_restaurants();
                        $Genres = $Manager->enum_genres();
                        $TD = "</TD><TD>";
                        foreach($Restuaurants as $Restuaurant){
                            $Genre="[CLOSED]";
                            if ($Restuaurant->Open && $Restuaurant->Genre) {
                                $Genre = $Genres[$Restuaurant->Genre];
                            }
                            echo '<TR><TD>' . $Restuaurant->ID . $TD . $Restuaurant->Name . $TD . $Restuaurant->Email . $TD . $Restuaurant->Phone . $TD  . $Genre . $TD;
                            echo '<a href="' . $this->request->webroot . 'restaurants/orders?ID=' . $Restuaurant->ID . '" class="btn btn-info">Orders</a>';
                            echo '<a href="' . $this->request->webroot . 'restaurants/dashboard?ID=' . $Restuaurant->ID . '" class="btn btn-info">Edit</a>';
                            if ($Restuaurant->Open) {
                                makebutton($Restuaurant, "Close", "warning");
                            } else {
                                makebutton($Restuaurant, "Open", "primary");
                            }
                            echo ' ';
                            makebutton($Restuaurant, "Delete", "danger");
                            echo '</TD></TR>';
                        }

                    function makebutton($Restuaurant, $Action, $Color){
                        echo '<A HREF="?action=' . $Action . '&ID=' . $Restuaurant->ID . '" class="btn btn-' . $Color . '" ';
                        echo 'onclick="return confirm(' . "'Are you sure you want to " . strtolower($Action) . " " . addslashes($Restuaurant->Name) .  "?'" . ');">' . $Action . '</A>';
                    }
                    ?>
                    </TBODY>
                </table>
            <div class="clearfix  hidden-xs"></div>
        </div>
        <hr class="shop__divider">
    </div>
</div>