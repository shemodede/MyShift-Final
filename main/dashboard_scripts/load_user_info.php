<?php

session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $get_user_info = "SELECT * FROM personnel WHERE personnel_id = '$id' AND company_id = '$company_id'";
    $get_user_info_res = mysqli_query($db, $get_user_info);

    if ($get_user_info_res) {
        while ($row = $get_user_info_res->fetch_assoc()) {
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $username = $row['username'];
            $cell_num = $row['cell_number'];
            $email = $row['email'];
            $role = $row['role'];
            $privilege = $row['admin'];


            echo json_encode(array('firstname' => $first_name, 'lastname' => $last_name, 'username' => $username, 'cellnumber' => $cell_num, 'email' => $email, 'role' => $role, 'privilege' => $privilege));
        }
    }
}
