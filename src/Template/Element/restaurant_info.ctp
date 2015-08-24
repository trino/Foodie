<div class="row">
    <div class="col-md-6 ">


<div>


    <form class="form-horizontal" action="" method="post">
        <div class="row">
            <div class="col-md-12 profilepic">
                <p>
                    <strong>Restaurant Image</strong><br /><br />
                    <img id="picture" src="<?=$this->request->webroot."/img/default.png"; ?>" title="" style="width: 100%;"  /><br />
                    <a href="javascript:void(0);" id="uploadbtn" class="btn btn-success">Change Image</a>
                </p>
            </div>
            <div class="col-md-12">
                <strong>Restaurant Info</strong><br /><br />
                <!--<p class="inputs">-->
                    <div class="form-group">
                        <label class="col-lg-4 control-label col-xs-12" for="Name">Name <span class="require">*</span></label>
                        <div class="col-lg-8">
                            <input class= "form-control input-md" type="text" name="Name" placeholder="i.e. Pho" title="Restaurant Name" value="<?= $Restaurant->Name; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label col-xs-12" for="Email">Email <span class="require">*</span></label>
                        <div class="col-lg-8">
                            <input class= "form-control input-md"  type="text" name="Email" placeholder="i.e. pho@gmail.com" title="Restaurant Email" value="<?= $Restaurant->Email; ?>" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-4 control-label col-xs-12" for="Phone">Phone <span class="require">*</span></label>
                        <div class="col-lg-8">
                            <input class= "form-control input-md"  type="text" name="Phone" placeholder="i.e 905 555 5555" title="Phone" value="<?= $Restaurant->Phone; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label col-xs-12" for="Address">Address <span class="require">*</span></label>
                        <div class="col-lg-8">
                            <input class= "form-control input-md"  type="text" name="Address" placeholder="i.e. 123 Main Street" title="Street Address" value="<?= $Restaurant->Address; ?>" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-4 control-label col-xs-12" for="City">City <span class="require">*</span></label>
                        <div class="col-lg-8">
                            <input class= "form-control input-md"  type="text" name="City" placeholder="i.e. Hamilton" title="City" value="<?= $Restaurant->City; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label col-xs-12" for="PostalCode">Postal Code <span class="require">*</span></label>
                        <div class="col-lg-8">
                            <input class= "form-control input-md"  type="text" name="PostalCode" placeholder="i.e L8V 4I7" title="Postal Code" value="<?= $Restaurant->PostalCode; ?>" />
                        </div>
                    </div>
                    
                    <?php
                        provinces("Province", $Restaurant->Province);
                        makeselect("Country", $Restaurant->Country, array("CA" => "Canada"));
                        echo '<BR>Genre: ';
                        makeselect("Genre", $Restaurant->Genre, $Genres);
                    ?>

                <!--</p>-->
            </div>
            <div class="col-md-12">
                <p class="inputs">
                    <strong>&nbsp;</strong><br /><br />
                    <!--input type="text" name="cuisine" placeholder="Cuisine" value="<?php echo $res['Restaurant']['cuisine'];?>" /-->
                    <textarea  rows="3" class="form-control"name="Description" placeholder="Description" title="Description"><?= $Restaurant->Description; ?></textarea>


                </p>

            </div>
            <div class="clearfix"></div>

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



            