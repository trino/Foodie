<?php
include_once("common/api.php");
?>
<div class="col-md-12">
    <?php echo $this->element('user_menu');?>
    <div class="col-xs-10  col-sm-9">
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
                                echo '<TD>' . $Event->UserID . " (" . $Profile->Name . ')</TD>';
                                echo '<TD>' . $Event->Text . '</TD></TR>';
                            }
                        ?>
                    </TBODY>
                </TABLE>

                <div class="clearfix  hidden-xs"></div>
            </div>
            <hr class="shop__divider">
        </div>
    </div>