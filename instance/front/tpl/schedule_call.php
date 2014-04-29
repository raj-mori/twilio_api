<div class="row">
    <div class="col-lg-3 col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Add Call </strong></div>
            <div class="panel-body">
                <form method="post" action="<?php l('schedule_call') ?>" class="form-horizontal" role="form">

                    <div class="form-group ">
                        <label  class="col-lg-4 col-md-2 control-label">Phone #</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text"  name="phno" id="phno" value="" placeholder="Add Phone Number" required>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label  class="col-lg-4 col-md-2 control-label">Date</label>
                        <div class="col-lg-8">
                            <div class="input-group input-group-sm" >
                                <input type="text" class="form-control" id="datepicker"  name="datepicker" 
                                       value="<?php print $notification_date; ?>" placeholder="Pick Date " required>
                                <span onclick="$('#datepicker').datepicker('show');" class="input-group-addon pointer"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
 <!--    			    <input class="form-control" type="text"  name="logTime" id="logTime" value="" placeholder="Pick Date" required>-->
                        </div>
                    </div>

                    <div class="form-group ">
                        <label  class="col-lg-4 col-md-2 control-label">Call Content</label>
                        <div class="col-lg-8">
                            <textarea class="form-control" type="text"  name="call_content" id="call_content" value="" placeholder="Add Content"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-10">
                            <input type="hidden" name="call_id"  value="">
                            <input type="submit" class="btn btn-primary" value="Add">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-9" >
        <div class="panel panel-default">
            <div class="panel-heading"><strong>List of Call Schedule&nbsp;&nbsp;</strong>
                <span id="next_page_no" class="hide">0</span>
                <span id="countdata" class="hide"><?php print $length; ?></span>

                <span id="prebtn" class="btn btn-default" onclick="getPrerecord();"><i class="glyphicon glyphicon-chevron-left"></i></span>
                <span id="nextbtn" class="btn btn-default" onclick="getNextrecord();"><i class="glyphicon glyphicon-chevron-right"></i></span>&nbsp;

            </div>
            <div class="panel-body">
                <!-- Modal -->



                <?php
                $cr = 1;
                if (!empty($call)):
                    ?>

                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th>#</th>

                                <th>Date</th>
                                <th>Phone No</th>
                                <th>Call Content</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="costList">
                            <?php foreach ($call as $each_cost): ?>
                                <tr>
                                    <td><?php print $cr; ?></td>

                                    <td>
                                        <?php
                                        $newdate = date('m/d/Y', strtotime($each_cost['date']));
                                        print $newdate;
                                        ?>
                                    </td>
                                    <td><?php print $each_cost['phno']; ?></td>

                                    <td><?php print $each_cost['call_content']; ?></td>

                                    <td>
                                        <a href="javascript:void(0);" onclick="return DeleteCost('schedule_call/<?php print $each_cost['id']; ?>')"><i class="glyphicon glyphicon-trash" title="Delete"></i></a>
                                    </td><td><i class="glyphicon glyphicon-earphone"></i>
                                        <span id="warningbtn_<?php print $each_cost['id']; ?>" type="button" class="label label-warning pointer"  onclick="makeCall('<?php print $each_cost['id']; ?>');">Make a Call</span>
                                    </td>

                                </tr>
                                <?php $cr++; ?>    
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                <?php else: ?>
                    <div>No Call available</div>
                <?php endif; ?>

            </div>
        </div>
    </div>   </div>
<script type="text/javascript">

</script>
<div class="modal fade" id="callModal">
    <div class="modal-dialog">
        <div class="modal-content">
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
<?php include_once('message1.php') ?>   