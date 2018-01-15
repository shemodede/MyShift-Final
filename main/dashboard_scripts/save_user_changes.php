<?php

session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];
$array_vars = array();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if (isset($_POST['fn'])) {
        $array_vars['first_name'] = $_POST['fn'];
    }
    if (isset($_POST['ln'])) {
        $array_vars['last_name'] = $_POST['ln'];
    }
    if (isset($_POST['un'])) {
        $array_vars['username'] = $_POST['un'];
    }
    if (isset($_POST['cn'])) {
        $array_vars['cell_number'] = $_POST['cn'];
    }
    if (isset($_POST['em'])) {
        $array_vars['email'] = $_POST['em'];
    }
    if (isset($_POST['role'])) {
        $array_vars['role'] = $_POST['role'];
    }
    if (isset($_POST['priv'])) {
        $array_vars['admin'] = $_POST['priv'];
    }




    $valuesTo_change = array_keys($array_vars);

    $sentence = "";

    $num_vars = count($valuesTo_change);
    $i = 0;
    foreach ($valuesTo_change as $value) {
        $i++;
        $sentence .= " " . $value . " = '" . $array_vars[$value];
        if ($i == $num_vars) {
            
        } else {
            $sentence .= "',";
        }
    }

    
    
    
    $update_user_info = "UPDATE personnel SET " . $sentence . "' WHERE personnel_id = $id AND company_id = $company_id";
    $update_user_info_result = mysqli_query($db, $update_user_info);
    //echo $update_user_info;
    if($update_user_info_result){
        echo 'success';
    } else {
        echo mysqli_error($db);
    }
}


