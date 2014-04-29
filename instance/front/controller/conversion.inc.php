<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$urlArgs = _cg("url_vars");
$id = $urlArgs[0];
$conversion_call= q("Select * from conversion_history where patient_id='{$id}' and type='Call'");
$count_call=q("Select count(date) as total_call,date from conversion_history where patient_id='{$id}' and type='Call' Group By date ");

$conversion_message = q("Select * from conversion_history where patient_id='{$id}'and type='Message' ");
$count_message=q("Select count(date) as total_message,date from conversion_history where patient_id='{$id}' and type='Message' Group By date ");


$no = qs("Select * From scheduled_patient where id='{$id}' ");

$jsInclude ="conversion.js.php";
?>