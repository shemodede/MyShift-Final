<?php

session_start();
include 'config.php';

if (isset($_POST['id']) && isset($_POST['user']) && isset($_POST['date'])) {
    $shift_id = filter_input(INPUT_POST, 'id');
    $user = filter_input(INPUT_POST, 'user');
    $date = filter_input(INPUT_POST, 'date');
    $table_array;

    $select_curr_array = "SELECT tablearray FROM compiled_list WHERE id = '$shift_id'";
    $select_curr_array_result = mysqli_query($db, $select_curr_array);
    $dates_sep_array;
    if ($select_curr_array_result) {

        while ($row = $select_curr_array_result->fetch_assoc()) {
            $table_array = unserialize($row['tablearray']);
            $shifted_users = count($table_array);
        }
    }

    $full_name = "";
    $get_user_name = "SELECT first_name, last_name FROM personnel WHERE personnel_id = '$user'";
    $get_user_name_result = mysqli_query($db, $get_user_name);

    if ($get_user_name_result) {
        while ($row = $get_user_name_result->fetch_assoc()) {
            $first = $row['first_name'];
            $last = $row['last_name'];

            $full_name = $first . " " . $last;
        }
    } else {
        echo "1" . mysqli_error($db);
    }

    $date_text;
    $get_date = "SELECT dates_array FROM compiled_list WHERE id = '$shift_id'";
    $get_date_result = mysqli_query($db, $get_date);
    if ($get_date_result) {
        while ($row = $get_date_result->fetch_assoc()) {
            $dates_array = json_decode($row['dates_array'], TRUE);
            
            $date_text = $dates_array[$date]['date'];
        
       
        }
    } else {
        echo mysqli_error($db);
    }

    function getDateKey($array, $dateed) {
        $dates_sep_array = $array[0];
        $key = array_search($dateed, $dates_sep_array);
        return $key;
    }

    function getNameKey($array, $name) {
        $count = count($array);
        for ($i = 0; $i < $count; $i++) {
            if ($array[$i][0] == $name) {
                $key = $i;
            }
        }
        return $key;
    }
    $curr_shift = $table_array[getNameKey($table_array, $full_name)][getDateKey($table_array, $date_text) - 1];
    if($curr_shift == "")
    {
        echo 'OFF';
    }else{
        echo $curr_shift;
    }
} else {
    var_dump('Params not set..');
    exit;
}