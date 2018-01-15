<?php
session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];

if(isset($_POST['start_date']) && isset($_POST['end_date']) && isset($_POST['role']) && isset($_POST['personnel_id']) && isset($_POST['shifts_id']) ){
    
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $selected_team = $_POST['personnel_id'];
    $selected_shifts = $_POST['shifts_id'];
    $role_group = $_POST['role'];
    $dates_array = $_POST['dates_array'];
    
    $selected_names = array();
    $selected_shifts_ret = array();
    $company_id = $_SESSION['user_info'][6];
    $selected_team_array = json_decode($selected_team);
    foreach ($selected_team_array as $value){
    
        $get_users_names = "SELECT first_name, last_name FROM personnel WHERE personnel_id = '$value'";
        $get_users_names_result = mysqli_query($db, $get_users_names);
    
        if($get_users_names_result){
            while ($row = $get_users_names_result->fetch_assoc()) {
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $name = $first_name . " " . $last_name;
                array_push($selected_names, array($value => $name));
            }
        }
        
        $get_shift_names = "SELECT shift_name FROM shifts WHERE shift_id = '$value'";
        $get_shift_names_result = mysqli_query($db, $get_shift_names);
    
        if($get_shift_names_result){
            while ($row = $get_users_names_result->fetch_assoc()) {
                $fshift_name = $row['shift_name'];
                
                array_push($selected_shifts_ret, array($value => $shift_name));
            }
        }
        
        
        
        
    }
    $save_shift_info = "INSERT INTO compiled_list(start_date, end_date, dates_array, team_array, shifts_array, roles_positions, completed, company_id)VALUES('$start_date','$end_date', '$dates_array','$selected_team','$selected_shifts','$role_group', 0,'$company_id')";
    $save_shift_info_result = mysqli_query($db, $save_shift_info);
    
    if($save_shift_info_result){
        
        $get_week_id = "SELECT MAX(id) AS id FROM compiled_list";
        $get_week_id_result = mysqli_query($db, $get_week_id);
        
        if($get_week_id_result){
            if(mysqli_num_rows($get_week_id_result) == 1){
                while($row = $get_week_id_result->fetch_assoc()){
                    $id = $row['id'];
                    
                    $array_result = array();
                    array_push($array_result, [ 'id' => $row['id'], 'dates' => array('start' => $start_date, 'end' => $end_date)]);
                    echo json_encode(array('success' => TRUE, 'weeks_array' => $array_result, 'id' => $id, 'company_id' => $company_id, 'persons' => $selected_names, 'shifts' => $selected_shifts_ret));
                }
            }  else {
                echo 'Not 1';
            }
            
        }  else {
            echo mysqli_error($db);
        }
        
        
        
    }else{
        echo mysqli_error($db);
    }
    
}else{
   
}




