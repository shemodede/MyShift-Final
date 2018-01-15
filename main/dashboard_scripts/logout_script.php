<?php
session_start();

if(isset($_SESSION['user_info'])){
    session_abort();
    if(!isset($_SESSION['user_info'])){
        echo 'logout';
    }  else {
        echo 'error';
    }
}

