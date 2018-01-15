<?php
session_start();
include 'config.php';
$user_id = $_SESSION['user_info'];
$select_bio = "SELECT bio FROM personnel WHERE ";
