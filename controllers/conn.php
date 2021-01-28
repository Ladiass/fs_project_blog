<?php
    $host = "db4free.net";
    $name = "ladiass";
    $pass = "tss010430";
    $dbName = "ling_blog";

    $conn = new mysqli($host,$name,$pass,$dbName);

    if(!$conn){
        echo "Fail to connect to Database!";
        die();
    }