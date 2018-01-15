<?php

session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];
$user_id = $_SESSION['user_info'][0];

if (isset($_POST['curr']) && isset($_POST['new'])) {
    $curr_pass = $_POST['curr'];
    $new_pass = $_POST['new'];

    $select_curr_pass = "SELECT password FROM personnel WHERE company_id = '$company_id' AND personnel_id = '$user_id'";
    $select_curr_pass_result = mysqli_query($db, $select_curr_pass);

    if ($select_curr_pass_result) {
        while ($row = $select_curr_pass_result->fetch_assoc()) {
            $current_password = $row['password'];

            if ($curr_pass == $current_password) {
                $update_pass = "UPDATE personnel SET password = '$new_pass' WHERE company_id = '$company_id' AND personnel_id = '$user_id'";
                $update_pass_result = mysqli_query($db, $update_pass);

                if ($update_pass_result) {
                    echo 'success';
                } else {
                    echo mysqli_error($db);
                }
            }else{
                echo 'no match';
            }
        }
    }
}
