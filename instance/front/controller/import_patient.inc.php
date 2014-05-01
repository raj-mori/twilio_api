<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_FILES['file_csv'])) {
    
    if(!(strtoupper(substr($_FILES['file_csv']['name'],-4))==".CSV"))
    {
        $error="Plz select only .CSV file";
      
    }
    else{
    $file_tmp_name = $_FILES['file_csv']['tmp_name'];
    $file_new_name = mt_rand(0, 999999) . $_FILES['file_csv']['name'];
    $file_name = _PATH . "instance/front/media/csv/" . $file_new_name;

    move_uploaded_file($file_tmp_name, $file_name);

    $file = fopen($file_name, "r");

    while (!feof($file)) {

        $line_of_text[] = fgetcsv($file, 1024);
    }

    $arraySize = sizeof($line_of_text);

    for ($i = 1; $i < $arraySize; $i++) {

        $new_date = date('Y-m-d', strtotime($line_of_text[$i][2]));
        $add = qi('csv_import_patient', array(
            'first_name' => $line_of_text[$i][0],
            'last_name' => $line_of_text[$i][1],
            'birth_date' => $new_date,
            'gender' => $line_of_text[$i][3],
        ));
    }
    fclose($file);


    if ($add) {

        $greetings = "File add successfully";
    } else {
        $error = "Unable to add new file";
    }
}
}
$jsInclude = "import_patient.js.php";
_cg("page_title", "Import csv file");
?>