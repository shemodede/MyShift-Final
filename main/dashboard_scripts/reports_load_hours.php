<?php
session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];


$selected_personnel_id;
$selected_hours_array;
$selected_shifts_id;
$shift_table;

if (isset($_POST['shift_id'])) {
    $shift_id = $_POST['shift_id'];
    $get_shift_info = "SELECT * FROM compiled_list WHERE id = '$shift_id'";
    $get_shift_info_result = mysqli_query($db, $get_shift_info);

    if ($get_shift_info_result) {
        while ($row = $get_shift_info_result->fetch_assoc()) {
            $shift_table = $row['table_html'];
            $date_start = $row['start_date'];
            $date_end = $row['end_date'];
            $selected_personnel_id = json_decode($row['team_array'], TRUE);
            $selected_shifts_id[] = json_decode($row['shifts_array'], TRUE);
            $selected_hours_array = unserialize($row['full_hours_array']);
            $selected_role = $row['roles_positions'];
//            var_dump($selected_hours_array);
//            exit;
        }
    } else {
        
    }
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

$result = '<table><tr><th style="width: 2%">Name</th><th style="width: 2%">Hours</th><th style="width: 2%">Number of Shifts</th><th style="width: 2%">'
        . 'Total'
        . '</th>'
        . '</tr>';


foreach ($array_personnel_names as $value) {

    $key = array_search($value['user_id'], array_column($selected_hours_array, 0));

    $user_array = array();
    $user_array = $selected_hours_array[$key];
    $hours = 0;
    $num_of_shift = 0;



    foreach ($user_array as $user_shifts) {
        //var_dump($user_array);
        $get_shift_info = "SELECT shift_duration FROM shifts WHERE shift_id = '$user_shifts'";
        $get_shift_info_result = mysqli_query($db, $get_shift_info);
        if ($get_shift_info_result) {
            while ($row = $get_shift_info_result->fetch_assoc()) {
                $hours += $row['shift_duration'];
                $num_of_shift += 1;
            }
        } else {
            echo mysqli_error($db);
        }
    }

    $wage = 20;
    $total = $wage * $hours;
    $total_expenses = $total_expenses + $total;
    $total_hours += $total_hours + $hours;
    array_push($array_total_expenditure, array('user' => $value['user_id'], 'hours' => $total_hours, 'total' => $total, 'wages' => $wage));
    $result .= '<tr><td class="' . $value['user_id'] . ' name">' . $value['first'] . ' ' . $value['last'] . '</td><td class="' . $value['user_id'] . ' hours">' . $hours . '</td><td class="' . $value['user_id'] . '">' . $num_of_shift . '</td><td class="' . $value['user_id'] . '">R' . $total . '</td></tr>';
}
$result .= '</table>';

$json_expenses_array = json_encode($array_total_expenditure);

echo json_encode(array('success', $result));
