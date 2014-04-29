<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Add Message </strong></div>
            <div class="panel-body">
                <form method="post" action="<?php l('schedule_message') ?>" class="form-horizontal" role="form">

                    <div class="form-group ">
                        <label  class="col-lg-2  control-label">Phone #</label>
                        <div class="col-lg-5">
                            <input class="form-control" type="text"  name="phno" id="phno" value="" placeholder="Add Phone Number" required>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label  class="col-lg-2 control-label">Date</label>
                        <div class="col-lg-5">
                            <div class="input-group input-group-sm" >
                                <input type="text" class="form-control" id="datepicker"  name="datepicker" 
                                       value="<?php print $notification_date; ?>" placeholder="Pick Date " required>
                                <span onclick="$('#datepicker').datepicker('show');" class="input-group-addon pointer"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
 <!--    			    <input class="form-control" type="text"  name="logTime" id="logTime" value="" placeholder="Pick Date" required>-->
                        </div>
                    </div>

                    <div class="form-group ">
                        <label  class="col-lg-2 control-label">Message Title</label>
                        <div class="col-lg-5">
                            <input class="form-control" type="text"  name="message_title" id="message_title" value="" placeholder="Add Title"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label  class="col-lg-2 control-label">Message Body</label>
                        <div class="col-lg-5">
                            <textarea class="form-control" type="text"  name="message_body" id="message_body" value="" placeholder="Add Message"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="hidden" name="message_id"  value="">
                            <input type="submit" class="btn btn-primary" value="Add">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12" >
        <div class="panel panel-default">
            <div class="panel-heading"><strong>List of Message Schedule&nbsp;&nbsp;</strong>
                <span id="next_page_no" class="hide">0</span>
                <span id="countdata" class="hide"><?php print $length; ?></span>

                <span id="prebtn" class="btn btn-default" onclick="getPrerecord();"><i class="glyphicon glyphicon-chevron-left"></i></span>
                <span id="nextbtn" class="btn btn-default" onclick="getNextrecord();"><i class="glyphicon glyphicon-chevron-right"></i></span>&nbsp;

            </div>
            <div class="panel-body">
                <!-- Modal -->



                <?php
                $cr = 1;
                if (!empty($message)):
                    ?>

                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th>#</th>

                                <th>Date</th>
                                <th>Phone No</th>
                                <th>Message Title</th>
                                <th>Message</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="costList">
                            <?php foreach ($message as $each_cost): ?>
                                <tr>
                                    <td><?php print $cr; ?></td>

                                    <td>
                                        <?php
                                        $newdate = date('m/d/Y', strtotime($each_cost['date']));
                                        print $newdate;
                                        ?>
                                    </td>
                                    <td><?php print $each_cost['phno']; ?></td>
                                    <td><?php print $each_cost['message_title']; ?></td>
                                    <td><?php print $each_cost['message_body']; ?></td>

                                    <td>
                                        <a href="javascript:void(0);" onclick="return DeleteCost('schedule_message/<?php print $each_cost['id']; ?>')"><i class="glyphicon glyphicon-trash" title="Delete"></i></a>
                                    </td><td><span id="warningbtn_<?php print $each_cost['id']; ?>" type="button" class="label label-warning pointer"  onclick="sendMessage('<?php print $each_cost['id']; ?>');">Send Message</span>
                                    </td>

                                </tr>
                                <?php $cr++; ?>    
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                <?php else: ?>
                    <div>No Message available</div>
                <?php endif; ?>

            </div>
        </div>
    </div>   </div>
<script type="text/javascript">

</script>
<div class="modal fade" id="callModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                   <div class="modal-body" id="div1">
                <div class="alert alert-success" id="success" >
                </div>
                
                
                </br>
                <div style="text-align:right;">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>


                </div>
            </div>
            <div class="modal-body" id="div2">
                <div class="alert alert-danger" id="error" >
                </div>
                
                
                </br>
                <div style="text-align:right;">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>


                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('message1.php') ?>   