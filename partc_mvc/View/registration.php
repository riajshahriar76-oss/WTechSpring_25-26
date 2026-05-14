<?php
// View/registration.php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>

<?php echo "<h1 style='color: blue'>Registration Page</h1>"; ?>

<form method="post" action="../Controller/Registrationvalidation.php">
    <table>

        <tr>
            <td colspan="3">
                <p style="color:red">* Required Field</p>
            </td>
        </tr>

        <tr>
            <td><label>First Name:</label></td>
            <td><input type="text" name="firstname"/></td>
            
        </tr>

        <tr>
            <td><label>Last Name:</label></td>
            <td><input type="text" name="lastname"/></td>
            <td><span style="color:red">*</span></td>
        </tr>

        <tr>
            <td><label>Date of Birth (DOB):</label></td>
            <td><input type="date" name="dob" placeholder="DD/MM/YYYY"/></td>
            <td><span style="color:red">*</span></td>
        </tr>

        <tr>
            <td><label>Gender:</label></td>
            <td>
                <input type="radio" name="gender" value="Female"> Female
                <input type="radio" name="gender" value="Male"> Male
                <input type="radio" name="gender" value="Other"> Other
            </td>
            <td><span style="color:red">*</span></td>
        </tr>

        <tr>
            <td><label>Phone:</label></td>
            <td><input type="text" name="phone"/></td>
            <td><span style="color:red">*</span></td>
        </tr>

        <tr>
            <td><label>Email ID:</label></td>
            <td><input type="text" name="email"/></td>
            <td><span style="color:red">*</span></td>
        </tr>

        <tr>
            <td><label>Password:</label></td>
            <td><input type="password" name="password"/></td>
            <td><span style="color:red">*</span></td>
        </tr>

        <tr>
            <td><label>Confirm Password:</label></td>
            <td><input type="password" name="confirmpassword"/></td>
            <td><span style="color:red">*</span></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Submit"/></td>
        </tr>

    </table>
</form>

</body>
</html>
