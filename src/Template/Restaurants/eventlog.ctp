<TABLE border="2">
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
            include_once("subpages/api.php");

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
