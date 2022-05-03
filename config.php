<?php

//connecting to the database

$databaseHost = 'localhost';
$databaseName = 'hotel';
$databaseUsername = 'root';
$databasePassword = '';

$connection = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if( !$connection ){
    die("Error");
}

