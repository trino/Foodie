<?php

    namespace App\Controller\Component;
    use Cake\Controller\Component;
    use Cake\ORM\TableRegistry;


    class ManagerComponent extends Component {
        ////////////////////////////////////Profile type API//////////////////////////////////
        function init($Controller){
            $Controller->set('genres', $this->enum_genres());
        }

        function new_profiletype($Name){
            return new_anything("profiletypes", $Name);
        }
        function get_profile_permissions(){//lists all permissions
            return $this->getColumnNames("profiletypes", array("ID", "Name", "Hierarchy"));
        }
        function edit_profiletype($ID = "", $Name, $Hierarchy, $Permissions = ""){
            if(!$ID){
                $ID = $this->new_profiletype($Name);
            }
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

        function randomPassword($Length) {
            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $pass = "";
            $alphaLength = strlen($alphabet) - 1;
            for ($i = 0; $i < $Length; $i++) {
                $n = rand(0, $alphaLength);
                $pass .= $alphabet[$n];
            }
            return $pass;
        }

        function new_profile($CreatedBy, $Name, $ProfileType, $EmailAddress, $RestaurantID, $Subscribed){
            $Password = $this->randomPassword(8);
            $data = array("Name" => $Name, "ProfileType" => $ProfileType, "Email" => $EmailAddress, "CreatedBy" => 0, "RestaurantID" => $RestaurantID, "Subscribed" => $Subscribed, "Password" => md5($Password . $this->salt()));
            if($CreatedBy){
                if(!$this->can_profile_create($CreatedBy, $ProfileType)){return false;}
                $data["CreatedBy"] = $CreatedBy;
            }
            $data = $this->edit_database("profiles", "ID", "", $data);
            $data["Password"] = $Password;
            return $data;
        }

        function edit_profile($ID, $Name, $ProfileType, $EmailAddress, $Password, $Subscribed){
            $data = array("Name" => $Name, "ProfileType" => $ProfileType, "Email" => $EmailAddress, "Subscribed" => $Subscribed);
            if($Password){
                $data["Password"] = md5($Password . $this->salt());
            }
            $this->update_database("profiles", "ID", $ID, $data);
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
        function enum_restaurants($Genre){
            return $this->enum_anything("restaurants", "Genre", $Genre);
        }







        //////////////////////////////////////Restaurant API/////////////////////////////////
        function get_restaurant($ID, $IncludeHours = False){
            $restaurant = $this->get_entry("restaurants", $ID);
            if($IncludeHours){
                $restaurant->Hours = $this->get_hours($ID);
            }
            return $restaurant;
        }
        function edit_restaurant($ID, $Name, $GenreID, $Email, $Phone, $Address, $City, $Province, $Country, $PostalCode){
            if(!$ID){
                $ID = $this->new_anything("restaurants", $Name);
            }
            $data = array("Name" => $Name, "Genre" => $GenreID, "Email" => $Email, "Phone" => $Phone, "Address" => $Address, "City" => $City, "Province" => $Province, "Country" => $Country, "PostalCode" => $PostalCode);
            $this->update_database("restaurants", "ID", $ID, $data);
            return $ID;
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
        function edit_hour($RestaurantID, $DayOfWeek, $Open, $Close){
            $table = TableRegistry::get('hours');
            $data = array('RestaurantID'=>$RestaurantID, 'DayOfWeek'=>$DayOfWeek);
            $table->deleteAll($data, false);
            $data["Open"] = $Open;
            $data["Close"] = $Close;
            $this->new_entry("hours", "ID", $data);
        }












        /////////////////////////////////DATABASE API///////////////////////////////////
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
    }
?>