<div class="col-md-12">
    <?php echo $this->element('user_menu');?>
    <div class="col-xs-10  col-sm-9">
        <div class="deleteme">
            <h3 class="sidebar__title">Address Manager</h3>
            <hr class="shop__divider">
            <div class="dashboard">


<fieldset><div class="form-group"><?php
    include_once("common/api.php");

    $ID = "";
    if (isset($_GET["ID"])) {
        $ID = $_GET["ID"];
    }
    $didit=false;
    foreach($Addresses as $theAddress){
        if($theAddress->ID == $ID){
            $Address = $theAddress;
        }
        echo '<A HREF="' . $this->request->webroot . 'users/addresses?ID=' . $theAddress->ID . '"><div class="col-lg-3">';
            echo $theAddress->Name . "<BR>" . $theAddress->Number . " " . $theAddress->Street . "<BR>" . $theAddress->City . " " . $theAddress->Province . "<BR>" . $theAddress->PostalCode;
        echo '</DIV></A>';
        $didit=true;
    }
    if(!$didit){
        echo '<div class="col-lg-10">No addresses found</DIV>';
    }
?></div></fieldset>


<form action="" class="form-horizontal" method="post">
    <?php
        $isset=isset($Address);
        include_once("common/api.php");
        echo '<INPUT TYPE="HIDDEN" NAME="ID" VALUE="' . $ID . '">';
    ?>
    <INPUT TYPE="HIDDEN" NAME="action" ID="action" VALUE="save.bypass">
    <fieldset>
        <div class="form-group">
            <label class="col-lg-4 control-label" for="Name">Name of the address<span class="require">*</span></label>
            <div class="col-lg-4">
                <input type="text" name="Name" required class="form-control" value="<?php if($isset) {echo $Address->Name; } ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-4 control-label" for="Name">Number <span class="require">*</span></label>
            <div class="col-lg-1">
                <input type="text" name="Number" required class="form-control" value="<?php if($isset) {echo $Address->Number; } ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-4 control-label" for="Name">Street <span class="require">*</span></label>
            <div class="col-lg-4">
                <input type="text" name="Street" required class="form-control" value="<?php if($isset) {echo $Address->Street; } ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-4 control-label" for="Name">Apartment/Unit/Room</label>
            <div class="col-lg-1">
                <input type="text" name="Apt" class="form-control" value="<?php if($isset) {echo $Address->Apt; } ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-4 control-label" for="Name">Buzz code/doorbell number</label>
            <div class="col-lg-1">
                <input type="text" name="Buzz" class="form-control" value="<?php if($isset) {echo $Address->Buzz; } ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-4 control-label" for="Name">City <span class="require">*</span></label>
            <div class="col-lg-4">
                <SELECT Name="City" ID="City" required class="form-control">
                    <OPTION>Select a province first</OPTION>
                </SELECT>
            </DIV>
        </div>

        <div class="form-group">
            <label class="col-lg-4 control-label" for="Name">Province <span class="require">*</span></label>
            <div class="col-lg-4">
                <?php
                    $Province = "";
                    if($isset) {$Province = $Address->Province; }
                    provinces("Province", $Province, "English", false, "changeprov();");
                ?>
            </DIV>
        </div>

        <div class="form-group">
            <label class="col-lg-4 control-label" for="Name">Postal Code <span class="require">*</span></label>
            <STRONG>This is not used to verify your address (yet). Please make sure the address is correct.</STRONG>
            <div class="col-lg-1">
                <input type="text" name="PostalCode" class="form-control" value="<?php if($isset) {echo $Address->PostalCode; } ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-4 control-label" for="Name">Phone Number <span class="require">*</span></label>
            <STRONG>Include any neccesary extensions</STRONG>
            <div class="col-lg-2">
                <input type="text" name="Phone" class="form-control" value="<?php if($isset) {echo format_phone($Address->Phone); } ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-4 control-label" for="Name">Country</label>
            <div class="col-lg-4">
                <SELECT Name="Country" required ID="Country" class="form-control">
                    <OPTION>Canada</OPTION>
                </SELECT>
            </DIV>
        </div>

        <div class="form-group">
            <label class="col-lg-4 control-label" for="Name">Notes</label>
            <div class="col-lg-7">
                <input type="text" name="Notes" class="form-control" value="<?php if($isset) {echo $Address->Notes; } ?>">
            </div>
        </div>
    </fieldset>

    <div class="row">
        <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
            <button class="btn btn-primary" type="submit"><?php if($isset) {echo 'Save';} else {echo 'Create an address';} ?></button>
            <button onclick="window.location = '<?= $this->request->webroot; ?>users/addresses';" class="btn btn-default" type="button">Cancel</button>
            <?php
                if ($isset){
                    echo '<BUTTON class="btn btn-danger" onclick="confirmdelete();" type="button">Delete</BUTTON>';
                } else {
                    //echo '<input class="btn btn-warning" onclick="changeaction();" type="submit" value="Search" title="Use this to search for hotels/hospitals or other landmarks">';
                }
            ?>
        </div>
    </div>
</FORM>

<script>
    function clearselect(ID){
        document.getElementById(ID).innerHTML = "";
    }
    function addselectoption(ID, Value, Text){
        var element = document.getElementById(ID);
        var option = document.createElement("option");
        option.value = Value;
        option.text = Text;
        element.add(option);
    }
    function selectoption(ID, Value){
        document.getElementById(ID).value=Value;
    }

    function changeprov(){
        var element = document.getElementById("Province");
        clearselect("City");
        switch(element.value){
            case "ON":
                addselectoption("City", "HAMILTON", "Hamilton");
                break;
            default:
                addselectoption("City", "", "This province is not supported yet");
                break;
        }
    }

    selectoption("Province", "ON");
    changeprov();

    <?php if($isset) { ?>
        function confirmdelete(){
            if (confirm("Are you sure you want to delete '<?= addslashes($Address->Name); ?>'?")){
                window.location = window.location + "&action=delete";
            }
        }
    <?php } ?>

    function changeaction(){
        var element = document.getElementById("action");
        element.value = "search";
    }
</script>



            </div>
            <div class="clearfix  hidden-xs"></div>
        </div>
        <hr class="shop__divider">
    </div>
</div>

