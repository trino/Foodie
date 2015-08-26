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
                                echo '<A HREF="?action=delete&RestaurantID=' . $RestaurantID . '&address=' . $Address . '" onclick="return confirm(' . "'Are you sure you want to delete " . addslashes($Address) . "?'" . ');">Delete</A>';
                                echo "</TD></TR>";
                            }
                            return $Index;
                        }
                        if($Emails < $MaxAdd || $Phones < $MaxAdd){
                            $TDs = "</TD><TD>";
                            echo '<FORM method="get"><INPUT TYPE="hidden" name="action" value="addaddress"><INPUT TYPE="hidden" name="RestaurantID" value="' . $RestaurantID. '">';
                            echo '<TR><TD COLSPAN="2">New' . $TDs . '<INPUT TYPE="TEXT" NAME="address" style="width:100%;">' . $TDs . '<INPUT TYPE="SUBMIT"></FORM></TD></TR>';
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