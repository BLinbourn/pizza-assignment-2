<?php

$serverName = "127.0.0.1";
$dBUsername = "root";
$dBPassword = "secret";
$dBName = "Pizza-Challange";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}