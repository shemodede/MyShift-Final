<?php

session_start();
include 'config.php';

if (isset($_POST['filter'])) {
    $filter = filter_input(INPUT_POST, 'filter');
    if ($filter != "all" && $filter != "select") {
        $company_id = $_SESSION['user_info'][6];

        $select_shifts = "SELECT * FROM shifts WHERE company_id = '$company_id' AND role_group = '$filter'";
        $select_shifts_result = mysqli_query($db, $select_shifts);

        if ($select_shifts_result) {
            while ($row = $select_shifts_result->fetch_assoc()) {
                $shift_id = $row['shift_id'];
                $shift_name = $row['shift_name'];
                $shift_start = $row['shift_start'];
                $shift_end = $row['shift_end'];
                $shift_duration = $row['shift_duration'];
                $role_group = $row['role_group'];

                echo '<tr>'
                . '<td style="width: 20px">' . $shift_name . '</td>'
                . '<td style="width: 20px">' . $shift_start . '</td>'
                . '<td style="width: 20px">' . $shift_end . '</td>'
                . '<td style="width: 20px">' . $shift_duration . '</td>'
                . '<td style="width: 20px">' . $role_group . '</td>'
                . '</tr>';
            }
        }
    } else {

        $company_id = $_SESSION['user_info'][6];
        //$role = $_POST['role'];

        $select_shifts = "SELECT * FROM shifts WHERE company_id = '$company_id'";
        $select_shifts_result = mysqli_query($db, $select_shifts);

        if ($select_shifts_result) {
            while ($row = $select_shifts_result->fetch_assoc()) {
                $shift_id = $row['shift_id'];
                $shift_name = $row['shift_name'];
                $shift_start = $row['shift_start'];
                $shift_end = $row['shift_end'];
                $shift_duration = $row['shift_duration'];
                $role_group = $row['role_group'];

                echo '<tr>'
                . '<td style="width: 20px">' . $shift_name . '</td>'
                . '<td style="width: 20px">' . $shift_start . '</td>'
                . '<td style="width: 20px">' . $shift_end . '</td>'
                . '<td style="width: 20px">' . $shift_duration . '</td>'
                . '<td style="width: 20px">' . $role_group . '</td>'
                . '</tr>';
            }
        }
    }
}
    