<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body id="login">
    <h3>Log in here </h3>
    <form id="signin" action="../functions/login-inc.php" method="post">
        <label>Username</label>
        <input type="text" id="username" name="username" placeholder="Username">
        <label>Password</label>
        <input type="password" id="password" name="password" placeholder="Password">
        <button type="submit" name="submit">Login</button>
    </form>
    <?php
        if (isset($_GET["error"])) {
            switch ($_GET["error"]) {
                case ("emptyinput"):
                    echo "Please fill in your username and password";
                    break;
                case ("wronginput"):
                    echo "Incorrect username and/or password";
                    break;
            }
        }
    ?>
</body>
</html>