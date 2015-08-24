<div class="col-md-12">
    <?= $this->element('user_menu');?>
    <div class="col-xs-10  col-sm-9">
        <div class="grid">
            <h3 class="sidebar__title">Image Manager</h3>
            <hr class="shop__divider">
            <div class="dashboard">

<?php if($userID) { ?>

    <IMG STYLE="display: none;" id="preview">
    <FORM style="display: none" id="editform">
        <IMG ID="thumbnail" src="">
        <INPUT TYPE="hidden" name="filename" id="filename">
        <SELECT>
            <OPTION>Pho</OPTION>
        </SELECT>
        <INPUT TYPE="text" name="Receipt" id="receipt">
    </FORM>

<div class="input-icon">
    <br/>
    <a class="btn btn-xs  btn-success   margin-t10" href="javascript:void(0)" id="clientimg" onclick="initiate_ajax_upload('clientimg');">
        <i class="fa fa-image"></i>
        Add Image
    </a>
</div>

<TABLE border="1" bordercolor="#CE0B10">
    <?php
        function getextension($path) {
            return strtolower(pathinfo($path, PATHINFO_EXTENSION));// extension only, no period
        }

        $dir = "img/users/" . $userID;
        $Files = scandir($dir);
        unset($Files[0]);
        unset($Files[1]);
        $dir = $this->request->webroot . $dir . "/";
        $ID = 0;
        foreach ($Files as $File) {
            if (getextension($File) != "th") {
                $Data = $Manager->get_profile_image($File, $userID);
                $Title = "";
                $RestaurantID = "";
                if ($Data){
                    $Title = $Data->Title;
                    $RestaurantID = $Data->RestaurantID;
                }
                echo '<TD><A HREF="' . $dir . $File . '" ID="img' . $ID . '" restaurant="' . $RestaurantID . '" title="' . $Title . '" onclick="return previewimage(' . "'img" . $ID . "'" . ');"><IMG SRC="' . $dir . $File . '.th" style="border-bottom:1px solid #CE0B10"></A><BR>';

                echo '<A HREF="?action=edit&file=' . $File . '" onclick="return edit(' . "'img" . $ID . "'" . ');" >Edit</A>';
                echo '<A HREF="?action=delete&file=' . $File . '" onclick="return confirm(' . "'Are you sure you want to delete this image?'" . ');" style="float: right;">Delete</A></TD>';
                $ID++;
            }
        }
    ?>
</TABLE>

<SCRIPT>
    function show(ID){
        var element = document.getElementById(ID);
        element.setAttribute("style", "display: block;");
    }
    function hide(ID){
        var element = document.getElementById(ID);
        element.setAttribute("style", "display: none;");
    }

    function edit(ID){
        hide("preview");
        show("editform");

        var element = document.getElementById(ID);
        var URL = element.getAttribute("HREF");
        var Title = element.getAttribute("title");
        var RestID = element.getAttribute("restaurant");

        document.getElementById("thumbnail").setAttribute("src", URL + ".th")

        return false;
    }

    function previewimage(ID){
        var element = document.getElementById(ID);
        var URL = element.getAttribute("HREF");
        element = document.getElementById("preview");
        element.setAttribute("src", URL);
        element.setAttribute("style", "display: block;");
        hide("editform");
        return false;
    }
    function initiate_ajax_upload(button_id) {
        var button = $('#' + button_id), interval;
        new AjaxUpload(button, {
            action: "<?= $this->request->webroot; ?>users/upload/<?= $Manager->read("ID"); ?>",
            name: 'myfile',
            onSubmit: function (file, ext) {
                this.disable();
            },
            onComplete: function (file, response) {
                this.enable();
                location.reload();
            }
        });
    }
</SCRIPT>
<?php } else {
    echo '<div class="alert alert-danger" style="margin: 0px 10px;">You need to login first</div><P>';
} ?>

            </div>
            <div class="clearfix  hidden-xs"></div>
        </div>
        <hr class="shop__divider">
    </div>
</div>


