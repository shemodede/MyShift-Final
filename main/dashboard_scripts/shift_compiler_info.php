<?php
session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];

$start_date = "";
$end_date = "";
$personnel = array();
$shifts = array();
$role = "";

if (isset($_POST['shift_dates']) && isset($_POST['role_group']) && isset($_POST['personnel']) && isset($_POST['shift_block'])) {

    $start_date = json_decode($_POST['shift_dates'])[0];

    $end_date = json_decode($_POST['shift_dates'])[1];

    $role = $_POST['role_group'];

    $personnel = $_POST['personnel'];

    $shifts = $_POST['shift_block'];

    $result1 = "";



    $array_shifts = array();

    foreach ($shifts as $value) {

        $get_actual_shifts_query = "SELECT shift_name FROM shifts WHERE shift_id = '$value'";
        $get_actual_shifts_query_result = mysqli_query($db, $get_actual_shifts_query);
        if ($get_actual_shifts_query_result) {
            while ($row = $get_actual_shifts_query_result->fetch_assoc()) {
                $array_shifts[] = array('shift_name' => $row["shift_name"], 'shift_id' => $value);
            }
        } elseif (!$get_actual_shifts_query_result) {
            echo 'Oh oh... ' . mysqli_error($db);
        }
    }


    foreach ($array_shifts as $value) {
        $result1 .= '<tr><td class="dark" align="center"><div id="' . $value['shift_id'] . '" class="redips-drag shift-block redips-clone ' . $value['shift_name'] . '">' . $value['shift_name'] . '</div><input id="b_' . $value['shift_name'] . '" class="' . $value['shift_name'] . '" type="button" value="R" onclick="redips.report("' . $value['shift_name'] . '")" title="Show only ' . $value['shift_name'] . '"/></td></tr>';
    }

    $result1 .= '<tr><td class="dark" align="center"><div id="off" class="redips-drag shift-block redips-clone">OFF</div><input id="b_off" class="off" type="button" value="R" onclick="redips.report(off)" title="Show only OFF"/></td></tr>'
            . '<tr><td class="redips-trash" title="Trash">Trash</td></tr>'
            . '<tr><td class="fill_button"><button id="fill_off" type="button">Fill</button><button id="unfill_off" type="button">Unfill</button></td></tr>';


    $array_personnel_names = array();
    $result2 = '<tr><!-- if checkbox is checked, clone school subjects to the whole table row  -->'
            . '<td class="redips-mark blank">'
            . '<input id="week" type="checkbox" title="Apply shifts to the week" checked=""/>'
            . '<input id="report" type="checkbox" title="Show shift report"/>'
            . '</td>'
            . '<td class="redips-mark days dark">Monday</td>'
            . '<td class="redips-mark days dark">Tuesday</td>'
            . '<td class="redips-mark days dark">Wednesday</td>'
            . '<td class="redips-mark days dark">Thursday</td>'
            . '<td class="redips-mark days dark">Friday</td>'
            . '<td class="redips-mark days dark">Saturday</td>'
            . '<td class="redips-mark days dark">Sunday</td></tr>';



    foreach ($personnel as $value) {
        //foreach ($value as $val){
        $get_personnel_names = "SELECT first_name, last_name FROM personnel WHERE personnel_id = '$value'";
        $get_personnel_names_result = mysqli_query($db, $get_personnel_names);

        if ($get_personnel_names_result) {


            while ($row = $get_personnel_names_result->fetch_assoc()) {
                $array_personnel_names[] = array('first' => $row['first_name'], 'last' => $row['last_name'], 'name_id' => $value);
            }
        } elseif (!$get_personnel_names_result) {
            echo 'Oh oh... 2' . mysqli_error($db);
        }
    }

    foreach ($array_personnel_names as $value) {
        //foreach ($value as $val){
        $result2 .= '<tr> '
                . '<td class="value_cell redips-mark dark usable person_name" id="' . $value['name_id'] . '">' . $value['first'] . ' ' . $value['last'] . '</td>'
                . '<td class="value_cell drop-table usable shift_values ' . $value['name_id'] . '"></td>'
                . '<td class="value_cell drop-table usable shift_values ' . $value['name_id'] . '"></td>'
                . '<td class="value_cell drop-table usable shift_values ' . $value['name_id'] . '"></td>'
                . '<td class="value_cell drop-table usable shift_values ' . $value['name_id'] . '"></td>'
                . '<td class="value_cell drop-table usable shift_values ' . $value['name_id'] . '"></td>'
                . '<td class="value_cell drop-table usable shift_values ' . $value['name_id'] . '"></td>'
                . '<td class="value_cell drop-table usable shift_values ' . $value['name_id'] . '"></td>'
                . '</tr>';
    }
    echo json_encode(array($result1, $result2));
} else {
    echo 'Params not set';
}



