<?php
session_start(); 
$connect = mysqli_connect("localhost", "root", "", "wp_project");  
if(mysqli_connect_errno()){
    echo "Connection Fail".mysqli_connect_error();
    }
?>