<?php 
function testURL(){
	return "localhost/sms/headers.php";
}

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
	if(isJson($data)){$datatype  = "json";}
	$header = array('Content-type: application/' . $datatype, "User-Agent: Veritas3-0");
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

function postrequest($URL, $data, $username = "", $password = "", $contenttype = "x-www-form-urlencoded"){
	$header = array("Content-type: application/" . $contenttype);
	if($password){$header[]  = "Authorization: Basic " . base64_encode("$username:$password");}
		
	$http = array(
		'header'  => implode("\r\n", $header),
		'method'  => 'POST'
	);
	if (is_array($data)){$http['content'] = http_build_query($data);}
		
	$options = array('http' => $http);	
	$context  = stream_context_create($options);
	return file_get_contents($URL, false, $context);
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
	return getrequest($URL, $Data);
}

//1.7 cents per message ($25 per month includes 1,500 SMS)
function sendSMS_smsgateway($Phone, $Message){//works perfectly
	//http://smsgateway.ca/
	$key = "D731eIvNapiJ6t0voF2RBprD888l7KJ4";
	return file_get_contents("http://smsgateway.ca/sendsms.aspx?CellNumber=" . $Phone. "&MessageBody=" . urlencode($Message) . "&AccountKey=" . $key);
}

function sendSMS_sently($Phone, $Message){// works
	//https://web.sent.ly/
	$key = "1s51yz9kzhsjxq83f6t0mpwh3t6wklpq";
	$secret = "wy24p5t1vad5ve7taa048il8w3c3wh7g";
	$URL = "https://apiserver.sent.ly/oauth/token";
	$OATH = getOATH($URL, $key, $secret);
	$URL = "https://apiserver.sent.ly/api/outboundmessage";
	$data = array("from" => "+19055123067", "to" => $Phone, "text" => $Message);
	return cURL($URL, json_encode($data), $OATH);
}

//0.7 cents per sms
function sendSMS_messagebird($Phone, $Message){//works
	//https://www.messagebird.com
	$key = "live_d37G3JwTyBRkBL2FcMMhxxZHE";
	$data = array(
		"originator" => "Veritas3-0",
		"recipients" => $Phone,
		"body" => $Message
	);
	$URL = "https://rest.messagebird.com/messages";
	return cURL($URL, json_encode($data), "", $key);
}

//$0.0075 per SMS, + $1 per month
function sendSMS_Twilio($Phone, $Message){//works if you can get the from number....
	//https://www.twilio.com/
	$sid = 'AC81b73bac3d9c483e856c9b2c8184a5cd'; 
	$token = "3fd30e06e99b5c9882610a033ec59cbd";
	$fromnumber = "+19055123067";
	$URL = "https://api.twilio.com/2010-04-01/Accounts/" . $sid . "/Messages";
	$data = array("From" => "2897685936", "To" => $Phone, "Body" => $Message);
	return cURL($URL, http_build_query($data), $sid, $token);
}














function sendSMS_plivo($Phone, $Message){//This caller id is not allowed for outbound message
	$auth_id= "MANJLMNDI2MME4OGRLN2";
	$auth_token = "M2I3ODQ3NGUxYmZjMDRlNGIzMzhmZjY4YmZmYTA1";
    $Data = array(
            'src' => '19055123067',
            'dst' => $Phone,
            'text' => $Message,
            'type' => 'sms',
        );
	$URL = "https://api.plivo.com/v1/Account/" . $auth_id . "/Message/";
	return cURL($URL, json_encode($Data), $auth_id, $auth_token);
}

//€0.0064 per sms
function sendSMS_wavecell($Phone, $Message){//works but got garbage text
	$AccountID = "trino";	
	$Password = "54303210";
	$SenderID = "9055123067";
	$SubAccountID = "trino_std";
	$Phone = str_replace("+", "", $Phone);
	$URL = "http://wms1.wavecell.com/Send.asmx/SendMT?AccountId=" . $AccountID . "&Body=" . urlencode($Message) . "&Destination=" . $Phone . "&Encoding=ASCII&Password=" . $Password . "&ScheduledDateTime=&Source=" . $SenderID . "&SubAccountId=" . $SubAccountID . "&UMID=";
	return file_get_contents($URL); 
}

function sendSMS_octopush($Phone, $Message){//seems to work
	//http://www.octopush.com/
	$key = "";
	$SenderName = "Veritas3-0";
	$userlogin = "roy@trinoweb.com";
	$URL = "http://www.octopush-dm.com/api/sms/?user_login=" . $userlogin .  "&api_key=" . $key . "&sms_text=" . urlencode($Message) . "&sms_recipients=" . $Phone . "&sms_type=FR&sms_sender=" . $SenderName;
	return file_get_contents($URL);
}












//not working
function sendSMS_sinch($Phone, $Message){//not operational
	$Username = "application\f0bba68f-9434-4e59-ab4f-4f514b651600";
	$Password = "/KjGp9ZfvEi5bpuwjtmDRQ==";
	$URL = "https://messagingapi.sinch.com/v1/sms/" . $Phone;
	$Data = array("message" => $Message);
	//return postrequest($URL, $Data, $Username, $Password);
	return curl($URL, $Data, $Username, $Password);
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







function sendSMS($Phone, $Message, $Provider = "wavecell"){
	return $Provider . ": " . call_user_func("sendSMS_" . $Provider, $Phone, $Message);
	//return sendSMS_$Provider($Phone, $Message);
}

if(isset($_POST["PHONE"])){
	echo "Result: " . sendSMS($_POST["PHONE"], $_POST["MESSAGE"], $_POST["PROVIDER"]);
}
?>
<FORM METHOD="POST">
Provider: <SELECT NAME="PROVIDER"><?php 
	$providers = array("Clockwork", "messente", "smsgateway", "sently", "Twilio", "plivo", "messagebird", "wavecell", "octopush", "sinch", "octopush");
	//https://secure.smsgateway.ca/ns/Users/SwiftSignup.aspx
	
	foreach($providers as $provider){
		echo '<OPTION';
		if(isset($_POST["PROVIDER"])){ 
			if ($_POST["PROVIDER"] == $provider) {
				echo " SELECTED";
			}
		}
		echo '>' . $provider . '</OPTION>';
	}
?></SELECT><BR>
Number: <INPUT NAME="PHONE" TYPE="PHONE" VALUE="<?php 
if(isset($_POST["PHONE"])){
	echo $_POST["PHONE"];
} else {
	echo "+19055123067";
}
?>"><BR>
Message: <TEXTAREA NAME="MESSAGE"><?php 
if(isset($_POST["MESSAGE"])){ echo $_POST["MESSAGE"]; }
?></TEXTAREA><BR>
<INPUT TYPE="SUBMIT">
</FORM>