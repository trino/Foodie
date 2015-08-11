<?php

    namespace App\Controller\Component;
    use Cake\Controller\Component;
    use Cake\ORM\TableRegistry;


    class ManagerComponent extends Component {
        ///////////////////////handles certain forms that don't point anywhere/////////////////////////////////////
        function init($Controller){
            $this->Controller = $Controller;
            $Controller->set('genres', $this->enum_genres());
            if (isset($_POST["action"])){
                switch ($_POST["action"]) {
                    case "login":
                        $profile = $this->find_profile($_POST["email"], $_POST["password"]);
                        if ($profile) {
                            $this->login($Controller, $profile);
                            $Controller->Flash->success($profile->Name . " has been logged in");
                        } else {
                            $Controller->Flash->error("The email address/password combination failed");
                        }
                        break;
                    case "editprofile":
                        $Password = "";
                        if ($this->is_email_in_use($this->read("ID"), $_POST["Email"])){
                            $Controller->Flash->error("That email address is in use already");
                        } else {
                            $doit = $_POST["Password"] == $_POST["Confirm-Password"];
                            if ($doit) {
                                $Password = $_POST["Password"];
                            } else {
                                $Controller->Flash->error("The passwords do not match");
                            }
                            if ($doit) {
                                $this->edit_profile($this->read("ID"), $_POST["Name"],  $_POST["Email"], $_POST["Phone"], $Password, isset($_POST["newsletter"]));
                                $Controller->Flash->success("Your profile has been edited");
                            }
                        }
                        break;
                    case "subscribe":
                        $Controller->loadComponent("Mailer");
                        $this->add_subscriber($_POST["email"]);
                        $Controller->Flash->success($_POST["email"] . " please check your email to confirm your subscription");
                        break;
                    case "signup":
                        if ($_POST["Password"] == $_POST["Confirm-Password"]) {
                            $_POST["Email"] = strtolower(trim($_POST["Email"]));
                            if ($this->get_entry("profiles", $_POST["Email"], "Email")){
                                $Controller->Flash->error("Email address is in use already");
                            } else {
                                $Controller->loadComponent("Mailer");
                                $this->new_profile(0, $_POST["Name"],$_POST["Password"], 2, $_POST["Email"], 0, $_POST["newsletter"]);
                                $Controller->Flash->success("Your profile has been created");
                            }
                        } else {
                            $Controller->Flash->error("The passwords do not match");
                        }
                        break;
                }
            }
            if (isset($_GET["action"])){
                switch ($_GET["action"]){
                    case "subscribe":
                        $Email = $this->finish_subscription($_GET["key"]);
                        if ($Email){
                            $Controller->Flash->success($Email . " has been subscribed");
                        } else {
                            $Controller->Flash->error("Subscription key not found");
                        }
                        break;
                }
            }
        }



        ////////////////////////////////////Profile type API//////////////////////////////////
        function new_profiletype($Name){
            $this->logevent("Made a new profile type: " . $Name, false);
            return new_anything("profiletypes", $Name);
        }
        function get_profile_permissions(){//lists all permissions
            return $this->getColumnNames("profiletypes", array("ID", "Name", "Hierarchy"));
        }
        function edit_profiletype($ID = "", $Name, $Hierarchy, $Permissions = ""){
            if(!$ID){
                $ID = $this->new_profiletype($Name);
            }
            $this->logevent("Changed profile type: " . $ID . " (" . $Name . ", " . $Hierarchy . ", " . print_r($Permissions, true) . ")", false);
            $data = array("Name" => $Name, "Hierarchy" => $Hierarchy);
            if ($Permissions == "ALL"){
                $Permissions = $this->get_profile_permissions();
            }
            if (is_array($Permissions)) {
                foreach ($Permissions as $Permission) {
                    $data[$Permission] = "1";
                }
            }
            $this->update_database("profiletypes", "ID", $ID, $data);
            return $ID;
        }

        function enum_profiletypes($Hierarchy = ""){
            $table = TableRegistry::get('profiletypes');
            if($Hierarchy){
                $entries = $table->find('all')->where(["Hierarchy >"=>$Hierarchy]);
            } else {
                $entries = $table->find('all');
            }
            return $this->iterator_to_array($entries, "ID", "Name");
        }



        ////////////////////////////////////Profile API/////////////////////////////////////////
        function read($Name){
            return $this->request->session()->read('Profile.' . $Name);
        }

        function is_email_in_use($NotByUserID, $EmailAddress){
            $EmailAddress = strtolower(trim($EmailAddress));
            return TableRegistry::get('profiles')->find('all')->where(["Email"=>$EmailAddress, "ID !=" => $NotByUserID])->first();
        }

        function salt(){
            return "18eb00e8-f835-48cb-bbda-49ee6960261f";
        }

        function enum_profiles($Key, $Value){
            return TableRegistry::get('profiles')->find('all')->where([$Key=>$Value]);
        }

        function get_profile($ID){
            return $this->get_entry("profiles", $ID);
        }
        function get_profile_type($ProfileID){
            $profiletype = $this->get_entry("profiles", $ProfileID)->ProfileType;
            return $this->get_entry("profiletypes", $profiletype);
        }
        function can_profile_create($ProfileID, $ProfileType){
            $creatorprofiletype = $this->get_profile_type($ProfileID);
            if($creatorprofiletype->CanCreateProfiles){
                $ProfileType = $this->get_profile_type($ProfileType);
                return $creatorprofiletype->Hierarchy < $ProfileType->Hierarchy;
            }
        }

        function randomPassword($Length=8) {
            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $pass = "";
            $alphaLength = strlen($alphabet) - 1;
            for ($i = 0; $i < $Length; $i++) {
                $n = rand(0, $alphaLength);
                $pass .= $alphabet[$n];
            }
            return $pass;
        }

        function new_profile($CreatedBy, $Name, $Password, $ProfileType, $EmailAddress, $RestaurantID, $Subscribed = ""){
            if(!$Password){$Password=randomPassword();}
            if($Subscribed){$Subscribed=1;} else {$Subscribed =0;}
            $data = array("Name" => trim($Name), "ProfileType" => $ProfileType, "Email" => strtolower(trim($EmailAddress)), "CreatedBy" => 0, "RestaurantID" => $RestaurantID, "Subscribed" => $Subscribed, "Password" => md5($Password . $this->salt()));
            if($CreatedBy){
                if(!$this->can_profile_create($CreatedBy, $ProfileType)){return false;}
                $data["CreatedBy"] = $CreatedBy;
            }
            $data = $this->edit_database("profiles", "ID", "", $data);
            $data["Password"] = $Password;
            $this->set_subscribed($EmailAddress,$Subscribed);
            return $data;
        }

        function edit_profile($ID, $Name, $EmailAddress, $Phone, $Password, $Subscribed = 0, $ProfileType = 0){
            $data = array("Name" => trim($Name), "Email" => strtolower(trim($EmailAddress)), "Phone" => $Phone, "Subscribed" => $Subscribed);
            if($Password){
                $data["Password"] = md5($Password . $this->salt());
            }
            if($ProfileType){
                $data["ProfileType"] = $ProfileType;
            }
            $this->set_subscribed($EmailAddress,$Subscribed);
            return $this->update_database("profiles", "ID", $ID, $data);
        }

        function find_profile($EmailAddress, $Password){
            $EmailAddress = strtolower(trim($EmailAddress));
            $Password = md5($Password . $this->salt());
            return $this->enum_all("profiles", array("Email" => $EmailAddress, "Password" => $Password))->first();
        }

        function login($Controller, $Profile){
            if (is_numeric($Profile)){
                $Profile = $this->get_profile($Profile);
            }
            $Controller->request->session()->write('Profile.ID',            $Profile->ID);
            $Controller->request->session()->write('Profile.Name',          $Profile->Name);
            $Controller->request->session()->write('Profile.Email',         $Profile->Email);
            $Controller->request->session()->write('Profile.Type',          $Profile->ProfileType);
            $Controller->request->session()->write('Profile.Restaurant',    $Profile->RestaurantID);
        }

        ////////////////////////////////////////Profile Address API ////////////////////////////////////
        function enum_profile_addresses($ProfileID){
            return $this->enum_all("profiles_addresses", array("UserID" => $ProfileID));
        }
        function delete_profile_address($ID){
            $this->delete_all("profiles_addresses", array("ID" => $ID));
        }
        function get_profile_address($ID){
            return $this->get_entry("profiles_addresses", $ID);
        }
        function edit_profile_address($ID, $UserID, $Name, $Number, $Street, $Apt, $Buzz, $City, $Province, $PostalCode, $Country, $Notes){
            $Data = array("UserID" => $UserID, "Name" => $Name, "Number" => $Number, "Street" => $Street, "Apt" => $Apt, "Buzz" => $Buzz, "City" => $City, "Province" => $Province, "PostalCode" => $PostalCode, "Country" =>$Country, "Notes" =>$Notes);
            return $this->edit_database("profiles_addresses", "ID", $ID, $Data);
        }





        ////////////////////////////////////Newsletter API//////////////////////////////////
        function add_subscriber($EmailAddress, $authorized = false){
            $EmailAddress = strtolower(trim($EmailAddress));
            $Entry = $this->get_entry("newsletter", $EmailAddress, "Email");
            if ($Entry){
                if (!$Entry->GUID){
                    return true;
                }
                $GUID = $Entry->GUID;
                $this->update_database("newsletter", "ID", $Entry->ID, array("GUID" => $GUID));
            } else {
                $GUID = com_create_guid();
                $this->new_entry("newsletter", "ID", array("GUID" => $GUID, "Email" => $EmailAddress));
            }
            $path = '<A HREF="' . "localhost/Foodie/" . "cuisine?action=subscribe&key=" . $GUID . '">Click here to finish registration</A>';
            return $this->Controller->Mailer->sendEmail($EmailAddress,"Subscribe", $path);
        }

        function remove_subscriber($EmailAddress){
            $EmailAddress = strtolower(trim($EmailAddress));
            $this->delete_all("newsletter", array("Email" => $EmailAddress));
        }
        function is_subscribed($EmailAddress){
            $EmailAddress = strtolower(trim($EmailAddress));
            return $this->get_entry("newsletter", $EmailAddress, "Email");
        }
        function finish_subscription($Key){
            $Entry = $this->get_entry("newsletter", $Key, "GUID");
            if($Entry){
                $this->update_database("newsletter", "ID", $Entry->ID, array("GUID" => ""));
                return $Entry->Email;
            }
        }

        function set_subscribed($EmailAddress, $Status){
            $EmailAddress = strtolower(trim($EmailAddress));
            $is_subscribed = $this->is_subscribed($EmailAddress);
            if($is_subscribed != $Status){
                if($Status){
                    $this->add_subscriber($EmailAddress, True);
                } else {
                    $this->remove_subscriber($EmailAddress);
                }
            }
        }
        function enum_subscribers(){
            $Data = $this->enum_all("newsletter", array("GUID" => ""));
            return $this->iterator_to_array($Data, "ID", "Email");
        }




        //////////////////////////////////////Genre API//////////////////////////////////////
        function add_genre($Name){
            if(is_array($Name)){
                foreach($Name as $Genre){
                    $this->add_genre($Genre);
                }
            } else {
                $this->new_anything("genres", $Name);
            }
        }
        function enum_genres(){
            $entries = TableRegistry::get('genres')->find('all');
            return $this->iterator_to_array($entries, "ID", "Name");
        }
        function rename_genre($ID, $Name){
            $this->update_database('genres', "ID", $ID, array("Name" => $Name));
        }
        function enum_restaurants($Genre = ""){
            if($Genre) {
                return $this->enum_anything("restaurants", "Genre", $Genre);
            }
            return $this->enum_table("restaurants");
        }







        //////////////////////////////////////Restaurant API/////////////////////////////////
        function get_restaurant($ID, $IncludeHours = False){
            $restaurant = $this->get_entry("restaurants", $ID);
            if($IncludeHours){
                $restaurant->Hours = $this->get_hours($ID);
            }
            return $restaurant;
        }
        function edit_restaurant($ID, $Name, $GenreID, $Email, $Phone, $Address, $City, $Province, $Country, $PostalCode, $Description, $DeliveryFee, $Minimum){
            if(!$ID){
                $ID = $this->new_anything("restaurants", $Name);
            }
            $C = ', ';
            $this->logevent("Edited restaurant: " . $Name .$C. $GenreID .$C. $Email .$C. $Phone .$C. $Address .$C. $City .$C. $Province .$C. $Country .$C. $PostalCode .$C. $Description .$C. $DeliveryFee .$C. $Minimum);
            $data = array("Name" => $Name, "Genre" => $GenreID, "Email" => $Email, "Phone" => $Phone, "Address" => $Address, "City" => $City, "Province" => $Province, "Country" => $Country, "PostalCode" => $PostalCode, "Description" => $Description, "DeliveryFee" => $DeliveryFee, "Minimum" => $Minimum);
            $this->update_database("restaurants", "ID", $ID, $data);
            return $ID;
        }


        /////////////////////////////////////days off API////////////////////////////////////
        function add_day_off($RestaurantID, $Day, $Month, $Year){
            delete_day_off($RestaurantID, $Day, $Month, $Year, false);
            $this->logevent("Added a day off on: " . $Day . "-" . $Month . "-" . $Year);
            $this->new_entry("daysoff", "ID", array("RestaurantID" => $RestaurantID, "Day" => $Day, "Month" => $Month, "Year" => $Year));
        }
        function delete_day_off($RestaurantID, $Day, $Month, $Year, $IsNew = true){
            if ($IsNew){
                $this->logevent("Deleted a day off on: " . $Day . "-" . $Month . "-" . $Year);
            }
            $this->delete_all("daysoff", array("RestaurantID" => $RestaurantID, "Day" => $Day, "Month" => $Month, "Year" => $Year));
        }
        function enum_days_off($RestaurantID){
            return enum_all("daysoff", array("RestaurantID" => $RestaurantID));
        }
        function is_day_off($RestaurantID, $Day, $Month, $Year){
            return enum_all("daysoff", array("RestaurantID" => $RestaurantID, "Day" => $Day, "Month" => $Month, "Year" => $Year))->first();
        }

        /////////////////////////////////////Date API////////////////////////////////////////
        function now(){
            return date("Y-m-d H:i:s");
        }

        //returns date stamp
        function parse_date($Date){
            if(strpos($Date, "-")) {
                return strtotime($Date);
            }
            return $Date;
        }

        function get_day_of_week($Date){//0 is sunday, 6=saturday
            return date('w', $this->parse_date($Date));
        }
        function get_time($Date){//800
            return date('Gi', $this->parse_date($Date));
        }
        function get_year($Date){//2015
            return date('Y', $this->parse_date($Date));
        }
        function get_month($Date){//01-12
            return date('m', $this->parse_date($Date));
        }
        function get_day($Date){//3 (no leading zero)
            return date('j', $this->parse_date($Date));
        }


        /////////////////////////////////////Hours API///////////////////////////////////////
        function get_hours($RestaurantID){
            $ret = array();
            $Data = TableRegistry::get('hours')->find()->order(['DayOfWeek' => 'ASC'])->where(['RestaurantID' => $RestaurantID])->all();
            foreach($Data as $Day){
                $ret[$Day->DayOfWeek . ".Open"] = $Day->Open;
                $ret[$Day->DayOfWeek . ".Close"] = $Day->Close;
            }
            return $ret;
        }

        function to_time($Time){
            if($Time){
                if (substr_count($Time, ":") == 2) {
                    $Time = $this->left($Time, strlen($Time) - 3);
                }
                return str_replace(":", "", $Time);
            }
        }

        function edit_hours($RestaurantID, $Data){
            $Days = array();
            for ($DayOfWeek = 1; $DayOfWeek < 8; $DayOfWeek++){
                $Open = $this->to_time($Data[$DayOfWeek . "_Open"]);
                $Close = $this->to_time($Data[$DayOfWeek . "_Close"]);
                $Days[$DayOfWeek] = $Open . " to " . $Close;
                $this->edit_hour($RestaurantID, $DayOfWeek, $Open, $Close);
            }
            $this->logevent("Edited hours: " . print_r($Days, true));
        }

        function edit_hour($RestaurantID, $DayOfWeek, $Open, $Close){
            $table = TableRegistry::get('hours');
            $data = array('RestaurantID'=>$RestaurantID, 'DayOfWeek'=>$DayOfWeek);
            $table->deleteAll($data, false);
            if(!$Open){$Open = "0000";}
            if(!$Close){$Close = "2359";}
            $data["Open"] = $Open;
            $data["Close"] = $Close;
            $this->new_entry("hours", "ID", $data);
        }

        function is_restaurant_open($RestaurantID, $DayOfWeek, $Time){
            $Data = TableRegistry::get('hours')->find()->where(['RestaurantID' => $RestaurantID, "DayOfWeek" => $DayOfWeek])->first();
            if ($Data){
                return $Data->Open <= $Time && $Data->Close >= $Time;
            }
        }

        function is_restaurant_open_now($RestaurantID, $date = ""){
            if(!$date){ $date = $this->now();}
            if(strpos($date, "-")){$date = strtotime($date);}
            if(!$this->is_day_off($RestaurantID, $this->get_day($date), $this->get_month($date), $this->get_year($date))) {
                $dayofweek = date('w', $date);
                $time = date('Gi', $date);
                return $this->is_restaurant_open($RestaurantID, $dayofweek, $time);
            }
        }









        /////////////////////////////////Event log API////////////////////////////////////
        function logevent($Event, $DoRestaurant = true){
            $UserID = $this->request->session()->read('Profile.ID');
            $RestaurantID = 0;
            if ($DoRestaurant) {
                $RestaurantID = $this->request->session()->read('Profile.RestaurantID');
                if (!$RestaurantID) {
                    $RestaurantID = $this->get_profile($UserID)->RestaurantID;
                }
            }
            $Date = $this->now();
            $this->new_entry("eventlog", "ID", array("UserID" => $UserID, "RestaurantID" => $RestaurantID, "Date" => $Date, "Text" => $Event));
        }
        function enum_events($RestaurantID){
            return $this->enum_all("eventlog", array("RestaurantID" => $RestaurantID));
        }







        /////////////////////////////////DATABASE API///////////////////////////////////
        function delete_all($Table, $data){
            $table = TableRegistry::get($Table);
            $table->deleteAll($data, false);
        }
        function enum_table($Table){
            return TableRegistry::get($Table)->find('all');
        }
        function enum_all($Table, $conditions = ""){
            if (is_array($conditions)) {
                return TableRegistry::get($Table)->find('all')->where($conditions);
            }
            return $this->enum_table($Table);
        }

        function iterator_to_array($entries, $PrimaryKey, $Key){
            $data = array();
            foreach($entries as $profiletype){
                $data[$profiletype->$PrimaryKey] = $profiletype->$Key;
            }
            return $data;
        }

        function enum_anything($Table, $Key, $Value){
            return TableRegistry::get($Table)->find('all')->where([$Key=>$Value]);
        }
        function new_anything($Table, $Name){
            $Name = $this->new_entry($Table, "ID", array("Name" => $Name));
            return $Name["ID"];
        }

        public function get_entry($Table, $Value, $PrimaryKey = "ID"){
            $table = TableRegistry::get($Table);
            return $table->find()->where([$PrimaryKey=>$Value])->first();
        }

        //only use when you know the primary key value exists
        function update_database($Table, $PrimaryKey, $Value, $Data){
            TableRegistry::get($Table)->query()->update()->set($Data)->where([$PrimaryKey => $Value])->execute();
            $Data[$PrimaryKey] = $Value;
            return $Data;
        }

        function edit_database($Table, $PrimaryKey, $Value, $Data){
            $table = TableRegistry::get($Table);
            $entry = false;
            if($PrimaryKey && $Value) {
                $entry = $table->find()->where([$PrimaryKey => $Value])->first();
            }
            if($entry){
                $table->query()->update()->set($Data)->where([$PrimaryKey => $Value])->execute();
                $Data[$PrimaryKey] = $Value;
            } else {
                //$table->query()->insert(array_keys($Data))->values($Data)->execute();
                $Data2 = $table->newEntity($Data);
                $table->save($Data2);
                if($PrimaryKey){
                    $Data[$PrimaryKey] = $Data2->$PrimaryKey;
                }
            }
            return $Data;
        }

        function new_entry($Table, $PrimaryKey, $Data){
            return $this->edit_database($Table, $PrimaryKey, "", $Data);
        }

        function lastQuery(){
            $dbo = $this->getDatasource();
            $logs = $dbo->_queriesLog;
            // return the first element of the last array (i.e. the last query)
            return current(end($logs));
        }

        function getColumnNames($Table, $ignore = "", $keysonly = true){
            $Columns = TableRegistry::get($Table)->schema();
            $Data = $this->getProtectedValue($Columns, "_columns");
            if ($Data) {
                if (is_array($ignore)) {
                    foreach ($ignore as $value) {
                        unset($Data[$value]);
                    }
                } elseif ($ignore) {
                    unset($Data[$ignore]);
                }
                if ($keysonly){
                    $Data = array_keys($Data);
                }
                return $Data;
            }
        }

        function isassocarray($my_array){
            if(!is_array($my_array)) {return false;}
            if(count($my_array) <= 0) {return true;}
            return !(array_unique(array_map("is_int", array_keys($my_array))) === array(true));
        }

        function makeCSV($data, $newline = "\r\n"){
            $retvalue = "";
            $haswrittencolumns = false;
            foreach($data as $entry){
                $currentline = "";
                if (is_object($entry)) {
                    $entry = $this->getProtectedValue($entry, "_properties");
                }
                if(!$haswrittencolumns){
                    foreach($entry as $key => $value){
                        $newkey = "";
                        if (is_array($value)){
                            if($this->isassocarray($value)){
                                $newkey = $value;
                            }
                        } elseif(is_object($value)){
                            $newkey = $this->getProtectedValue($value, "_properties");
                        }
                        if (is_array($newkey)) {
                            foreach($newkey as $key2 => $value2) {
                                $currentline = $this->appendstring($currentline, $key . "." . $key2);
                            }
                        } else {
                            $currentline = $this->appendstring($currentline, $key);
                        }
                    }
                    $haswrittencolumns=true;
                    $retvalue = $currentline;
                    $currentline = "";
                }

                foreach($entry as $key => $value){
                    $currentline = $this->appendstring($currentline, $this->CSVvalue($value));
                }

                $retvalue .= $newline . $currentline;
            }
            return $retvalue;
        }

        function appendstring($Current, $Append, $delimeter = ","){
            if($Current){return $Current . $delimeter . $Append;}
            return $Append;
        }

        function getProtectedValue($obj,$name) {
            $array = (array)$obj;
            $prefix = chr(0).'*'.chr(0);
            if (isset($array[$prefix.$name])) {
                return $array[$prefix . $name];
            }
        }

        function CSVvalue($value){
            if (is_object($value)){$value = $this->getProtectedValue($value, "_properties");}
            if (is_array($value)) {
                if ($this->isassocarray($value)) {
                    $currentline = "";
                    foreach ($value as $Key => $thevalue) {
                        if ($currentline) {
                            $currentline .= ",";
                        }
                        $currentline .= $this->CSVvalue($thevalue);
                    }
                    return $currentline;
                } else {
                    return $this->CSVvalue(implode(",", $value));
                }
            } else {
                if (strpos($value, '+') !== False){$value = "'" . $value;}
                if ( (strpos($value, ",") || strpos($value, "\r\n") || strpos($value, '"') || strpos($value, '-') || strpos($value, '\\') || strpos($value, '+')) !== False) {
                    return '"' . str_replace('"', '""', $value) . '"';
                }
                return $value;
            }
        }

        function debugall($iteratable){
            //debug($iteratable);
            foreach($iteratable as $item){
                debug($item);
            }
        }

        function kill_non_numeric($text){
            return preg_replace("/[^0-9]/", "", $text);
        }
        function left($text, $length){
            return substr($text,0,$length);
        }
        function right($text, $length){
            return substr($text, -$length);
        }
    }
?>