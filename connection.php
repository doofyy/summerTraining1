<?php

$databaseHost = 'localhost';
$databaseName = 'eval';
$databaseUsername = 'root';
$databasePassword = '123456';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

return  $mysqli;

?>