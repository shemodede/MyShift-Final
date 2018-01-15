<?php
session_start();
include 'config.php';
$company_id = $_SESSION['user_info'][6];


if (isset($_POST['table_id'])) {
    $list_id = $_POST['table_id'];
    $get_array = "SELECT * FROM compiled_list WHERE company_id = '$company_id' AND id = '$list_id'";
    $get_array_result = mysqli_query($db, $get_array);

    if ($get_array_result) {
        $serialized_array;
        $result = "";

        while ($row = $get_array_result->fetch_assoc()) {
            $serialized_array = $row['tablearray'];
            
            $result .= '<table id="mainTable" class="table editable-table table-bordered table-striped">';
            $unser_array = unserialize($serialized_array);
            
           
            
            foreach ($unser_array as $array_val) {
                $result .= '<tr>';
                foreach ($array_val as $sub) {
                    $result .= '<td contenteditable="true">';
                    $result .= $sub;
                    $result .= '</td>';
                }
                $result .= '</tr>';
            }
        }



        echo $result;
    }
} else {
    echo 'ID not set';
}

