<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
<!--       <a class="navbar-brand" href="<?php print _U; ?>" style="color:#86B414"><img src="<?php print _MEDIA_URL ?>img/images.jpg" style="height:25px;"/></a>-->
	<a class="navbar-brand" style="color:#86B414;height:25px;" href="http://localhost/cloud/schedule_call">Alert Cloud</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
               <li class="dropdown">
                <a href="<?php l('schedule_patient') ?> ">Patient Scheduled</a>
               
            </li>
            <li class="dropdown">
                <a href="<?php l('schedule_call') ?> ">Scheduled Calls</a>
               
            </li>
            <li class="dropdown">
                <a href="schedule_message" >Scheduled Messages</a>
<!--                <ul class="dropdown-menu">
                    <li><a href="<?php l('dns') ?>">DNS servers</a></li>
                    <li><a href="<?php l('ntp') ?>">NTP servers</a></li>
                    <li><a href="<?php l('') ?>">Syslog servers</a></li>
                    <li><a href="<?php l('vm_manager') ?>">VM Manager</a></li>
                </ul>-->
            </li>
         
            <li class="dropdown">
                <a href="<?php l('notification') ?> ">Notification</a>
               
            </li>
            <li class="dropdown">
                <a href="<?php l('import_patient') ?> ">Import CSV</a>
               
            </li>
            <li class="dropdown">
                <a href="<?php l('csv_user_list') ?> ">Patient List</a>
               
            </li>
<!--            <li class=""><a href="<?php l('login?logout=1') ?>">Logout</a></li>-->
        </ul> <?php $admin = getUserNameFromEmail($_SESSION['user']['user_name']); ?>
	<ul class="nav navbar-nav navbar-right">
                <li class="dropdown hidden-xs">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master Admin&nbsp;<i class="fa fa-user" >&nbsp;</i><b class="caret"></b></a>
                    <ul class="dropdown-menu">
<!--                        <li><a href="<?php print _U ?>preferences"><i class="glyphicon glyphicon-cog"></i> Preferences</a></li>
                        <li><a href="<?php print _U ?>support"><i class="glyphicon glyphicon-envelope"></i> Contact Support</a></li>
                        <li><a href="<?php print _U ?>login_logout_detail"><i class="glyphicon glyphicon-user"></i> Login Detail</a></li>
                        <li class="divider"></li>-->
                        <li><a href="<?php print _U ?>?logout=1"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
    </div>
</nav>


