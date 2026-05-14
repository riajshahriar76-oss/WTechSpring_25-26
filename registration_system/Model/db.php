<?php
$db_host     = "localhost";
$db_user     = "root";
$db_password = "";
$db_name     = "registration_db";

$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$connection) {
    die("Could not Connect to Database: " . mysqli_connect_error());
}
?>
