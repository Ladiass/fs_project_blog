<?php
    $host = "127.0.0.1";
    $name = "root";
    $pass = "";
    $dbName = "ling_blog";

    $conn = new mysqli($host,$name,$pass,$dbName);

    if(!$conn){
        echo "Fail to connect to Database!";
        die();
    }