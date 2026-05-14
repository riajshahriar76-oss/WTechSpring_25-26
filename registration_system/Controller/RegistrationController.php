<?php
session_start();
include "../Model/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_REQUEST["firstname"] ?? "";
    $lastname  = $_REQUEST["lastname"]  ?? "";
    $dob       = $_REQUEST["dob"]       ?? "";
    $gender    = $_REQUEST["gender"]    ?? "";
    $phone     = $_REQUEST["phone"]     ?? "";
    $email     = $_REQUEST["email"]     ?? "";
    $password  = $_REQUEST["password"]  ?? "";
    $confirm   = $_REQUEST["confirm"]   ?? "";

    // Check if any field is empty
    if (
        empty($firstname) || empty($lastname) || empty($dob) ||
        empty($gender)    || empty($phone)    || empty($email) ||
        empty($password)  || empty($confirm)
    ) {
        // Redirect back to registration if any field is empty
        header("Location: ../View/registration.php?error=empty");
        exit();
    }

    // Check password match
    if ($password !== $confirm) {
        header("Location: ../View/registration.php?error=password");
        exit();
    }

    // Store username and password in Session
    $_SESSION["username"] = $firstname . " " . $lastname;
    $_SESSION["password"] = $password;
    $_SESSION["loggedIn"] = true;

    // Store all data in Session to display in showdata.php
    $_SESSION["firstname"] = $firstname;
    $_SESSION["lastname"]  = $lastname;
    $_SESSION["dob"]       = $dob;
    $_SESSION["gender"]    = $gender;
    $_SESSION["phone"]     = $phone;
    $_SESSION["email"]     = $email;

    // Also set cookie for username
    setcookie("username", $firstname . " " . $lastname, time() + 3600, "/");

    // Redirect to showdata
    header("Location: ../View/Dashboard.php");
    exit();
}
?>
