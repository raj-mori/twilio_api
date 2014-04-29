<?php
/**
 *  Controller page for vehicle cost management
 * 
 * @author Raj Bose<raj.bose1989@gmail.com>
 * @since January 24, 2014
 * 
 */
$urlArgs = _cg("url_vars");
if($_REQUEST['status']){
    $id=$_REQUEST['id'];
    $query="SELECT * FROM scheduled_call where id = '{$id}'";
    $call_data=qs($query);
   
    include _PATH . "instance/front/tpl/call.php";
 die;

}

#Get Next Pre data
if ($_REQUEST['Nextrecord']) {
    $limit = $_REQUEST['Limit'];
    echo $limit;

    $call = q("select * from scheduled_call order by id DESC LIMIT {$limit},10");

    include _PATH . "instance/front/tpl/schedule_call_data.php";

    die;
}






# Handler for new cost.
$date = $_REQUEST['datepicker'];
$newdate = date('Y-m-d', strtotime($date));
if (isset($_REQUEST['phno']) && $_REQUEST['phno'] != '') {
 
    qi('scheduled_call', array(
	
	'phno' => _escape($_REQUEST['phno']),
	'date' => _escape($newdate),
	'call_content' => _escape($_REQUEST['call_content']),
        'isCall'=> '0'
	
    ));

}
# Get list of all cost
$call = q("select * from scheduled_call order by id DESC ");
$length = GetdataFromdb($call);
//$length = Quote_dashboard::GetdataFromdb($call);

$id_delete=$urlArgs[0];
$deletecall = qd("scheduled_call","id = '{$id_delete}'");

if ($deletecall) {
    $greetings = "Call Detail deleted successfully";
}

$jsInclude = "schedule_call.js.php";
_cg("page_title", "Call");
?>