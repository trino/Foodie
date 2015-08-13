<?php

use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

function languages($includeDebug = false){
    $acceptablelanguages = getColumnNames("strings", array("ID", "Name"), true);
    if ($includeDebug){
        $acceptablelanguages[] = "Debug";
    }
    return $acceptablelanguages;
}

$SQLfile = getcwd() .  "/strings.sql";
if (file_exists($SQLfile)) {//Check for translation update in /webroot/strings.sql
    $Table = TableRegistry::get('strings');
    $LastUpdate = $Table->find()->select()->where(["Name" => "Date"])->first();
    if($LastUpdate){$LastUpdate = $LastUpdate->English;} else {$LastUpdate = 0;}
    $UpdateFile = filemtime($SQLfile);
    if ($LastUpdate < $UpdateFile) {
        //echo "<SCRIPT>alert('Applying translation update');</SCRIPT>";//silent, so no one will know I did anything...
        $SQLfile = getSQL($SQLfile);
        if ($SQLfile) {
            $db = ConnectionManager::get('default');
            $db->execute("TRUNCATE TABLE strings;");
            $db->execute($SQLfile);
            $Table->query()->update()->set(['English' => $UpdateFile])->where(['Name' => "Date"])->execute();
        }
    }
}

function getSQL($Filename){
    $File = file_get_contents($Filename);
    $Start = strpos($File, "--", strpos($File, "Dumping data for table ")) + 3;
    $End = strpos($File, "/*", $Start);
    return substr($File, $Start, $End-$Start);
}

function getIterator($Objects, $Fieldname, $Value){
    foreach($Objects as $Object){
        if ($Object->$Fieldname == $Value){
            return $Object;
        }
    }
    return false;
}

function left($text, $length){
    return substr($text,0,$length)	;
}
function right($text, $length){
    return substr($text, -$length);
}

function makeselect($Name, $Value, $Data){
    echo '<SELECT name="' . $Name . '" class="form-control">';
    foreach($Data as $Key => $Title){
        makeselectoption($Key, $Title, $Value);
    }
    echo '</SELECT>';
}

function makeselectoption($Value, $Text, $UserSetting = ""){
    echo '<OPTION value="' . $Value . '"';
    if ($UserSetting == $Value || $UserSetting == $Text){
        echo ' SELECTED';
    }
    echo '>' . $Text . '</OPTION>';
}

function provinces($name, $value, $Language = "English", $IncludeUSA = False, $onchange =""){
    echo '<SELECT id="' . $name . '" name="' . $name . '" class="form-control"';
    if($onchange){echo ' onchange="' . $onchange . '"  onclick="' . $onchange . '"'; }
    echo '>';
    $acronyms = getprovinces("Acronyms", $IncludeUSA);
    $Provinces = getprovinces($Language, $IncludeUSA);
    $ID=0;
    foreach($acronyms as $acronym){
        makeselectoption($acronym, $Provinces[$ID], $value);
        $ID++;
    }
    echo '</SELECT>';
}


function getprovinces($Language = "English", $IncludeUSA = False){
    $Trans="";
    if($Language == ""){$Language = $GLOBALS["language"];}
    if($Language == "Debug"){
        $Language = "English";
        $Trans = " [TRANS]";
    }
    switch ($Language){
        case "Acronyms":
            $Trans="";//these are keys, and must not be altered in any way
            $provinces = array("", "AB", "BC", "MB", "NB", "NL", "NT", "NS", "NU", "ON", "PE", "QC", "SK", "YT");
            if($IncludeUSA) {$states = array("AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "FL", "GA", "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD", "MA", "MI", "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ", "NM", "NY", "NC", "ND", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VT", "VA", "WA", "WV", "WI", "WY");}
            break;
        case "English":
            $provinces = array("Select Province", "Alberta", "British Columbia", "Manitoba", "New Brunswick", "Newfoundland and Labrador", "Northwest Territories", "Nova Scotia", "Nunavut", "Ontario", "Prince Edward Island", "Quebec", "Saskatchewan", "Yukon Territories");
            if($IncludeUSA) {$states = array("Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina", "North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "Virginia", "Wisconsin", "Wyoming");}
            break;
        case "French":
            $provinces = array("Choisir la province", "Alberta", "Colombie-Britannique", "Manitoba", "Nouveau-Brunswick", "Terre-Neuve-et-Labrador", "Territoires du Nord-Ouest", "Nouvelle-Écosse", "Nunavut", "Ontario", "Île-du-Prince-Édouard", "Québec", "Saskatchewan", "Yukon");
            if($IncludeUSA) {$states = array("Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiane", "Maine", "Maryland", "Massachusetts ", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "Nouveau-Mexique", "New York", "Nord Carolina", "le Dakota du Nord", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "Caroline du Sud", "Dakota du Sud", "Tennessee", "Texas", "Utah ", "Vermont", "Virginia", "Washington", "Virginia", "Wisconsin", "Wyoming");}
            break;
        default:
            echo "Please add support for '" . $Language . "' in subpages/api.php (getprovinces)";
            die();
    }
    if($IncludeUSA) {$provinces = array_merge($provinces, $states);}
    $provinces = addTrans($provinces, $Trans);//debug mode
    return $provinces;
}

function addTrans($array, $Trans = ""){
    if($Trans){
        foreach($array as $Key => $Value){
            $array[$Key] = $Value . $Trans;
        }
    }
    return $array;
}

function format_phone($phone) {
    if(!isset($phone{3})) { return ''; }// note: making sure we have something
    $phone = preg_replace("/[^0-9]/", "", $phone);// note: strip out everything but numbers
    $length = strlen($phone);
    switch($length) {
        case 7:
            return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phone);
            break;
        case 10:
            return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone);
            break;
        case 11:
            return preg_replace("/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/", "$1($2) $3-$4", $phone);
            break;
        default:
            return $phone;
            break;
    }
}

function getColumnNames($Table, $ignore = "", $justColumnNames = false){
    $Columns = TableRegistry::get($Table)->schema();
    $Data = getProtectedValue($Columns, "_columns");
    if ($Data) {
        if (is_array($ignore)) {
            foreach ($ignore as $value) {
                unset($Data[$value]);
            }
        } elseif ($ignore) {
            unset($Data[$ignore]);
        }
        if ($justColumnNames){
            return array_keys($Data);
        }
        return $Data;
    }
    //}
}

function getProtectedValue($obj,$name) {
    $array = (array)$obj;
    $prefix = chr(0).'*'.chr(0);
    return $array[$prefix.$name];
}
?>