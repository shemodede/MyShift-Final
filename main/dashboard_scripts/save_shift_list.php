<?php

session_start();
include 'config.php';
$company_id = $_SESSION['user_info'][6];
$list_id;
if (isset($_POST['tablearray'])) {

    $encoded_array = $_POST['tablearray'];
    $array = json_decode($_POST['tablearray']);
    $full_hours_json = serialize(json_decode(filter_input(INPUT_POST, 'full_hours_array')));
//    var_dump(json_decode($full_hours_json));exit;
    //$full_hours_json_trim = substr($full_hours_json, 1, -1);

    $get_list_id = "SELECT max(id) AS id FROM compiled_list WHERE completed = 0";
    $get_list_id_result = mysqli_query($db, $get_list_id);

    if ($get_list_id_result) {
        while ($row = $get_list_id_result->fetch_assoc()) {
            $list_id = $row['id'];
            $result;
            $result = '<div class="table-responsive">';

            $result .= '<table id="mainTable" class="table editable-table table-bordered table-striped">';

            foreach ($array as $array_val) {
                $result .= '<tr class="shift_info">';
                foreach ($array_val as $sub) {
                    $result .= '<td>';
                    $result .= $sub;
                    $result .= '</td>';
                }
                $result .= '</tr>';
            }

            $result .= '</table></div>';
            
            $serialized_array = serialize($array);
            $save_array = "UPDATE compiled_list SET tablearray = '$serialized_array', table_html = '$result', full_hours_array = '$full_hours_json', completed = 1 WHERE company_id = '$company_id' AND id = '$list_id' AND completed = 0";
            $save_array_result = mysqli_query($db, $save_array);
            if ($save_array_result) {
            echo "success";
            } else {
              echo mysqli_error($db);
            }
        }
    }
}