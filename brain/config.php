<?php
$server = "localhost";
$user = "root";
$password = "";
$database ="batterydb";

$con = new mysqli($server,$user,$password,$database);

if(!$con)
{
    die("ERROR: ". $con->error);
}

?>