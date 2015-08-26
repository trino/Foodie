<?php
include_once("common/api.php");
?>

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="content-page row">
    <?php echo $this->element('user_menu');?>
    <div class="col-xs-10  col-sm-8">
        <div class="grid">
            <h3 class="sidebar__title">Notification Addresses</h3>
            <hr class="shop__divider">
            <div class="dashboard">
                <table class="table table-theme table-striped">
                    <THEAD>
                    <TR>
                        <TH>ID</TH>
                        <TH>Type</TH>
                        <TH>Phone Number/Email Address</TH>
                        <TH>Actions</TH>
                    </TR>
                    </THEAD>
                    <TBODY>
                    <?php
                        $MaxAdd = 3;
                        $Emails = printAddresses($Addresses, "Email", $RestaurantID);
                        $Phones = printAddresses($Addresses, "Phone", $RestaurantID);

                        function printAddresses($Addresses, $Type, $RestaurantID){
                            $Index = 0;
                            $TDs = "</TD><TD>";
                            foreach ($Addresses[$Type] as $Address){
                                $Index++;
                                echo "<TR><TD>" . $Index . $TDs . $Type  . $TDs . $Address . $TDs;
                                echo '<A HREF="?action=deactivate&RestaurantID=' . $RestaurantID . '&address=' . $Address . '" onclick="return confirm(' . "'Are you sure you want to deactivate " . addslashes($Address) . "?'" . ');">Deactivate</A>';
                                echo "</TD></TR>";
                            }
                            return $Index;
                        }
                        if($Emails < $MaxAdd || $Phones < $MaxAdd){
                            $TDs = "</TD><TD>";
                            echo '<FORM method="get"><INPUT TYPE="hidden" name="action" value="activate"><INPUT TYPE="hidden" name="RestaurantID" value="' . $RestaurantID. '">';
                            echo '<TR><TD COLSPAN="2">New' . $TDs . '<INPUT TYPE="TEXT" NAME="address" style="width:100%;">' . $TDs . '<INPUT TYPE="SUBMIT" VALUE="Activate"></FORM></TD></TR>';
                        }
                    ?>
                    </TBODY>
                </TABLE>
                <div class="clearfix  hidden-xs">
                </div>
            </div>
            <hr class="shop__divider">

                <h3 class="sidebar__title">Employee Addresses</h3>
                <hr class="shop__divider">
                <div class="dashboard">
                <table class="table table-theme table-striped">
                    <THEAD>
                    <TR>
                        <TH>ID</TH>
                        <TH>Name</TH>
                        <TH>Phone Numbers/Email Addresses</TH>
                    </TR>
                    <TBODY>
                        <?php
                            function is_active($Manager, $Addresses, $NewAddress){
                                $Type = array("Email", "Phone");
                                $Type = $Type[$Manager->data_type($NewAddress)];
                                foreach($Addresses[$Type] as $Address){
                                    if ($Address == $NewAddress){
                                        return true;
                                    }
                                }
                                return false;
                            }

                            function printaddress($Manager, $Addresses, $NewAddress, $RestaurantID){
                                $is_active = is_active($Manager, $Addresses, $NewAddress);
                                $Action = "Activate";
                                if ($is_active){$Action = "Deactivate";}
                                echo '<A HREF="' . $Manager->webroot() . '/restaurants/addresses?action=' . strtolower($Action) . '&RestaurantID=' . $RestaurantID . '&address=' . $NewAddress . '" class="btn-xs btn-info" style="color: black;">' . $Action . ": " . $NewAddress . '</A> ';
                            }

                            foreach($Employees as $Employee){
                                $EmployeeAddresses = $Manager->enum_profile_addresses($Employee->ID);
                                echo '<TR><TD>' . $Employee->ID . '</TD><TD>' . $Employee->Name . '</TD><TD>';
                                printaddress($Manager, $Addresses, $Employee->Email, $RestaurantID);
                                printaddress($Manager, $Addresses, $Employee->Phone, $RestaurantID);
                                foreach($EmployeeAddresses as $Address){
                                    printaddress($Manager, $Addresses, $Address->Phone, $RestaurantID);
                                }
                                echo '</TR>';
                            }
                        ?>
                    </TBODY>
                </TABLE>
                    <div class="clearfix  hidden-xs">
                    </div>
                </div>
            <hr class="shop__divider">
    </div>
</div>
</div>
</div>