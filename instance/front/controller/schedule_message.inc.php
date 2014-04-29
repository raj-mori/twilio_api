<?php

/**
 *  Controller page for vehicle cost management
 * 
 * @author Raj Bose<raj.bose1989@gmail.com>
 * @since January 24, 2014
 * 
 */
$urlArgs = _cg("url_vars");

#Sent Message
$urlArgs = _cg("url_vars");
if ($_REQUEST['status']) {
    $id = $_REQUEST['id'];
    $query = "SELECT * FROM scheduled_message where id = '{$id}'";
    $message_data = qs($query);

    include _PATH . "instance/front/tpl/message.php";
    die;
}

#Get Next Pre data
if ($_REQUEST['Nextrecord']) {
    $limit = $_REQUEST['Limit'];
    echo $limit;

    $message = q("select * from scheduled_message order by id DESC LIMIT {$limit},10");

    include _PATH . "instance/front/tpl/schedule_message_data.php";

    die;
}

# Handler for new message.
$date = $_REQUEST['datepicker'];
$newdate = date('Y-m-d', strtotime($date));
if (isset($_REQUEST['phno']) && $_REQUEST['phno'] != '') {

    qi('scheduled_message', array(
        'phno' => _escape($_REQUEST['phno']),
        'date' => _escape($newdate),
        'message_title' => _escape($_REQUEST['message_title']),
        'message_body' => _escape($_REQUEST['message_body']),
    ));
}
# Get list of all cost
$message = q("select * from scheduled_message order by id DESC LIMIT 0,10");

$length = GetdataFromdb($call);
$id_delete=$urlArgs[0];
$deletemessage = qd(" scheduled_message","id = '{$id_delete}'");

if ($deletemessage) {
    $greetings   = "Message Detail deleted successfully";
}



$jsInclude = "schedule_message.js.php";
_cg("page_title", "Schedule Message");
?>
