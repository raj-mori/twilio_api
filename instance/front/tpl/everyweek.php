<?php
//UPDATE `pexip`.`scheduled_call` SET `isCall` = '0' WHERE `scheduled_call`.`id` = 16 LIMIT 1;
$query="SELECT * FROM scheduled_call WHERE isCall= '0' ORDER BY id ASC  LIMIT 0,1 ";
$call_data=qs($query);

d($call_data);
include _PATH . "/Services/Twilio.php";
$data = Config::Getdata();


$version = _escape($data['version']);
$AccountSid = _escape($data['account_sid']);
$AuthToken = _escape($data['auth_token']);
$phonenumber = _escape($data['phone_no']);

$client = new Services_Twilio($AccountSid, $AuthToken, $version);


try {
    $call = $client->account->calls->create(
            $phonenumber, $call_data['phno'], 'http://demo.twilio.com/welcome/voice/'
    );
   
        echo ' Call Executed with: ' . $call_data['name'];
       qu('scheduled_call', array('isCall' => '1'), " id = '{$call_data['id']}'  ");
} catch (Exception $e) {
  

   echo 'Sorry!.. Your Call Failed PlZ Check This Error ' . $e->getMessage();
}

?>
