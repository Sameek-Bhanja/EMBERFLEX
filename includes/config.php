<?php
ob_start(); // Turns on output buffering
session_start();

date_default_timezone_set("America/Los_Angeles");

try {
    $con = new PDO("mysql:dbname=emberflex;host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e){
    exit("Conection to DB Failed:" . $e->getMessage());
}
?>