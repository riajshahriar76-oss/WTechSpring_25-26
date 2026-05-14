<?php
session_start();

// If not logged in, redirect to registration
if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== true) {
    header("Location: ../View/registration.php");
    exit();
}

// Read all data from Session
$firstname = $_SESSION["firstname"] ?? "";
$lastname  = $_SESSION["lastname"]  ?? "";
$dob       = $_SESSION["dob"]       ?? "";
$gender    = $_SESSION["gender"]    ?? "";
$phone     = $_SESSION["phone"]     ?? "";
$email     = $_SESSION["email"]     ?? "";
$username  = $_SESSION["username"]  ?? "";
$password  = $_SESSION["password"]  ?? "";

// Check again if any session data is empty
if (
    empty($firstname) || empty($lastname) || empty($dob) ||
    empty($gender)    || empty($phone)    || empty($email)
) {
    header("Location: ../View/registration.php?error=empty");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

    <h1>Dashboard</h1>

    <?php
    // Show cookie welcome message if cookie exists
    if (isset($_COOKIE["username"])) {
        echo "<p>Welcome, " . $_COOKIE["username"] . "!</p>";
    }
    ?>

    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>First Name</td>
            <td><?php echo $firstname; ?></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><?php echo $lastname; ?></td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td><?php echo $dob; ?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?php echo $gender; ?></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><?php echo $phone; ?></td>
        </tr>
        <tr>
            <td>Email ID</td>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <td>Username (Session)</td>
            <td><?php echo $username; ?></td>
        </tr>
        <tr>
            <td>Password (Session)</td>
            <td><?php echo $password; ?></td>
        </tr>
    </table>

    <br/>
    <a href="../View/login.php">Go to Login Page</a>

</body>
</html>
