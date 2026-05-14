<?php
// Controller/loginvalidation.php

include "../Model/db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name     = $_POST["name"]     ?? "";
    $password = $_POST["password"] ?? "";

    // ── Basic Validation ──────────────────────────────────────────────────────
    if (!empty($name) && !empty($password))
    {
        $database   = new db();
        $connection = $database->connection();

        // Get user from DB
        $user = $database->getUser($connection, "users", $name);

        if ($user)
        {
            // Verify hashed password
            if (password_verify($password, $user["password"]))
            {
                // ── Login Success ─────────────────────────────────────────────
                $_SESSION["username"] = $user["firstname"];
                setcookie("username", $user["firstname"], time() + 3600, "/");

                echo "Login Successful <br>";
                echo "Welcome, " . $user["firstname"];

                header("Location: ../View/dashboard.php");
                exit();
            }
            else
            {
                echo "Invalid Password";
            }
        }
        else
        {
            echo "User not found";
        }
    }
    else
    {
        echo "Username and Password are required!";
    }

    // ── Session / Cookie check (same as demo) ─────────────────────────────────
    if (isset($_SESSION["username"]) || isset($_COOKIE["username"]))
    {
        echo "<br>Welcome Back";
    }
    else
    {
        echo "<br>Please Log In";
    }
}
?>
