<?php
ini_set('display_errors', 1);
$server = "localhost";
$user = "root";
$password = "password";
$database ="batterydb";

$con = new mysqli($server,$user,$password,$database);

if(!$con)
{
    die("ERROR: ". $con->error);
}

?>