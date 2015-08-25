
<link rel="stylesheet" href="<?php echo $this->request->webroot; ?>scripts/ui-1.10.0/ui-lightness/jquery-ui-1.10.0.custom.min.css" type="text/css" />
<link href="<?php echo $this->request->webroot; ?>css/timepicker.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $this->request->webroot; ?>scripts/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="<?php echo $this->request->webroot; ?>scripts/ui-1.10.0/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="<?php echo $this->request->webroot; ?>scripts/ui-1.10.0/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="<?php echo $this->request->webroot; ?>scripts/ui-1.10.0/jquery.ui.tabs.min.js"></script>
<script type="text/javascript" src="<?php echo $this->request->webroot; ?>scripts/ui-1.10.0/jquery.ui.position.min.js"></script>
<script src="<?php echo $this->request->webroot; ?>scripts/timepicker.js" type="text/javascript"></script>

<form action="" method="post">
    <div class="row">
        <div class="col-md-4 profilepic">
            <p>
                <strong>Restaurant Image</strong><br /><br />
                <img id="picture" src="<?=$this->request->webroot."/img/default.png"; ?>" title="" style="width: 100%;"  /><br />
                <a href="javascript:void(0);" id="uploadbtn" class="btn btn-success">Change Image</a>
            </p>
        </div>
        <div class="col-md-4">
            <strong>Restaurant Info</strong><br /><br />
            <p class="inputs">

                <input type="text" name="Name" placeholder="Restaurant Name" title="Restaurant Name" value="<?= $Restaurant->Name; ?>" />
                <input type="text" name="Email" placeholder="Restaurant Email" title="Restaurant Email" value="<?= $Restaurant->Email; ?>" />
                <input type="text" name="Phone" placeholder="Phone" title="Phone" value="<?= $Restaurant->Phone; ?>" />
                <input type="text" name="Address" placeholder="Street Address" title="Street Address" value="<?= $Restaurant->Address; ?>" />
                <input type="text" name="City" placeholder="City" title="City" value="<?= $Restaurant->City; ?>" />
                <input type="text" name="PostalCode" placeholder="Postal Code" title="Postal Code" value="<?= $Restaurant->PostalCode; ?>" />

                <?php
                    provinces("Province", $Restaurant->Province);
                    makeselect("Country", $Restaurant->Country, array("CA" => "Canada"));
                    echo '<BR>Genre: ';
                    makeselect("Genre", $Restaurant->Genre, $Genres);
                ?>

            </p>
        </div>
        <div class="col-md-4">
            <p class="inputs">
                <strong>&nbsp;</strong><br /><br />
                <!--input type="text" name="cuisine" placeholder="Cuisine" value="<?php echo $res['Restaurant']['cuisine'];?>" /-->
                <textarea name="Description" placeholder="Description" title="Description"><?= $Restaurant->Description; ?></textarea>
            </p>

        </div>

        <hr class="divider" />

        <div class="row">


            <div class="col-xs-12 col-sm-12"><h5 class="sidebar__subtitle" style="width: 100%;">Hours of Operation</h5></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 opening">



                <table class="table days">
                    <?php
                        function totime($time){
                            $Minutes = right($time, 2);
                            $Hours = left($time, strlen($time) - 2);
                            if (!$Hours){ $Hours = "00";}
                            if (strlen($Hours) == 1) { $Hours  = "0" . $Hours ; }
                            if (strlen($Minutes) == 1) { $Minutes  = "0" . $Minutes ; }
                            return $Hours . ":" . $Minutes . ":00";
                            //if ($Hours < 12){
                            //    return $Hours . ":" . $Minutes . " AM";
                            //}
                            //return $Hours-12 . ":" . $Minutes . " PM";
                        }

                        echo '<tr><td>' . ucfirst($NameOfDay) . '</td><td>';
                        echo '<input type="text" class="timepicker" name="' . $DayOfWeek . '.Open" placeholder="Open" style="width: 48%;" value="' . $Open . '"/>  ';
                        echo '<input style="width: 48%;" type="text" class="timepicker" name="' . $DayOfWeek . '.Close" value="' . $Close . '" placeholder="Close" /></td></tr>';
                    }

                        function hours($Restaurant, $DayOfWeek){
                            $NameOfDay = array("sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday");
                            $NameOfDay = $NameOfDay[$DayOfWeek-1];
                            $Open = "";
                            $Close = "";
                            $Hours = $Restaurant->Hours;
                            if (isset($Hours[$DayOfWeek . ".Open"])){
                                $Open = totime($Hours[$DayOfWeek . ".Open"]);
                                $Close = totime($Hours[$DayOfWeek . ".Close"]);
                            }
                            echo '<tr><td>' . ucfirst($NameOfDay) . '</td><td>';
                            echo '<input type="time" class="timepicker" name="' . $DayOfWeek . '.Open" placeholder="Open" style="width: 48%;" value="' . $Open . '"/>  ';
                            echo '<input style="width: 48%;" type="time" class="timepicker" name="' . $DayOfWeek . '.Close" value="' . $Close . '" placeholder="Close" /></td></tr>';
                        }

                        hours($Restaurant, 1);
                        hours($Restaurant, 2);
                        hours($Restaurant, 3);
                        hours($Restaurant, 4);

                        echo '</table></div><div class="col-xs-12 col-sm-6 opening"><table class="table days">';

                        hours($Restaurant, 5);
                        hours($Restaurant, 6);
                        hours($Restaurant, 7);
                    ?>
                </table>

            </div>


        </div>
        <div class="divider"></div>
        <div class="inputs col-xs-12 col-sm-6 opening">
            <h5 class="sidebar__subtitle">Delivery Fee</h5>
            <input type="number" name="DeliveryFee" value="<?= $Restaurant->DeliveryFee; ?>" placeholder="Delivery Fee" />
        </div>
        <div class="inputs col-xs-12 col-sm-6 opening">
            <h5 class="sidebar__subtitle">Minimum sub total for delivery</h5>
            <input type="number" name="Minimum" value="<?= $Restaurant->Minimum; ?>" placeholder="Minimum Charge" />
        </div>


        <div class="clearfix"></div>
        <hr class="shop__divider"/>
        <input type="submit" class="btn btn-primary" value="Save Changes" />
    </form>

</div>
    </div>





    <div class="col-md-6 ">


        <div class="portlet box purple ">
            <div class="portlet-title">
                <div class="caption">
                    <!--i class="fa fa-gift"></i--> Horizontal Form Height Sizing
                </div>
                <div class="tools">

                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" role="form">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Large Input</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-lg" placeholder="Large Input">
                            </div>
                        </div>

                    </div>
                    <div class="form-actions right1">
                        <button type="button" class="btn default">Cancel</button>
                        <button type="submit" class="btn green">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>




    <div class="clearfix"></div>
    <hr class="shop__divider"/>
    <input type="submit" class="btn btn-primary" value="Save Changes" />
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.timepicker').timepicker( {
            showAnim: 'blind'
        } );
    });
</script>

