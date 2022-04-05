<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(-1);

session_start();

if(!$_SESSION["logedIn"]) {
    $_SESSION["logedIn"] = false;
}

if(!$_SESSION["signedUp"]) {
    $_SESSION["signedUp"] = false;
}

if($_SESSION["signedUp"]) {
    header("Location: ../../../login/login.php");
    $_SESSION["signedUp"] = false;
}

if(!$conn) {
    $conn = new db();
    $conn->conn();
}

if($_SESSION["logedIn"] && $_SERVER["REQUEST_URI"] !== "/index.php") {
    header("Location: ../../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login/login.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>

    <header class="header">
        <div>
            <h1>LOGO</h1>
        </div>

        <nav>
            <ul class="nav-links">
                <?php
                if($_SESSION["logedIn"] == false) {
                   echo "<li class='nav-link'><a href='../signup/signUp.php'>signup</a></li>";
                   echo "<li class='nav-link'><a href='../login/login.php'>login</a></li>";
                } else {
                    echo "<li class='nav-link'><a href='../login/logout.php'>Logout</a></li>";
                }
                ?>
                <li class="nav-link"><a href="../index.php">home</a></li>
            </ul>
        </nav>
    </header>