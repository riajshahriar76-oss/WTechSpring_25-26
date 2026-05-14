<?php
session_start();

// If already logged in, go to showdata
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
    header("Location: Dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>

    <h1>Login Page</h1>

    <?php
    // Welcome back message using cookie
    if (isset($_COOKIE["username"])) {
        echo "<p>Welcome back, " . $_COOKIE["username"] . "!</p>";
    }
    ?>

    <form method="post" action="/registration_system/Controller/LoginController.php">
        <table>
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" id="username" name="username"/></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" id="password" name="password"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Login"/></td>
            </tr>
        </table>
    </form>

    <br/>
    <a href="registration.php">Go to Registration</a>

</body>
</html>
