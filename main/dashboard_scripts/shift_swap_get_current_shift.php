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

    if ($select_curr_array_result) {
       
        $rowname = 0;
        while ($row = $select_curr_array_result->fetch_assoc()) {
            $table_array = unserialize($row['tablearray']);
            //var_dump($table_array[0][3][1]);
            //var_dump($table_array[][0]);
            //$selected_user = "";
            (int) $shifted_users = count($table_array);

            for ((int) $k = 0; $k < $shifted_users; $k++) {

                if ($table_array[(int) $k][0] == $user) {

                    $rownum = $k;
                    echo $table_array[(int) $k][(int)$date];
                   
                }
            }
        }

        //var_dump($table_array[$rownum][$date]);
    }
} else {
    var_dump('Params not set..');
    exit;
}