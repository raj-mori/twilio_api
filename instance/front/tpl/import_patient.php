

<div class="col-lg-12 " >
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Import csv file   &nbsp;&nbsp;</strong>
        </div>
        <div class="panel-body">
            <form method="post" action="<?php l('import_patient') ?>" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="form-group ">
                    <label  class="col-lg-2  control-label">Select .csv File</label>
                    <div class="col-lg-5">
                        <input class="form-control" type="File"  name="file_csv" id="file_csv" value="" required>
                        
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
<!--                        <input type="hidden" name="patient_id"  value="">-->
                        <input type="submit" class="btn btn-primary" value="Add">
                    </div>
                </div>
            </form>

        </div></div></div>

<?php include_once('message1.php') ?>