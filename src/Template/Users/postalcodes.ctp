<FORM>
<INPUT TYPE="TEXT" NAME="src" <?php if (isset($_GET["src"])){echo ' VALUE="' . $_GET["src"] . '"';} ?>>
<INPUT TYPE="TEXT" NAME="dest" <?php if (isset($_GET["dest"])){echo ' VALUE="' . $_GET["dest"] . '"';} ?>>
<INPUT TYPE="SUBMIT">
</FORM>

<?php
    if (isset($_GET["src"]) && isset($_GET["dest"])){
        echo "Distance between " . $_GET["src"] . " and " . $_GET["dest"] . ": " . $Manager->get_distance_postal($_GET["src"], $_GET["dest"]) . " KM";
    }
?>