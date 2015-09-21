<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Network\Email\Email;

class MailerComponent extends Component {
    function AppName(){
        return "Foodie";
    }

    public function getString($Value, $Table = "strings", $PrimaryKey = "Name"){
        $table = TableRegistry::get($Table);
        return $table->find()->where([$PrimaryKey=>$Value])->first();
    }

    function getfirstsuper(){
        return "nothing@yet.com";
        //return getString(1, "profiles", "super")->email;
    }

    public function savevariables($eventname, $variables){//ID Name Description Attachments image
        $table = TableRegistry::get('strings');
        $eventname="email_" . $eventname . "_variables";
        $string = $table->find()->where(['Name'=> $eventname])->first();
        $variables = implode(", ", array_keys($variables));
        if ($string){
            if ($string->English != $variables) {
                $table->query()->update()->set(['English' => $variables])->where(['Name' => $eventname])->execute();
            }
        } else { //new
            $table->query()->insert(['Name', 'English'])->values(['Name' => $eventname, 'English' => $variables])->execute();
        }
    }

    function handleevent($emailaddresses, $eventname, $variables){
        $webroot = $this->request->webroot;
        $CRLF = "\r\n<BR>";
        $login = $CRLF . '<A HREF="' . $webroot . '">Click here to login</A>';
        $Subject = "No subject set for " . $eventname;
        $Message = "No message set for " . $eventname;

        switch(strtolower($eventname)){
            case "new_profile":
                $Subject = "A profile was created";
                $Message = "Your user ID is " . $variables["Profile"]["Email"] .  $CRLF . "Your password is: " . $variables["Profile"]["Password"];
                break;
            case "password_reset":
                $Subject = "Password reset";
                $Message = "Your password has been changed to: " . $variables["Password"];
                break;
            case "subscribe":
                $Subject = "Subscribe";
                $Message = $variables["Path"];
        }

        if (is_array($emailaddresses)){
            foreach($emailaddresses as $email){
                $this->sendEmail($email, $Subject, $Message . $login);
            }
        } else {
            $this->sendEmail($emailaddresses, $Subject, $Message . $login);
        }

        return true;

        /*  for use when there is a strings table
        $this->savevariables($eventname, $variables);
        //return false;//not operational
        $Email = $this->getString("email_" . $eventname . "_subject");
        $language = "English";

        //if(!isset($variables["site"])) { $variables["site"] = $this->get_settings()->mee; }
        $variables["event"] = $eventname;
        $variables["webroot"] = LOGIN;
        $variables["created"] = date("l F j, Y - H:i:s");
        $variables["login"] = '<a href="' . LOGIN . '">Click here to login</a>';
        $variables["variables"] = print_r($variables, true);
        if($Email) {
            $Subject =  $Email->$language;//$Email->English;
            $Message = $this->getString("email_" . $eventname . "_message")->$language;//$Email->French;
            if(isset($variables["footer"])) { $Message.= $variables["footer"]; }
            foreach ($variables as $Key => $Value) {
                if( !is_array($Value)) {
                    $Subject = str_replace("%" . $Key . "%", $Value, $Subject);
                    $Message = str_replace("%" . $Key . "%", $Value, $Message);
                }
            }

            $Message = str_replace("\r\n", "<BR>", $Message);
            if(!$Message) {$Message = $eventname . " variables: " . $variables["variables"];}//DEBUG
            if(isset($variables["debug"])){$Message.= "<BR>" . $variables["debug"];}

            if (is_array($emailaddresses)){
                foreach($emailaddresses as $email){
                    $this->sendEmail($email, $Subject, $Message);
                }
            } else {
                $this->sendEmail($emailaddresses, $Subject, $Message);
            }
        } else {
            $Subject = $eventname;
            $Message = "email_" . $eventname . " does not have _subject/_message set in [strings]";
            $this->sendEmail("",$variables["email"], $Subject, $Message . " Variables: " . print_r($variables, true));
        }
        return true;
        */
    }

    public function getprofile($UserID){
        //return getString($UserID, "profiles", "id");
    }

