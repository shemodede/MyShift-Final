<?php

session_start();
include 'config.php';

if (isset($_POST['tablearray'])) {

    $encoded_array = $_POST['tablearray'];
    $array = json_decode($_POST['tablearray']);



    $result;
    $result = '<div class="table-responsive">';

    $result .= '<table id="mainTable" class=" table table-striped">';

    foreach ($array as $array_val) {
        $result .= '<tr>';
        foreach ($array_val as $sub) {
            $result .= '<td>';
            $result .= $sub;
            $result .= '</td>';
        }
        $result .= '</tr>';
    }

    $result .= '</table></div>';
    
    echo $result;
}
