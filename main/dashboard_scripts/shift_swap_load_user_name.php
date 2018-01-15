<?php
session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];
$result;
if(isset($_POST['id'])){
    $id = filter_input(INPUT_POST, 'id');
    
    $get_names = "SELECT first_name, last_name FROM personnel WHERE company_id = '$company_id' AND personnel_id = '$id'";
    $get_names_result = mysqli_query($db, $get_names);
    
    if($get_names_result){
        while ($row = $get_names_result->fetch_assoc()){
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $result = $first_name . " " . $last_name;
            
            echo $result;
        }
    }  else {
        echo mysqli_error($db);
    }
}  else {
    echo "Params not set";
}