    function getUrl(){
        $url = $_SERVER['SERVER_NAME'];
        if($url=='localhost') { return 'foodie.com';}//LOCALHOST.COM WILL NOT GET PAST GOOGLE!!!
        $url = str_replace(array('http://', '/', 'www'), array('', '', ''), $url);
        return $url;
    }

    function get_settings() {
        //return TableRegistry::get('settings')->find()->first();
    }

    function isPhoneNumber($Number){
        $Number = preg_replace("/[^0-9+]/", "", $Number);
        if(strlen(str_replace("+", "", $Number )) == 10){
            return $Number;
        }
    }

    function sendEmail($to,$subject,$message, $emailIsUp = True){//do not use! Use HandleEvent instead!!!!
        //from can be array with this structure array('email_address'=>'Sender name'));
        $logAllEmails = false;
        $path = $this->getUrl();
        $PhoneNumber = $this->isPhoneNumber($to);

        if(!$PhoneNumber && is_numeric($to)){$to = $this->getprofile($to)->email;}
        if ($to == "super") {$to = $this->getfirstsuper();}

        if(strpos($subject, "[DISABLED]") !== false || strpos($to, "[DISABLED]") !== false) {$emailIsUp=false;}
        if ($emailIsUp) {
            if($PhoneNumber){
                $this->sendSMS($PhoneNumber, $message);
            } else {
                $email = new Email('default');
                //if ($send2Roy || $to == "roy") {$to = "roy@trinoweb.com";} //should not happen
                $email->from(['info@' . $path => $this->AppName()])
                    ->emailFormat('html')
                    ->to(trim($to))//$to
                    ->subject($subject)
                    ->send($message);
            }
        }

        if($logAllEmails || !$emailIsUp) {
            if(!$emailIsUp){$message .= "\r\n[WAS NOT SENT!]";}
            $this->debugprint("To: " . $to . "\r\nAt: " . date("l F j, Y - H:i:s") . "\r\nSubject: " . $subject . "\r\n%dashes%" . $message);
        }
        return $message;
    }

    function debugprint($text){
        $path = "royslog.txt";
        //if($_SERVER['SERVER_NAME'] =="isbmeereports.com"){$path = "/home/isbmeereports/public_html/webroot/" . $path;}
        $dashes = "----------------------------------------------------------------------------------------------\r\n";
        file_put_contents($path, $dashes . str_replace("%dashes%", $dashes, str_replace("<BR>", "\r\n" , $text)) . "\r\n", FILE_APPEND);
    }



    //////////////////////////////////////////////SEND SMS CODE//////////////////////////////////////////////////
    function isJson($string) {
        if($string && !is_array($string)){
            json_decode($string);
            return (json_last_error() == JSON_ERROR_NONE);
        }
    }
    function cURL($URL, $data = "", $username = "", $password = ""){
        $session = curl_init($URL);
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);//not in post production
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($session, CURLOPT_POST, true);
        if($data) { curl_setopt ($session, CURLOPT_POSTFIELDS, $data);}

        $datatype = "x-www-form-urlencoded;charset=UTF-8";
        if($this->isJson($data)){$datatype  = "json";}
        $header = array('Content-type: application/' . $datatype, "User-Agent: " . $this->AppName());
        if ($username && $password){
            $header[] =	"Authorization: Basic " . base64_encode($username . ":" . $password);
        } else if ($username) {
            $header[] =	"Authorization: Bearer " .  $username;
            $header[] =	"Accept-Encoding: gzip";
        } else if ($password) {
            $header[] =	"Authorization: AccessKey " .  $password;
        }
        curl_setopt($session, CURLOPT_HTTPHEADER, $header);

