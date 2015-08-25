<div class="main">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="content-page row">
    <?= $this->element('user_menu');?>
    <div class="col-xs-10  col-sm-9">
        <div class="grid">
            <h3 class="sidebar__title">Image Manager</h3>
            <hr class="shop__divider">
            <div class="dashboard">

<?php if($userID) { ?>

    <IMG STYLE="display: none;" id="preview">
    <INPUT TYPE="hidden" ID="ID">
    <FORM style="display: none" id="editform">
        <TABLE>
            <TR>
                <TD rowspan="3">
                    <IMG ID="thumbnail" src="">
                    <INPUT TYPE="hidden" name="action" value="edit.bypass">
                    <INPUT TYPE="hidden" name="filename" id="filename">
                    <INPUT TYPE="hidden" name="UserID" value="<?= $userID; ?>">
                </TD>
                <TH>Restaurant:</TH>
                <TD>
                    <SELECT Name="RestaurantID" id="RestaurantID" class="form-control">
                        <?php
                            foreach($Restaurants as $Restaurant){
                                echo '<OPTION VALUE="' . $Restaurant->ID . '">' . $Restaurant->Name . '</OPTION>';
                            }
                        ?>
                    </SELECT>
                </TD>
            </TR>
            <TR>
                <TH>Order ID:</TH>
                <TD><INPUT TYPE="text" name="OrderID" id="orderid" class="form-control" title="to be replaced with a dropdown of your orders"></TD>
            </TR>
            <TR>
                <TH>Title:</TH>
                <TD><INPUT TYPE="text" name="Title" id="Title" class="form-control"></TD>
            </TR>
            <TR>
                <TD colspan="3"><CENTER><INPUT TYPE="button" value="Save" id="save" class="btn btn-success" onclick="savedetails();"></CENTER></TD>
            </TR>
        </TABLE>
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
                $OrderID = "";
                if ($Data){
                    $Title = $Data->Title;
                    $RestaurantID = $Data->RestaurantID;
                    $OrderID = $Data->OrderID;
                }
                echo '<TD><A HREF="' . $dir . $File . '" ID="img' . $ID . '" restaurant="' . $RestaurantID . '" orderid="' . $OrderID . '" title="' . $Title . '" onclick="return previewimage(' . "'img" . $ID . "'" . ');"><IMG SRC="' . $dir . $File . '.th" style="border-bottom:1px solid #CE0B10"></A><BR>';

                echo '<A HREF="?action=edit&file=' . $File . '" onclick="return edit(' . "'img" . $ID . "'" . ');" >Edit</A>';
                echo '<A HREF="?action=delete&file=' . $File . '" onclick="return confirm(' . "'Are you sure you want to delete this image?'" . ');" style="float: right;">Delete</A></TD>';
                $ID++;
            }
        }
    ?>
</TABLE>

<SCRIPT>
    function getURL(url){
        return url.substring(0, url.lastIndexOf("/") + 1);
    }
    function getFileName(url) {
        url = url.substring(0, (url.indexOf("#") == -1) ? url.length : url.indexOf("#"));//this removes the anchor at the end, if there is one
        url = url.substring(0, (url.indexOf("?") == -1) ? url.length : url.indexOf("?"));//this removes the query after the file name, if there is one
        return url.substring(url.lastIndexOf("/") + 1, url.length);//this removes everything before the last slash in the path
    }

    function show(ID){
        var element = document.getElementById(ID);
        element.setAttribute("style", "display: block;");
    }
    function hide(ID){
        var element = document.getElementById(ID);
        element.setAttribute("style", "display: none;");
    }
    function selectoption(ID, value){
        document.getElementById(ID).value=value;
    }
    function getselectedoption(ID){
        var e = document.getElementById(ID);
        e.options[e.selectedIndex].value;
    }

    function edit(ID){
        hide("preview");
        show("editform");

        var element = document.getElementById(ID);
        var URL = element.getAttribute("HREF");
        var Title = element.getAttribute("title");
        var RestID = element.getAttribute("restaurant");
        var OrderID = element.getAttribute("orderid");

        selectoption("RestaurantID", RestID);

        document.getElementById("thumbnail").setAttribute("src", URL + ".th");
        document.getElementById("filename").setAttribute("value", getFileName(URL));
        document.getElementById("orderid").setAttribute("value", OrderID);
        document.getElementById("Title").setAttribute("value", Title);

        document.getElementById("ID").setAttribute("value", ID);
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

    function getform(ID){
        return $('#' + ID).serialize();
    }

    function savedetails(){
        var element = document.getElementById("save");
        element.setAttribute("value", "Saving...");
        element.disabled = true;

        $.ajax({
            url: "<?php echo $this->request->webroot;?>users/images",
            type: "post",
            dataType: "HTML",
            data: getform("editform"),
            success: function (msg) {
                element.setAttribute("value", "Save");
                element.disabled = false;
                var ID = document.getElementById("ID").getAttribute("value");
                element = document.getElementById(ID);

                var obj = JSON.parse(msg);
                var Title =  obj["Title"];
                var RestID =  obj["RestaurantID"];
                var OrderID =  obj["OrderID"];

                element.setAttribute("title", Title);
                element.setAttribute("restaurant", RestID);
                element.setAttribute("orderid", OrderID);
            }
        })
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
</div>
</div>

