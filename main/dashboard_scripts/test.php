<?php

session_start();
include 'config.php';


$shift_week_info = "SELECT * FROM compiled_list WHERE id = '15' AND company_id = '1'";
$shift_week_info_result = mysqli_query($db, $shift_week_info);
$result = "";
if ($shift_week_info_result) {

    while ($row = $shift_week_info_result->fetch_assoc()) {

        $dates_array = json_decode($row['dates_array'], TRUE);
        $tableArray = unserialize($row['tablearray']);
       

        var_dump($tableArray);
        $result = '<table>'
                . ''
                . '</table>';
        echo '<br><br><br><br><br><br><br><br><br>';

        var_dump($dates_array);

        echo '<br><br><br><br><br><br><br><br><br>';
        
        var_dump(count($tableArray));
        
        
        echo '<br><br><br>';
        
        echo count($tableArray[0]);
        
        echo '<br><br><br>';
        
        echo count($tableArray[0][0]);
    }

    echo mysqli_error($db);
}