<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Call Detail &nbsp;&nbsp;</strong></div>
        <div class="panel-body">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Patient Call Detail   &nbsp;&nbsp;</strong>
                    </div>
                    <div class="panel-body">


                        <table class="table table-hover" >
                            <thead>

                                <tr>
                                    <th>#</th>
                                    <th>Name</th>

                                    <th>Date & Time</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $cr = $limit + 1; ?>

                                <?php foreach ($conversion_call as $each_data): ?>
                                    <tr>
                                        <td><?php print $cr; ?></td>

                                        <td>
                                            <?php print $each_data['patient_name']; ?>
                                        </td>

                                        <td>
                                            <?php print $each_data['created_at']; ?></td>
                                    </tr>
                                </tbody>
                                <?php $cr++; ?>    
                            <?php endforeach; ?>
                        </table>
                    </div></div></div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" > <div class="panel panel-default">
                    <div class="panel-heading"><strong>Chart : &nbsp;&nbsp;</strong>
                    </div>

                    <div id="container" ></div>


                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Message Detail &nbsp;&nbsp;</strong></div>
        <div class="panel-body">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Patient Message Detail  &nbsp;&nbsp;</strong>
                    </div>
                    <div class="panel-body">


                        <table class="table table-hover" >
                            <thead>

                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Message</th>
                                    <th>Date & Time</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $cr = $limit + 1; ?>

                                <?php foreach ($conversion_message as $each_data): ?>
                                    <tr>
                                        <td><?php print $cr; ?></td>

                                        <td>
                                            <?php print $each_data['patient_name']; ?>
                                        </td>
                                        <td>
                                            <?php print $each_data['message']; ?></td>
                                        <td>
                                            <?php print $each_data['created_at']; ?></td>
                                    </tr>
                                </tbody>
                                <?php $cr++; ?>    
                            <?php endforeach; ?>
                        </table>
                    </div></div></div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" > <div class="panel panel-default">
                    <div class="panel-heading"><strong>Chart : &nbsp;&nbsp;</strong>
                    </div>

                    <div id="container_message" ></div>


                </div>
            </div>
        </div>
    </div>
</div>
