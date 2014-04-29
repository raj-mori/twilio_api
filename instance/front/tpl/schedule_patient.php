<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Add Patient </strong></div>
            <div class="panel-body">
                <form method="post" action="<?php l('schedule_patient') ?>" class="form-horizontal" role="form">
                    <div class="form-group ">
                        <label  class="col-lg-2  control-label">Name</label>
                        <div class="col-lg-5">
                            <input class="form-control" type="text"  name="name" id="name" value="" placeholder="Add Name" required>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label  class="col-lg-2  control-label">Age</label>
                        <div class="col-lg-5">
                            <input class="form-control" type="text"  name="age" id="age" value="" placeholder="Add Age" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label  class="col-lg-2  control-label">Gender</label>
                        <div class="col-lg-5">
                            <select class="form-control "  name="gender" id="gender" required >
                                <option>Select</option>                           

                                <option value="Male"> Male</option>
                                <option value="Female">Female</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label  class="col-lg-2 control-label">Address</label>
                        <div class="col-lg-5">
                            <input class="form-control" type="text"  name="address" id="address" value="" placeholder="Add Address" >
                        </div>
                    </div>

                    <div class="form-group ">
                        <label  class="col-lg-2  control-label">Phone #</label>
                        <div class="col-lg-5">
                            <input class="form-control" type="text"  name="phno" id="phno" value="" placeholder="Add Phone Number" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label  class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-5">
                            <input class="form-control" type="email"  name="email" id="email" value="" placeholder="Add Email" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label  class="col-lg-2 control-label">Message</label>
                        <div class="col-lg-5">
                            <input class="form-control" type="text"  name="message" id="message" value="" placeholder="Add Message" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="hidden" name="patient_id"  value="">
                            <input type="submit" class="btn btn-primary" value="Add">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
        <div class="panel panel-default">
            <div class="panel-heading"><strong>List of Patient&nbsp;&nbsp;</strong>
                <span id="next_page_no" class="hide">0</span>
                <span id="countdata" class="hide"><?php print $length; ?></span>

                <span id="prebtn" class="btn btn-default" onclick="getPrerecord();"><i class="glyphicon glyphicon-chevron-left"></i></span>
                <span id="nextbtn" class="btn btn-default" onclick="getNextrecord();"><i class="glyphicon glyphicon-chevron-right"></i></span>&nbsp;

            </div>
            <div class="panel-body">
                <!-- Modal -->



                <?php
                $cr = 1;
                if (!empty($patient)):
                    ?>

                    <table class="table table-hover" >
                        <thead>

                            <tr>
                                <th>#</th>

                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>

                                <th>Address</th>
                                <th>Phone no</th>
                                <th>Email</th>
                                <th>Total Call</th>
                                <th>Total Message</th>

                                <th>Last Message</th>

                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody id="costList">
                            <?php foreach ($patient as $each_cost): ?>
                                <tr>
                                    <td><?php print $cr; ?></td>

                                    <td>
                                        <?php print $each_cost['name']; ?>
                                    </td>
                                    <td><?php print $each_cost['age']; ?></td>
                                    <td><?php print $each_cost['gender']; ?></td>
                                    <td><?php print $each_cost['address']; ?></td>

                                    <td><?php print $each_cost['phno']; ?></td>
                                    <td><?php print $each_cost['email']; ?></td>
                                    <td><?php print $each_cost['no_of_call']; ?> </td>
                                    <td><?php print $each_cost['no_of_messages']; ?> </td>
                                    <td id='1_<?php print $each_cost['id']; ?>'><?php print $each_cost['message_body'] ?>
                                        <span onclick="edit_message('<?php print $each_cost['id']; ?>');" >
                                            <i class="glyphicon glyphicon-edit pointer "  title="Edit Message"></i>
                                        </span></td>
                                    <td id='2_<?php print $each_cost['id']; ?>' style="display: none"> <textarea  onblur="edit_focus_message('<?php print $each_cost['id']; ?>');" id="edit_focus_message_<?php print $each_cost['id']; ?>" class="form-control"  type="text"><?php print $each_cost['message_body'] ?></textarea></td>


                                    <td><span  type="button" class="label label-warning pointer"  title="Click To Send Message" onclick="sendMessage('<?php print $each_cost['id']; ?>');">Send Message</span>
                                        &nbsp;&nbsp;&nbsp;
                                        <i class="glyphicon glyphicon-earphone"></i>   <span title="Click To Make a Call" type="button" class="label label-warning pointer "  onclick="makeCall('<?php print $each_cost['id']; ?>');">&nbsp;Make a Call</span>
                                        &nbsp;&nbsp;&nbsp;
                                        <span title="Click To See Conversion History" type="button" class="label label-info pointer "  onclick="conversion_history('<?php print $each_cost['id']; ?>');">&nbsp;Conversion History</span>

                                    </td>
                                    <td>
                                        <a  onclick="return previewModalContent('<?php print $each_cost['id']; ?>')"><i class="glyphicon glyphicon-edit pointer" title="Edit"></i></a>&nbsp;&nbsp;
                                        <a href="javascript:void(0);"  onclick="return DeleteCost('schedule_patient/<?php print $each_cost['id']; ?>')"><i class="glyphicon glyphicon-trash" title="Delete"></i></a>
                                    </td>
                                </tr>
                                <?php $cr++; ?>    
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                <?php else: ?>
                    <div>No patient available</div>
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

<?php $data; ?>
<div class="modal fade" id="preview"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog" style="width:800px;">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit Patient Detail</h4>
            </div>
            <div class="modal-body" >

                <form method="post" action="<?php l('schedule_patient') ?>"  class="form-horizontal" role="form">


                    <div class="form-group ">
                        <label  class="col-lg-2  control-label">Name</label>
                        <div class="col-lg-5">
                            <input class="form-control" type="text"  name="name_edit" id="name_edit" placeholder="Add Name" required>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label  class="col-lg-2  control-label">Age</label>
                        <div class="col-lg-5">
                            <input class="form-control" type="text"  name="age_edit" id="age_edit" value="<?php print $data['age']; ?>" placeholder="Add Age" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label  class="col-lg-2  control-label" >Gender</label>
                        <div class="col-lg-5">
                            <select class="form-control " value="<?php print $data['gender']; ?>" name="gender_edit" id="gender_edit" required >
                                <option>Select</option>                           

                                <option value="Male"> Male</option>
                                <option value="Female">Female</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label  class="col-lg-2 control-label">Address</label>
                        <div class="col-lg-5">
                            <input class="form-control" type="text"  name="address_edit" id="address_edit" value="<?php print $data['address']; ?>" placeholder="Add Address" >
                        </div>
                    </div>

                    <div class="form-group ">
                        <label  class="col-lg-2  control-label">Phone #</label>
                        <div class="col-lg-5">
                            <input class="form-control" type="text"  name="phno_edit" id="phno_edit" value="<?php print $data['phno']; ?>" placeholder="Add Phone Number" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label  class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-5">
                            <input class="form-control" type="email"  name="email_edit" id="email_edit" value="<?php print $data['email']; ?>" placeholder="Add Email" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label  class="col-lg-2 control-label">Message</label>
                        <div class="col-lg-5">
                            <input class="form-control" type="text"  name="message_edit" id="message_edit" value="<?php print $data['message_body']; ?>" placeholder="Add Message" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-10">
                            <input type="hidden" name="patient_id" id="patient_id" value="<?php print $data['id'];
?> ">
                            <input type="submit"   class="btn btn-primary" value="Save">


                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php include_once('message1.php') ?>