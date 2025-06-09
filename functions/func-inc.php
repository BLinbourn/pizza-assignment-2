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