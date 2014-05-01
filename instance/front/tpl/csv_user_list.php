<?php 
$patient_import = q("Select * from csv_import_patient ");?>

 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
        <div class="panel panel-default">
            <div class="panel-heading"><strong>List of csv file's data &nbsp;&nbsp;</strong>
                 </div>
            <div class="panel-body">
                <!-- Modal -->



                <?php
                $cr = 1;
                if (!empty($patient_import)):
                    ?>

                    <table class="table table-hover" >
                        <thead>

                            <tr>
                                <th>#</th>

                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Birth Date</th>
                                <th>Gender</th>

                               
                                 </tr>
                        </thead>
                        <tbody id="costList">
                            <?php foreach ($patient_import as $each_cost): ?>
                                <tr>
                                    <td><?php print $cr; ?></td>

                                    <td>
                                        <?php print $each_cost['first_name']; ?>
                                    </td> 
                                    <td>
                                        <?php print $each_cost['last_name']; ?>
                                    </td> 
                                    <td>
                                        <?php print $each_cost['birth_date']; ?>
                                    </td> 
                                    <td>
                                        <?php print $each_cost['gender']; ?>
                                    </td> 
                                    <td>    </td>
                                </tr>
                                <?php $cr++; ?>    
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                <?php else: ?>
                    <div>No file available</div>
                <?php endif; ?>