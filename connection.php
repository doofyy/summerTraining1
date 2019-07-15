<?php

$databaseHost = 'localhost';
$databaseName = 'eval';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

return  $mysqli;

?>