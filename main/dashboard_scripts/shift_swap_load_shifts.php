<?php

session_start();
include 'config.php';

if (isset($_POST['id'])) {
    $id = filter_input(INPUT_POST, 'id');

    $get_shifts = "SELECT shifts_array FROM compiled_list WHERE id = '$id'";
    $get_shifts_result = mysqli_query($db, $get_shifts);

    if ($get_shifts_result) {
        while ($row = $get_shifts_result->fetch_assoc()) {
            $shifts_array = json_decode($row['shifts_array']);

            $result = '<option value="blank">[Select Shift]</option>'
                    . '<option value="0">OFF</option>';

            foreach ($shifts_array as $value) {
                $get_shift_name = "SELECT shift_id, shift_name FROM shifts WHERE shift_id = '$value'";
                $get_shift_name_result = mysqli_query($db, $get_shift_name);
                if ($get_shift_name_result) {
                    while ($row = $get_shift_name_result->fetch_assoc()) {
                        $result .= '<option value="'.$row['shift_id'].'">' . $row['shift_name'] . '</option>';
                    }
                }
            }
            echo $result;
        }
    }
}elseif (isset($_POST['shift_id'])) {
    $shift_id = filter_input(INPUT_POST, 'shift_id');
    
    $get_selected_shift = "SELECT shift_name FROM shifts WHERE shift_id = '$shift_id'";
    $get_selected_shift_result = mysqli_query($db, $get_selected_shift);
    
    if($get_selected_shift_result){
        $result = "";
        while($row = $get_selected_shift_result->fetch_assoc()){
            $result = $row['shift_name'];
        }
        echo $result;
    }
    
}