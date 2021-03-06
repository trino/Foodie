<?php
include_once("common/api.php");
?>
<div class="main">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="content-page row">
    <?php echo $this->element('user_menu');?>
    <div class="col-xs-12  col-sm-9">
        <div class="deleteme">
            <h3 class="sidebar__title">Event Log</h3>
            <hr class="shop__divider">
            <div class="dashboard">
                <table class="table table-theme table-striped">
                <THEAD>
                    <TR>
                        <TH>ID</TH>
                        <TH>Time</TH>
                        <TH>User</TH>
                        <TH>Event</TH>
                    </TR>
                </THEAD>
                    <TBODY>
                        <?php
                            include_once("common/api.php");

                            foreach($Events as $Event){
                                $Profile = getIterator($Profiles, "ID", $Event->UserID);
                                echo '<TR><TD>' . $Event->ID . '</TD>';
                                echo '<TD>' . $Event->Date . '</TD>';
                                echo '<TD>' . $Event->UserID . " (";
                                if ($Profile){ echo $Profile->Name; } else { echo "[Deleted user]";}
                                echo ')</TD>';
                                echo '<TD>' . $Event->Text . '</TD></TR>';
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
