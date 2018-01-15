<?php

session_start();

include 'config.php';

 $word_pending = "Pending";

  $company_id = $_SESSION['user_info'][6];
  $personnel_id = $_SESSION['user_info'][0];

  $get_team = "SELECT * FROM pending_users WHERE company_id = '$company_id'";
  $get_team_result = mysqli_query($db, $get_team);

  

$result = "";

if ($get_team_result) {
    while ($row = $get_team_result->fetch_assoc()) {
        $rowID = $row['pu_id'];
        $firstname = $row['first_name'];
        $lastname = $row['last_name'];
        $username = $row['username'];
        $cellnumber = $row['cell_number'];
        $email = $row['email'];
        $date_request = $row['request_date'];
        $status = $row['status'];
        $first_letter = strtoupper($row['first_name']);
        if ($status == 'Pending') {
            $result .= '<tr class="">'
                    . '<td>' . $firstname . '</td>'
                    . '<td>' . $lastname . '</td>'
                    . '<td>' . $username . '</td>'
                    . '<td>' . $cellnumber . '</td>'
                    . '<td>' . $email . '</td>'
                    . '<td><label class="badge badge-warning">' . $status . '</label></td>'
                    . '<td>' . $date_request . '</td>'
                    . '<td><a href="#" id="' . $rowID . '" class="btn btn_accept btn-primary btn-sm" data-toggle="modal" data-target="#defaultModal" >Accept</a></td>'
                    . '<td><a href="#" id="' . $rowID . '" class="btn btn-danger btn_reject btn-sm">Reject</a></td>'
                    . '</tr>';
        }
    }

    
    echo $result;

}



    