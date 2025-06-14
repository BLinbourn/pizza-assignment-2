<?php

if (isset($_POST["editTime"])) {
    
    $day = $_POST["day"];
    $openingtime = $_POST["openingTime"];
    $closingtime = $_POST["closingTime"];
    $closed = $_POST["closed"];

    require_once 'dbh-inc.php';
    require_once 'func-inc.php';

    if (!$day || !$openingtime || !$closingtime) {
        header("location: ../pages/times.php?error=emptyinput");
        exit();
    }

    editTimeInfo($conn, $day, $openingtime, $closingtime, $closed);
}