<?php
session_start();
if(isset($_SESSION['unique_id'])){
require "../includes/config.php";
    $logout_id = mysqli_real_escape_string($con, $_GET['logout_id']);
    if(isset($logout_id)){
        // $status = "Offline";
        $sql =  "UPDATE adminlogin SET status = 'Logout' WHERE unique_id = {$_GET['logout_id']}";
        $sql_run = mysqli_query($con, $sql);
        if($sql){
            session_unset();
            session_destroy();
            header("location: login.php");
        }
    }
}
?>