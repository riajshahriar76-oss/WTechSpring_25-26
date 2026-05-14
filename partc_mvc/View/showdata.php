<?php
// View/showdata.php
session_start();

// If no session, redirect back to registration
if (!isset($_SESSION["username"]))
{
    header("Location: registration.php");
    exit();
}

// Read submitted data from $_REQUEST (passed via Controller redirect workaround)
// Since Controller redirects here, we read from SESSION what was stored
$username = $_SESSION["username"];
$password = $_SESSION["password"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Show Data</title>
</head>
<body>

<?php echo "<h1 style='color: green'>Registration Successful!</h1>"; ?>

<p>All submitted data:</p>

<table border="1" cellpadding="8" cellspacing="0">

    <tr>
        <th>Field</th>
        <th>Value</th>
    </tr>

    <tr>
        <td><b>Username (Session)</b></td>
        <td><?php echo htmlspecialchars($username); ?></td>
    </tr>

    <tr>
        <td><b>Password (Session)</b></td>
        <td><?php echo htmlspecialchars($password); ?></td>
    </tr>

</table>

<br>

<?php
echo "<p>Data saved to Session and Cookie successfully.</p>";
echo "<p>Redirecting to Login page in 3 seconds...</p>";

// Auto redirect to login.php after 3 seconds
header("refresh: 3; url=login.php");
?>

<p><a href="login.php">Click here if not redirected automatically</a></p>

</body>
</html>
