<?php
    $database_host = "localhost";
    $database_user = "root";   
    $database_password = "";  
    $database_name = "users_db";  

    // checking if it can connect the database
    if(!$connect = mysqli_connect($database_host, $database_user, $database_password, $database_name)) {
        die("Connection Failed!");
    }
?>