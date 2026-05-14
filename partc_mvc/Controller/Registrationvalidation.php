<?php
// Controller/Registrationvalidation.php

include "../Model/db.php";
session_start();

// Initialize all variables (same pattern as demo code)
$firstname       = "";
$lastname        = "";
$dob             = "";
$gender          = "";
$phone           = "";
$email           = "";
$password        = "";
$confirmpassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // ── Step 1: Receive all values using $_REQUEST ────────────────────────────
    $firstname       = $_REQUEST["firstname"]       ?? "";
    $lastname        = $_REQUEST["lastname"]        ?? "";
    $dob             = $_REQUEST["dob"]             ?? "";
    $gender          = $_REQUEST["gender"]          ?? "";
    $phone           = $_REQUEST["phone"]           ?? "";
    $email           = $_REQUEST["email"]           ?? "";
    $password        = $_REQUEST["password"]        ?? "";
    $confirmpassword = $_REQUEST["confirmpassword"] ?? "";

    // ── Step 2: Check if any required field is empty ──────────────────────────
    if (empty($firstname) || empty($lastname) || empty($dob)  ||
        empty($gender)    || empty($phone)    || empty($email) ||
        empty($password)  || empty($confirmpassword))
    {
        // Redirect back to registration if empty
        header("Location: ../View/registration.php");
        exit();
    }

    // ── Step 3: Store username & password in Session ──────────────────────────
    $username = $firstname . " " . $lastname;

    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;

    // Store username in Cookie
    setcookie("username", $username, time() + 3600, "/");

    // ── Step 4: Insert into Database ─────────────────────────────────────────
    $database   = new db();
    $connection = $database->connection();

    $result = $database->insertUser(
        $connection, "users",
        $firstname, $lastname, $dob,
        $gender, $phone, $email, $password
    );

    if ($result)
    {
        // ── Step 5: Go to showdata.php to display all submitted data ──────────
        header("Location: ../View/showdata.php");
        exit();
    }
    else
    {
        echo "Database Error. Please try again.";
    }
}
?>
