<?= $Manager->fileinclude(__FILE__); ?>
<link rel="stylesheet" href="<?php echo $this->request->webroot; ?>scripts/ui-1.10.0/ui-lightness/jquery-ui-1.10.0.custom.min.css" type="text/css" />
<link href="<?php echo $this->request->webroot; ?>css/timepicker.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $this->request->webroot; ?>scripts/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="<?php echo $this->request->webroot; ?>scripts/ui-1.10.0/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="<?php echo $this->request->webroot; ?>scripts/ui-1.10.0/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="<?php echo $this->request->webroot; ?>scripts/ui-1.10.0/jquery.ui.tabs.min.js"></script>
<script type="text/javascript" src="<?php echo $this->request->webroot; ?>scripts/ui-1.10.0/jquery.ui.position.min.js"></script>
<script src="<?php echo $this->request->webroot; ?>scripts/timepicker.js" type="text/javascript"></script>

<form action="" method="post" class="form-horizontal form-restaurants">
    <div class="row margin-bottom-20">
        <div class="col-md-4 col-sm-4 profilepic">
            <p>
                <strong>Restaurant Image</strong><br /><br />
                <img id="picture" src="<?=$this->request->webroot."/img/default.png"; ?>" title="" style="width: 100%;"  /><br />
                <a href="javascript:void(0);" id="uploadbtn" class="btn btn-success">Change Image</a>
            </p>
        </div>
        <div class="col-md-8 col-sm-8 row">
        <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
            <strong>Restaurant Info</strong><br /><br />
            <!--<p class="inputs">-->
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <label class="col-lg-12 col-sm-12 control-label col-xs-12 margin-bottom-10" for="Name">Restaurant Name <span class="require">*</span></label>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                      <input type="text" name="Name" class="form-control" value="<?= $Restaurant->Name; ?>" placeholder="i.e. Pho" />
                    </div>
                </div>
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <label class="col-lg-12 col-sm-12 control-label col-xs-12 margin-bottom-10" for="Email">Restaurant Email <span class="require">*</span></label>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                      <input type="text" name="Email" class="form-control" value="<?= $Restaurant->Email; ?>" placeholder="i.e. Pho@didueat.com" />
                    </div>
                </div>
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <label class="col-lg-12 col-sm-12 control-label col-xs-12 margin-bottom-10" for="Phone">Phone Number <span class="require">*</span></label>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                      <input type="text" name="Phone" class="form-control" value="<?= $Restaurant->Phone; ?>" placeholder="i.e.905 555 5555" />
                    </div>
                </div>
                </div>
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <div class="row">
            <p class="inputs">
                <label class="col-lg-12 col-sm-12 control-label col-xs-12 margin-bottom-10" for="desc">Description </label>
                <!--input type="text" name="cuisine" placeholder="Cuisine" value="<?php echo $res['Restaurant']['cuisine'];?>" /-->
                <div class="col-lg-12 col-sm-12 col-xs-12"><textarea name="Description" placeholder="Description" title="Description"><?= $Restaurant->Description; ?></textarea>
                </div>
            </p>
        </div>
        </div>
                <div class="clearfix"></div>
                <h2>Address</h2>
                 <div class="form-group col-md-6 col-sm-6 col-xs-12">
                 <div class="row">
                    <label class="col-lg-12 col-md-12 col-sm-12 control-label col-xs-12 margin-bottom-10" for="Postal_Code">Country <span class="require">*</span></label>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php   makeselect("Country", $Restaurant->Country, array("CA" => "Canada"));?>
                    </div>
                 </div>
                 </div>
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <div class="row">
                    <label class="col-lg-12 col-md-12 col-sm-12 control-label col-xs-12 margin-bottom-10" for="Postal_Code">Province <span class="require">*</span></label>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php provinces("Province", $Restaurant->Province);?>
                    </div>
                 </div>
                 </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <label class="col-lg-12 col-sm-12 col-md-12 control-label col-xs-12 margin-bottom-10" for="Street_Address">Street Address <span class="require">*</span></label>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                      <input type="text" name="Address" class="form-control" value="<?= $Restaurant->Address; ?>" placeholder="i.e. 1230 Main Street East" />
                    </div>
                </div>
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <label class="col-lg-12 col-md-12 col-sm-12 control-label col-xs-12 margin-bottom-10" for="City">City <span class="require">*</span></label>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <input type="text" name="City" class="form-control" value="<?= $Restaurant->City; ?>" placeholder="i.e. Hamilton" />
                    </div>
                </div>
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <label class="col-lg-12 col-md-12 col-sm-12 control-label col-xs-12 margin-bottom-10" for="Postal_Code">Postal Code <span class="require">*</span></label>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <input type="text" name="PostalCode" class="form-control" value="<?= $Restaurant->PostalCode; ?>" placeholder="i.e. L9A 1V7" />
                    </div>
                </div>
                </div>

                <!--<input type="text" name="Name" placeholder="Restaurant Name" title="Restaurant Name" value="<?= $Restaurant->Name; ?>" />-->
                <!--<input type="text" name="Email" placeholder="Restaurant Email" title="Restaurant Email" value="<?= $Restaurant->Email; ?>" />-->
                <!--<input type="text" name="Phone" placeholder="Phone" title="Phone" value="<?= $Restaurant->Phone; ?>" />-->
                <!--<input type="text" name="Address" placeholder="Street Address" title="Street Address" value="<?= $Restaurant->Address; ?>" />-->
                <!--<input type="text" name="City" placeholder="City" title="City" value="<?= $Restaurant->City; ?>" />-->
                
                 
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <div class="row">
                    <label class="col-lg-12 col-md-12 col-sm-12 control-label col-xs-12 margin-bottom-10" for="Postal_Code">Genre <span class="require">*</span></label>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php   makeselect("Genre", $Restaurant->Genre, $Genres);?>
                    </div>
                 </div>
                 </div>
                

            <!--</p>-->
           
        </div>
       

        <hr class="divider" />

        <div class="row">


            <div class="col-xs-12 col-sm-12 col-md-12"><h5 class="sidebar__subtitle" style="width: 100%;">Hours of Operation</h5></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-12 col-md-12 opening">



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
        <div class="row">
        <div class="inputs col-xs-12 col-sm-6 opening">
            <h5 class="sidebar__subtitle">Delivery Fee</h5>
            <input type="number" name="DeliveryFee" value="<?= $Restaurant->DeliveryFee; ?>" placeholder="Delivery Fee" />
        </div>
        <div class="inputs col-xs-12 col-sm-6 opening">
            <h5 class="sidebar__subtitle">Minimum sub total for delivery</h5>
            <input type="number" name="Minimum" value="<?= $Restaurant->Minimum; ?>" placeholder="Minimum Charge" />
        </div>
        </div>


        <div class="clearfix"></div>
        <hr class="shop__divider"/>
        <input type="submit" class="btn btn-primary" value="Save Changes" />
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.timepicker').timepicker( {
            showAnim: 'blind'
        } );
    });
</script>

