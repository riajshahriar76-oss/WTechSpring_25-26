<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_REQUEST["username"] ?? "";
    $password = $_REQUEST["password"] ?? "";

    // Check empty
    if (empty($username) || empty($password)) {
        header("Location: ../View/login.php?error=empty");
        exit();
    }

    // Match with session stored username and password
    if (
        isset($_SESSION["username"]) &&
        isset($_SESSION["password"]) &&
        $_SESSION["username"] === $username &&
        $_SESSION["password"] === $password
    ) {
        $_SESSION["loggedIn"] = true;
        header("Location: ../View/Dashboard.php");
        exit();
    } else {
        header("Location: ../View/login.php?error=invalid");
        exit();
    }
}
?>
