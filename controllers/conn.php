<?php
    $host = "localhost";
    $name = "root";
    $pass = "";
    $dbName = "ling_blog";

    $conn = new mysqli($host,$name,$pass,$dbName);

    if(!$conn){
        echo "Fail to connect to Database!";
        die();
    }