        $response = curl_exec($session);
        if(curl_errno($session)){
            $response = "Error: " . curl_error($session);
        }
        curl_close($session);
        return $response;
    }
    function getrequest($URL, $data){
        $delimeter = "?";
        foreach($data as $Key => $Value){
            $URL .= $delimeter . $Key . "=" . urlencode($Value);
            $delimeter = "&";
        }
        return file_get_contents($URL);
    }

    //3 cents per SMS
    function sendSMS_Clockwork($Phone, $Message){//works
        //www.clockworksms.com/
        $ClockworkKey = "82ef835ac1b60d5aa625b16098c66730ac007116";
        $URL = "https://api.clockworksms.com/http/send.aspx?key=" . $ClockworkKey . "&to=" . $Phone . "&content=" . urlencode($Message);
        return file_get_contents($URL);
    }

    //€ 0.0062 (aprox 1 cent) per SMS
    function sendSMS_messente($Phone, $Message){//works
        //https://messente.com/
        $URL = "http://api2.messente.com/send_sms/";
        $Data = array(
            "username" => "d44513c53a71cd97d7ef0f4a7974c6ad",
            "password" => "5c84de0a7d1ed78f087a71802757226c",
            "text" => $Message,
            "from" => "9055123067",
            "to" => $Phone
        );
        return $this->getrequest($URL, $Data);
    }

    //1.7 cents per message ($25 per month includes 1,500 SMS)
    function sendSMS_smsgateway($Phone, $Message){//works perfectly
        //http://smsgateway.ca/
        $key = "D731eIvNapiJ6t0voF2RBprD888l7KJ4";
        return file_get_contents("http://smsgateway.ca/sendsms.aspx?CellNumber=" . $Phone. "&MessageBody=" . urlencode($Message) . "&AccountKey=" . $key);
    }

    //costs unknown
    function sendSMS_sently($Phone, $Message){// works
        //https://web.sent.ly/
        $key = "1s51yz9kzhsjxq83f6t0mpwh3t6wklpq";
        $secret = "wy24p5t1vad5ve7taa048il8w3c3wh7g";
        $URL = "https://apiserver.sent.ly/oauth/token";
        $OATH = $this->getOATH($URL, $key, $secret);
        $URL = "https://apiserver.sent.ly/api/outboundmessage";
        $data = array("from" => "+19055123067", "to" => $Phone, "text" => $Message);
        return $this->cURL($URL, json_encode($data), $OATH);
    }

    //0.7 cents per sms
    function sendSMS_messagebird($Phone, $Message){//works
        //https://www.messagebird.com
        $key = "live_d37G3JwTyBRkBL2FcMMhxxZHE";
        $data = array(
            "originator" => $this->AppName(),
            "recipients" => $Phone,
            "body" => $Message
        );
        $URL = "https://rest.messagebird.com/messages";
        return $this->cURL($URL, json_encode($data), "", $key);
    }

    //$0.0075 per SMS, + $1 per month
    function sendSMS_Twilio($Phone, $Message, $Call = false){//works if you can get the from number....
        //https://www.twilio.com/
        $sid = 'AC81b73bac3d9c483e856c9b2c8184a5cd';
        $token = "3fd30e06e99b5c9882610a033ec59cbd";
        $fromnumber = "2897685936";
        if($Call){
            $Message = "http://charlieschopsticks.com/pages/call?message=" . urlencode($Message);
            $URL = "https://api.twilio.com/2010-04-01/Accounts/" . $sid . "/Calls";
            $data = array("From" => $fromnumber, "To" => $Phone, "Url" => $Message);
        } else {
            $URL = "https://api.twilio.com/2010-04-01/Accounts/" . $sid . "/Messages";
            $data = array("From" => $fromnumber, "To" => $Phone, "Body" => $Message);
        }
        return $this->cURL($URL, http_build_query($data), $sid, $token);
    }

    function getOATH($URL, $key, $secret){
        $ret = cURL($URL, "grant_type=client_credentials", $key, $secret);
        $json = json_decode($ret);
        if(json_last_error() == JSON_ERROR_NONE){
            if($json->token_type == "bearer"){
                return $json->access_token;
            }
        }
        return "ERROR: " . $ret;
    }

    function sendSMS($Phone, $Message, $Provider = "Twilio", $Call = false){
        return $Provider . ": " . call_user_func(array($this, "sendSMS_" . $Provider), $Phone, $Message, $Call);
        //return sendSMS_$Provider($Phone, $Message);
    }
}
?>