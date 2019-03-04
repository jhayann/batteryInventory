<?php
include('config.php');
$get = $con->prepare('SELECT * FROM `monthly_sales` LIMIT 0,10');
$get->execute();

$results = $get->get_result();
    $data = array();
    foreach ($results as $row) {
        $data[] = $row;
        }
   print json_encode($data);
    $con->close();
?>