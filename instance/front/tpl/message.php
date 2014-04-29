<?php

include _PATH . "/Services/Twilio.php";

$data = Config::Getdata();
$AccountSid = _escape($data['account_sid']);
$AuthToken = _escape($data['auth_token']);

$client = new Services_Twilio($AccountSid, $AuthToken);
$people = array(
    $message_data['phno'] => $message_data['name'],
);

$response = array();

try {
    foreach ($people as $number => $name) {
        $sms = $client->account->messages->sendMessage(
                $data['phone_no'], $number, "{$message_data['message_body']}");
        //  echo "Message Sent Successfully to $name";
        $response['msg'] = '1';
        qu('scheduled_patient', array('no_of_messages' => $message_data['no_of_messages'] + 1), " id = '{$message_data['id']}'  ");

        qi('conversion_history', array(
        'patient_id' => $message_data['id'],
        'patient_name' => $message_data['name'],
        'type' => 'Message',
        'date' => date('Y-m-d'),
        'message' => $message_data['message_body']
        ));
    }
} catch (Exception $e) {
//      echo 'Sorry!.. Your Message Failed PlZ Check This Error' . $e->getMessage();
    $response['msg'] = '2';
}
print json_encode($response);
