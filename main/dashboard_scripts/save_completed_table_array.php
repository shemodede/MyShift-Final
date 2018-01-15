<?php

session_start();
include 'config.php';
$table_id = $_SESSION['table_id'];

if (isset($_POST['tablearray'])) {

    $encoded_array = $_POST['tablearray'];
    $array = json_decode($_POST['tablearray']);



    $result;
    $result = '<div class="table-responsive">';

    $result .= '<table id="mainTable" class="table editable-table table-bordered table-striped">';

    foreach ($array as $array_val) {
        $result .= '<tr>';
        foreach ($array_val as $sub) {
            $result .= '<td contenteditable="true">';
            $result .= $sub;
            $result .= '</td>';
        }
        $result .= '</tr>';
    }

    $result .= '</table></div>';

    $serialized_array = serialize($array);
   
    $save_array = "UPDATE compiled_list SET tablearray = '$serialized_array', table_html = '$result', completed = 1 WHERE id = '$table_id'";
    $save_array_result = mysqli_query($db, $save_array);
    if ($save_array_result) {
        echo $result;
    } else {
        echo mysqli_error($save_array_result);
    }
}