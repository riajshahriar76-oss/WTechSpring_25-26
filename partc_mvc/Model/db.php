<?php
// Model/db.php

class db {

    function connection()
    {
        $db_host     = "localhost";
        $db_user     = "root";
        $db_password = "";
        $db_name     = "section_x";

        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

        if ($connection->connect_error) {
            die("Connection Failed: " . $connection->connect_error);
        }

        return $connection;
    }

    // Insert registration data into users table
    function insertUser($connection, $tablename, $firstname, $lastname, $dob, $gender, $phone, $email, $password)
    {
        // Hash the password before storing
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO $tablename 
                    (firstname, lastname, dob, gender, phone, email, password)
                VALUES 
                    ('$firstname', '$lastname', '$dob', '$gender', '$phone', '$email', '$hashedPassword')";

        if ($connection->query($sql)) {
            return true;
        } else {
            echo "SQL Error: " . $connection->error;
            return false;
        }
    }

    // Get user by username for login
    function getUser($connection, $tablename, $username)
    {
        $sql    = "SELECT * FROM $tablename WHERE firstname='$username'";
        $result = $connection->query($sql);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}
?>
