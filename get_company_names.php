<?php

include 'config.php';

$select_company_names = "SELECT company_id, company_name FROM company";

$select_company_names_result = mysqli_query($db, $select_company_names);

$result = array();

if($select_company_names_result){
    while ($row = $select_company_names_result->fetch_assoc()){
        $id = $row['company_id'];
        $name = $row['company_name'];
        
        array_push($result, $name);
    }
    echo json_encode($result);
} elseif(!$select_company_names_result) {
    echo mysqli_error($db);    
}
