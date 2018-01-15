<?php

session_start();
include 'config.php';
$company_id = $_SESSION['user_info'][6];
$shift_id = $_SESSION['list_id'];


$selected_personnel_id = array();
$selected_hours_array = array();

if (isset($_POST['full_hours_array'])) {

    $selected_hours_array = json_decode($_POST['full_hours_array']);

    $get_info_query = "SELECT * FROM compiled_list WHERE company_id = '$company_id' AND id = (SELECT max(id) FROM compiled_list) AND completed = 0";
    $get_info_query_result = mysqli_query($db, $get_info_query);

    if ($get_info_query_result) {
        while ($row = $get_info_query_result->fetch_assoc()) {
            $date_start = $row['start_date'];
            $date_end = $row['end_date'];
            $_SESSION['table_id'] = $row['id'];
            $selected_personnel_id = json_decode($row['team_array']);
            $selected_shifts_id = json_decode($row['shifts_array']);
            $selected_role = $row['roles_positions'];
        }
    } elseif (!$get_info_query_result) {
        echo 'Oh oh.... ' . mysqli_error($db);
    }

    $array_personnel_names = array();

    foreach ($selected_personnel_id as $value) {
        $get_personnel_names = "SELECT first_name, last_name FROM personnel WHERE personnel_id = '$value'";
        $get_personnel_names_result = mysqli_query($db, $get_personnel_names);

        if ($get_personnel_names_result) {


            while ($row = $get_personnel_names_result->fetch_assoc()) {
                $array_personnel_names[] = array('first' => $row["first_name"], 'last' => $row["last_name"], 'user_id' => $value);
            }
        } elseif (!$get_personnel_names_result) {
            echo 'Oh oh... 2' . mysqli_error($db);
        }
    }

    $array_total_expenditure = array();
    $total_hours = 0;
    $total_expenses = 0;

    $result = '<tr><th style="width: 2%">Name</th><th style="width: 2%">Hours</th><th style="width: 2%">'
            . 'Total'
            . '</th>'
            . '</tr>';
    foreach ($array_personnel_names as $value) {
        $key = array_search($value['user_id'], array_column($selected_hours_array, 0));
        $user_array = $selected_hours_array[$key];
        $hours = 0;
        foreach ($user_array as $user_shifts) {
            $get_shift_info = "SELECT shift_duration FROM shifts WHERE shift_id = '$user_shifts'";
            $get_shift_info_result = mysqli_query($db, $get_shift_info);
            if ($get_shift_info_result) {
                while ($row = $get_shift_info_result->fetch_assoc()) {
                    $hours += $row['shift_duration'];
                }
            }
        }
        $wage = $_POST['wage'];
        $total = $wage * $hours;
        $total_expenses = $total_expenses + $total;
        $total_hours += $total_hours + $hours;
        array_push($array_total_expenditure, array('user' => $value['user_id'], 'hours' => $hours, 'total' => $total, 'wages' => $wage));
        $result .= '<tr><td class="' . $value['user_id'] . ' name">' . $value['first'] . ' ' . $value['last'] . '</td><td class="' . $value['user_id'] . ' hours">' . $hours . '</td><td class="' . $value['user_id'] . '">R' . $total . '</td></tr>';
    }

    $json_expenses_array = json_encode($array_total_expenditure);

    //echo $result;
    //print_r($key);
    echo json_encode(array('fulltext'=>$result, 'total_hours'=>$total_hours, 'total_expense'=>$total_expenses));
    $save_expenditure = "UPDATE compiled_list SET shift_expenditure = '$json_expenses_array' WHERE id = '$shift_id'";
    $save_expenditure_result = mysqli_query($db, $save_expenditure);
    if (!$save_expenditure_result) {
        echo mysqli_error($db);
    }
} else {
    echo 'Please add shifts to the shifting table.';
}