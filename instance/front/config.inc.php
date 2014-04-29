<?php
# Commit Test
//error_reporting(E_ALL);
$auth_pages = array();
$auth_pages[] = "home";
$auth_pages[] = "dns";
$auth_pages[] = "ntp";
$auth_pages[] = "vm_manager";
$auth_pages[] = "conference";
$auth_pages[] = "conferencealiases";
$auth_pages[] = "call";
$auth_pages[] = "message";


if ($_REQUEST['logout']) {
    User::killSession();
}
_auth_url($auth_pages, "login");
?>