<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "broadcast";

    try{
        $db = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
    } catch(PDOException $e){
        die("Error " . $e->getMessage());
    }
?>