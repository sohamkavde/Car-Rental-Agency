<?php
$userNameDB = 'root';
$passwordDB = '';
$serverDb = 'localhost';
$db = 'carrentalservice';

// Create connection
$con = mysqli_connect($serverDb, $userNameDB, $passwordDB,$db);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
date_default_timezone_set("Asia/kolkata");



?>