<?php 

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once 'dbh-inc.php';
    require_once 'func-inc.php';

    // Empty inputs
    if (!$username || !$password) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    // Wrong input
    if (!loginUser($conn, $username, $password)) {
        echo "EASY!";
        header("location: ../login.php?error=wronginput");
        exit();
    }

    header("location: ../dashboard.php");
    exit();
}