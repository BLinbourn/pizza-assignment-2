<?php

if (isset($_POST["customerMessage"])) {
    
    $name = $_POST["Name"];
    $people = $_POST["People"];
    $date = $_POST["date"];
    $message = $_POST["Message"];

    require_once 'dbh-inc.php';
    require_once 'func-inc.php';

    if (!$name || !$people || !$date ) {
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    createContactMessage($conn, $name, $people, $date, $message);
}