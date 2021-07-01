<?php 

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'elearning';


    $conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

    if($conn->connect_error){
        die("connection failed");
    }
    
    // else{
    //     echo "connected";
    // }