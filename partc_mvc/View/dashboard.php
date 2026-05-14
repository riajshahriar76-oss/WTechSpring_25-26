<?php
// View/dashboard.php
session_start();

$username   = $_SESSION["username"] ?? "";
$isLoggedIn = $_SESSION["loggedIn"] ?? false;

if (!$isLoggedIn && empty($username))
{
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<body>

<?php echo "<h1>Welcome, $username!</h1>"; ?>
<p>You are now logged in.</p>
<a href="../Controller/logout.php">Logout</a>

</body>
</html>
