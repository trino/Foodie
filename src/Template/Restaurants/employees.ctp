<?php
    include_once("common/api.php");
    $myType = getIterator($ProfileTypes, "ID", $Profile->ProfileType);
?>

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="content-page row">
    <?php echo $this->element('user_menu');?>
    <div class="col-xs-12 col-md-9 col-sm-8">
        <div class="deleteme">
            <h3 class="sidebar__title">Employee Manager</h3>
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
                    <TR>
                        <FORM method="get">
                            <TD><INPUT type="HIDDEN" id="action" NAME="action" value="newemployee"></TD>
                            <TD><INPUT type="text" name="Name" style="width: 100%" value="<?php if (isset($_GET["Name"])) {echo $_GET["Name"];} ?>"></TD>
                            <TD><INPUT type="email" name="Email" style="width: 100%" value="<?php if (isset($_GET["Email"])) {echo $_GET["Email"];} ?>"></TD>
                            <TD><INPUT type="phone" name="Phone" style="width: 100%" value="<?php if (isset($_GET["Phone"])) {echo format_phone($_GET["Phone"]);} ?>"></TD>
                            <TD>
                                <SELECT name="ProfileType">
                                    <?php
                                        foreach($ProfileTypes as $ProfileType){
                                            if($ProfileType->Hierarchy > $myType) {
                                                echo '<OPTION VALUE="' . $ProfileType->ID . '">' . $ProfileType->Name . '</OPTION>';
                                            }
                                        }
                                    ?>
                                </SELECT>
                            </TD>
                            <TD align="left">
                                <INPUT type="submit" class="btn btn-info" onclick="changeaction('usersearch');" value="Search">
                                <INPUT type="submit" class="btn btn-primary" value="Create">
                            </TD>
                        </FORM>
                    </TR>

<?php
    function printemployee($Me, $myType, $Employee, $ProfileTypes){
        if($Employee->ID != $Me->ID){
            $ProfileType = getIterator($ProfileTypes, "ID", $Employee->ProfileType);
            $TD = '<TD ALIGN="LEFT">';
            $TDs = '</TD>' . $TD;
            echo '<TR>' . $TD . $Employee->ID . $TDs . $Employee->Name . $TDs . $Employee->Email . $TDs . format_phone($Employee->Phone) . $TDs . $ProfileType->Name . $TDs;
            if($Me->RestaurantID && $myType->CanHireOrFire) {
                if ($Employee->RestaurantID) {
                    echo '<a href="?action=fire&ID=' . $Employee->ID . '" class="btn btn-danger" onclick="return confirm(' . "'Are you sure you want to fire " . addslashes($Employee->Name) . "?'" . ');">Fire</a>';
                } else {
                    echo '<a href="?action=hire&ID=' . $Employee->ID . '" class="btn btn-primary" onclick="return confirm(' . "'Are you sure you want to hire " . addslashes($Employee->Name) . "?'" . ');">Hire</a>';
                }
            }
            if($myType->CanPossess){
                echo '<a href="?action=possess&ID=' . $Employee->ID . '" class="btn btn-info" onclick="return confirm(' . "'Are you sure you want to possess " . addslashes($Employee->Name) . "?'" . ');">Possess</a>';
            }
            echo '</TD></TR>';
            return true;
        }
    }

    if (isset($Users)){
        if (iterator_count($Users)) {
            foreach ($Users as $Employee) {
                printemployee($Profile, $myType, $Employee, $ProfileTypes);
            }
        } else {
            echo '<TR><TD colspan="5">No users found</TD></TR>';
        }
    }

    $hasemployees = false;
    foreach ($Employees as $Employee) {
        if(printemployee($Profile, $myType, $Employee, $ProfileTypes)){
            $hasemployees = true;
        }
    }
    if(!$hasemployees){
        echo '<TR><TD colspan="5">No employees found</TD></TR>';
    }
?>
                    </TBODY>
                </TABLE>
            <div class="clearfix  hidden-xs"></div>
        </div>
        <hr class="shop__divider">
    </div>
</div>
</div>
</div>
<SCRIPT>
    function changeaction(Action){
        var element = document.getElementById("action");
        element.value = Action;
    }
</SCRIPT>