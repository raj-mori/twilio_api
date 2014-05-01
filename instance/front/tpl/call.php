<?php

include _PATH . "/Services/Twilio.php";
$data = Config::Getdata();


$version = _escape($data['version']);
$AccountSid = _escape($data['account_sid']);
$AuthToken = _escape($data['auth_token']);
$phonenumber = _escape($data['phone_no']);



$client = new Services_Twilio($AccountSid, $AuthToken, $version);
$response = array();

try {
    $call = $client->account->calls->create(
            $phonenumber, $call_data['phno'], 'http://166.78.186.70/alert_cloud/dev/instance/front/tpl/ivrs-extensions/handle-incoming-call.xml'
    );
    $response['msg'] = '1';
    qu('scheduled_patient', array('no_of_call' => $call_data['no_of_call'] + 1), " id = '{$call_data['id']}'  ");
    
     qi('conversion_history',array(
        'patient_id' => $call_data['id'],
        'patient_name' => $call_data['name'],
                       'type' => 'Call',
         'date' => date('Y-m-d'),

        
                   ));
  
   //echo ' Call Executed with:' . $call_data['name'];
} catch (Exception $e) {
    $response['msg'] = '2';

 echo 'Sorry!.. Your Call Failed PlZ Check This Error' . $e->getMessage();
}
print json_encode($response);