<?php

session_start();

include 'config.php';

if (isset($_POST['company_name'])) {

    //$array_company_info = array();
    $company_name = $_POST['company_name'];
    $get_company_info = "SELECT * FROM company WHERE company_name = '$company_name'";
    $get_company_info_result = mysqli_query($db, $get_company_info);
    if ($get_company_info_result) {
        if (mysqli_num_rows($get_company_info_result) == 1) {
            while($row = $get_company_info_result->fetch_assoc()){
                $company_id = $row['company_id'];
                $company_name = $row['company_name'];
                $_SESSION['company_info'] = array($company_id,$company_name);
            }
            echo 'okay';
        }elseif(mysqli_num_rows($get_company_info_result) < 1){
            echo 'Less 1';
        }
    } else {
        echo mysqli_error($db);
    }
}