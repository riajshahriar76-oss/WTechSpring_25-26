<?php
// View/login.php
session_start();

// If already logged in, go to dashboard
$isLoggedIn = $_SESSION["loggedIn"] ?? false;
if ($isLoggedIn)
{
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<body>

<?php echo "<h1 style='color: red'>LogIn Page</h1>"; ?>

<form method="post" action="../Controller/loginvalidation.php">
    <table>
        <tr>
            <td>User Name:</td>
            <td><input type="text" name="name" required/></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" required/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Login"/></td>
        </tr>
    </table>
</form>

</body>
</html>
