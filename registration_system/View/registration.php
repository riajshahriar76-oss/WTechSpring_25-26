<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
</head>
<body>

    <h1>Registration Page</h1>

    <?php
    // Show error messages
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "empty") {
            echo "<p style='color:red;'>All fields are required. Please fill in every field.</p>";
        } elseif ($_GET["error"] == "password") {
            echo "<p style='color:red;'>Password and Confirm Password do not match.</p>";
        }
    }
    ?>

    <form method="post" action="/registration_system/Controller/RegistrationController.php">
        <table>
            <tr>
                <td><label for="firstname">First Name:</label></td>
                <td><input type="text" id="firstname" name="firstname"/></td>
            </tr>
            <tr>
                <td><label for="lastname">Last Name:</label></td>
                <td><input type="text" id="lastname" name="lastname"/></td>
            </tr>
            <tr>
                <td><label for="dob">Date of Birth:</label></td>
                <td><input type="text" id="dob" name="dob" placeholder="DD/MM/YYYY"/></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" id="male"   name="gender" value="Male"/>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="Female"/>
                    <label for="female">Female</label>
                    <input type="radio" id="other"  name="gender" value="Other"/>
                    <label for="other">Other</label>
                </td>
            </tr>
            <tr>
                <td><label for="phone">Phone:</label></td>
                <td><input type="text" id="phone" name="phone"/></td>
            </tr>
            <tr>
                <td><label for="email">Email ID:</label></td>
                <td><input type="text" id="email" name="email"/></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" id="password" name="password"/></td>
            </tr>
            <tr>
                <td><label for="confirm">Confirm Password:</label></td>
                <td><input type="password" id="confirm" name="confirm"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Register"/></td>
            </tr>
        </table>
    </form>

</body>
</html>
