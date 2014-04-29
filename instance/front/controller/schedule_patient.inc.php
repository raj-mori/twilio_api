<?php

/**
 *  Controller page for vehicle cost management
 * 
 * @author Raj Bose<raj.bose1989@gmail.com>
 * @since January 24, 2014
 * 
 */
# For Edit
$urlArgs = _cg("url_vars");
$id_delete=$urlArgs[0];

# Delete patient
$deletepatient = qd("scheduled_patient"," id = '{$id_delete}'");
   
if ($deletepatient) {
    
    $greetings = "Patient deleted successfully";
}

#Edit patient
if ($_REQUEST['status_edit']) {
    $id = $_REQUEST['id'];
    $data = qs("select * from scheduled_patient where id='{$id}'");

    print_r($data['name'] . "^" . $data['age'] . "^" . $data['gender'] . "^" . $data['address'] . "^" . $data['phno'] . "^" . $data['email'] . "^" . $data['message_body'] . "^" . $data['id']);

    die;
}

if ($_REQUEST['name_edit']) {

    $edit = qu('scheduled_patient', array('name' => $_REQUEST['name_edit'],
        'age' => $_REQUEST['age_edit'],
        'gender' => $_REQUEST['gender_edit'],
        'email' => $_REQUEST['email_edit'],
        'address' => $_REQUEST['address_edit'],
        'phno' => $_REQUEST['phno_edit'],
        'message_body' => $_REQUEST['message_edit']), "id='{$_REQUEST['patient_id']}'");
    if ($edit) {

        $greetings = "Patient Detail updated successfully";
    }
}

# Edit Message
$response_message = array();
if($_REQUEST['message_status'])
{
    $edit = qu('scheduled_patient',array('message_body' => $_REQUEST['message']),"   id = '{$_REQUEST['id']}'  " );
    $response_message[msg] ='1';
    print json_encode($response_message);
    die;
}

#Sent Message

if ($_REQUEST['statusCall']) {
    $id = $_REQUEST['id'];
    $query = "SELECT * FROM scheduled_patient where id = '{$id}'";
    $call_data = qs($query);

    include _PATH . "instance/front/tpl/call.php";
    die;
}
if ($_REQUEST['status']) {
    $id = $_REQUEST['id'];
    $query = "SELECT * FROM scheduled_patient where id = '{$id}'";
    $message_data = qs($query);

    include _PATH . "instance/front/tpl/message.php";
    die;
}

#Get Next Pre data
if ($_REQUEST['Nextrecord']) {
    $limit = $_REQUEST['Limit'];
    echo $limit;

    $patient = q("select * from scheduled_patient order by id DESC LIMIT {$limit},10");

    include _PATH . "instance/front/tpl/schedule_patient_data.php";

    die;
}

# Handler for new patient.
$date = $_REQUEST['datepicker'];
$newdate = date('Y-m-d', strtotime($date));
if (isset($_REQUEST['phno']) && $_REQUEST['phno'] != '') {

    qi('scheduled_patient', array(
        'name' => _escape($_REQUEST['name']),
        'age' => _escape($_REQUEST['age']),
        'phno' => _escape($_REQUEST['phno']),
        'address' => _escape($_REQUEST['address']),
        'message_body' => _escape($_REQUEST['message']),
        'email' => _escape($_REQUEST['email']),
        'gender' => _escape($_REQUEST['gender'])
    ));
}
# Get list of all patient
$patient = q("select * from scheduled_patient order by id DESC LIMIT 0,10");

//$length = GetdataFromdb($call);





$jsInclude = "schedule_patient.js.php";
_cg("page_title", "Schedule Patient");
?>
