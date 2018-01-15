<?php

session_start();

include 'config.php';

$company_id = $_SESSION['user_info'][6];
$personnel_id = $_POST['id'];

$get_team = "SELECT * FROM pending_users WHERE company_id = '$company_id' AND pu_id = '$personnel_id'";
$get_team_result = mysqli_query($db, $get_team);
$array_info = array();
if ($get_team_result) {
    while ($row = $get_team_result->fetch_assoc()) {
        $firstname = $row['first_name'];
        $lastname = $row['last_name'];
        $username = $row['username'];
        $password = $row['password'];
        $cellnumber = $row['cell_number'];
        $email = $row['email'];
        $date_request = $row['request_date'];
        $status = $row['status'];
        $first_letter = strtoupper($row['first_name'][0]);

        $result = json_encode(array('firstname'=>$firstname, 'lastname'=>$lastname, 'username'=>$username, 'password'=>$password, 'cellnumber'=>$cellnumber, 'email'=>$email, 'date_request'=>$date_request));
        echo $result;
    }

    
} else {
    echo mysqli_error($db);
}



