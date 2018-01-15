<?php

session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];

if (isset($_POST['id'])) {

    $shift_id = filter_input(INPUT_POST, 'id');
    $user = filter_input(INPUT_POST, 'user');
    $date = filter_input(INPUT_POST, 'date');
    $new_shift = filter_input(INPUT_POST, 'new_shift');
    $table_array;
    $shift_name;



    $dates_array = array();

    $table_array;

    $shift_week_info = "SELECT * FROM compiled_list WHERE id = '$shift_id' AND company_id = '$company_id'";
    $shift_week_info_result = mysqli_query($db, $shift_week_info);
    $result = "";
    if ($shift_week_info_result) {

        while ($row = $shift_week_info_result->fetch_assoc()) {

            $dates_array = json_decode($row['dates_array'], TRUE);

            $table_array = unserialize($row['tablearray']);
        }


        (int) $shifted_users = count($table_array);

        for ((int) $k = 0; $k < $shifted_users; $k++) {

            if ($table_array[(int) $k][0] == $user) {


                if ((int) $new_shift == 0) {
                    $shift_name = "OFF";
                } else {
                    $get_shift = "SELECT shift_name FROM shifts WHERE shift_id = '$new_shift'";
                    $get_shift_result = mysqli_query($db, $get_shift);

                    if ($get_shift_result) {
                        while ($row_shift = $get_shift_result->fetch_assoc()) {
                            //unset($new_shift);
                            $shift_name = $row_shift['shift_name'];
                        }
                    }
                }




                $rownum = $k;
                $table_array[(int) $k][(int) $date] = $shift_name;
                
                var_dump($table_array[(int) $k][(int) $date]);
                exit;
            }
        }

        foreach ($table_array as $array_val) {
            $result .= '<tr>';
            foreach ($array_val as $sub) {
                $result .= '<td>';
                $result .= $sub;
                $result .= '</td>';
            }
            $result .= '</tr>';
        }

        $result .= '</table></div>';
        var_dump($result);
        exit;
    } else {
        echo mysqli_error($db);
    }
}
