<?php

if (isset($_POST["addMenuItem"])) {
    
    $category = $_POST["food_category"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $specialCondition = $_POST["specialCondition"];

    require_once 'dbh-inc.php';
    require_once 'func-inc.php';

    if (!$category || !$title || !$description || !$price ) {
        header("location: ../pages/menu.php?error=emptyinput");
        exit();
    }

    createMenuItem($conn, $category, $title, $description, $price, $specialCondition);
}

if (isset($_POST["updateMenuItem"])) {
    
    $category = $_POST["food_category"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $specialCondition = $_POST["specialCondition"];

    require_once 'dbh-inc.php';
    require_once 'func-inc.php';

    if (!$category || !$title || !$description || !$price ) {
        header("location: ../pages/menu.php?error=emptyinput");
        exit();
    }

    editMenuItem($conn, $category, $title, $description, $price, $specialCondition);
}