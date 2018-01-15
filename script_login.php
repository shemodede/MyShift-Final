<?php
session_start();
include 'config.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select_user = "SELECT * FROM personnel WHERE username = '$username' AND password = '$password'";
    $select_user_result = mysqli_query($db, $select_user);

    if ($select_user_result) {
        $count = mysqli_num_rows($select_user_result);

        if ($count < 1) {
            echo 'incorrect creds';
        }elseif ($count > 1) {
            echo 'duplicate users';
        } elseif ($count == 1) {
            while ($row = $select_user_result->fetch_assoc()){
                $id = $row['personnel_id'];
                $firstname = $row['first_name'];
                $lastname = $row['last_name'];
                $username = $row['username'];
                $cellnumber = $row['cell_number'];
                $email = $row['email'];
                $company_id = $row['company_id'];
                $role = $row['role'];
                $bio = $row['bio'];
                
                $_SESSION['user_info'] = array($id, $firstname, $lastname, $username, $cellnumber, $email, $company_id, $role, $bio);
            }
            
            echo 'success';
        }
    } elseif (!$select_user_result) {
        echo mysqli_error($db);
    }
} else {
    echo 'params not set';
}