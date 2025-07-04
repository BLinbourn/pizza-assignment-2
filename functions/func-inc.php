<?php

function existingUser($conn, $username) {
    $sql = "SELECT * FROM Users WHERE username = ?;";
    $statement = mysqli_stmt_init($conn);

    // Makes sure the statement got sent to the database
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../login.php?error=statmentfailed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "s", $username);
    mysqli_stmt_execute($statement);

    // Makes sure the database sent back results
    $resultData = mysqli_stmt_get_result($statement);

    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($statement);
        return $row;
    }

    mysqli_stmt_close($statement);
    return false;
}

function loginUser($conn, $username, $password) {
    $userExists = existingUser($conn, $username);

    if (!$userExists) {
        return false;
    }

    $passwordHashed = $userExists["password"];
    $checkPassword = $password == $passwordHashed;

    if (!$checkPassword) {
        return false;
    }

    session_start();
    $_SESSION["userid"] = $userExists["userId"];
    return true;
}

function getAllMenuItems($conn) {
    $sql = "SELECT * FROM MenuItems;";
    $statement = mysqli_stmt_init($conn);

    // Makes sure the statement got sent to the database
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../menu.php?error=statmentfailed");
        exit();
    }

    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);

    mysqli_fetch_all($resultData, MYSQLI_ASSOC);

    mysqli_stmt_close($statement);

    return $resultData;
}

function createMenuItem($conn, $category, $title, $description, $price, $specialCondition) {
    $sql = "INSERT INTO MenuItems (category, title, description, price, specialCondition) VALUES (?, ?, ?, ?, ?);";
    $statement = mysqli_stmt_init($conn);

    // Makes sure the statement got sent to the database
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../login.php?error=statmentfailed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "sssds", $category, $title, $description, $price, $specialCondition);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../pages/menu.php?error=none");
    exit();
}

function getAllContactInfo($conn) {
    $sql = "SELECT * FROM CustomerMessages;";
    $statement = mysqli_stmt_init($conn);

    // Makes sure the statement got sent to the database
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../contacts.php?error=statmentfailed");
        exit();
    }

    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);

    mysqli_fetch_all($resultData, MYSQLI_ASSOC);

    mysqli_stmt_close($statement);

    return $resultData;
}

function createContactMessage($conn, $name, $datetime, $nopeople, $message) {
    $sql = "INSERT INTO CustomerMessages (name, datetime, nopeople, message) VALUES (?, ?, ?, ?);";
    $statement = mysqli_stmt_init($conn);

    // Makes sure the statement got sent to the database
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../login.php?error=statmentfailed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "ssds", $name, $nopeople, $datetime, $message);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../index.php?error=none");
    exit();
}

function getAllTimeInfo($conn) {
    $sql = "SELECT * FROM OpeningTimes;";
    $statement = mysqli_stmt_init($conn);

    // Makes sure the statement got sent to the database
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../contacts.php?error=statmentfailed");
        exit();
    }

    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);

    mysqli_fetch_all($resultData, MYSQLI_ASSOC);

    mysqli_stmt_close($statement);

    return $resultData;
}

function editTimeInfo($conn, $day, $openingtime, $closingtime, $closed) {
    $sql = "UPDATE OpeningTimes SET openingtime = ?, closingtime = ?, closed = ? WHERE day = ?;";
    $statement = mysqli_stmt_init($conn);

    // Makes sure the statement got sent to the database
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../times.php?error=statmentfailed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "ssds", $openingtime, $closingtime, $closed, $day);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);

    header("location: ../pages/times.php?error=none");
    exit();
}