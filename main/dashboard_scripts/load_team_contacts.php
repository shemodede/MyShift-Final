<?php
session_start();

include 'config.php';

$company_id = $_SESSION['user_info'][6];
$personnel_id = $_SESSION['user_info'][0];

$get_team = "SELECT * FROM personnel WHERE company_id = '$company_id' AND personnel_id != '$personnel_id'";
$get_team_result = mysqli_query($db, $get_team);

$result = "";

if ($get_team_result) {
    while ($row = $get_team_result->fetch_assoc()) {
        $name = $row['first_name'] . " " . $row['last_name'];
        $username = $row['username'];
        $cellnumber = $row['cell_number'];
        $email = $row['email'];
        $role = $row['role'];
        //$first_letter = strtoupper($row['first_name'][0]);

        $result .= '<tr>'
                . '<td>' . $name . '</td>'
                . '<td>' . $role . '</td>'
                . '<td>' . $cellnumber . '</td>'
                . '</tr>';
    }

    echo $result;
}else{
    echo mysqli_error($db);
}
