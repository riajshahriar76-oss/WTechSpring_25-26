<?php

class db
{
    // Database Connection
    function connection()
    {
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "section_r";

        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

        // Check Connection
        if ($connection->connect_error)
        {
            die("Could not connect database: " . $connection->connect_error);
        }

        return $connection;
    }

    // Signup Function
    function signup($connection, $tablename, $username, $password, $filepath)
    {
        $sql = "INSERT INTO ".$tablename."
        (username, password, filepath)
        VALUES
        ('".$username."', '".$password."', '".$filepath."')";

        $result = $connection->query($sql);

        return $result;
    }

    // Signin Function
    function signin($connection, $tablename, $username, $password)
    {
        $sql = "SELECT * FROM ".$tablename."
        WHERE username='".$username."'
        AND password='".$password."'";

        $result = $connection->query($sql);
   
        return $result;
    }

    // Check User Function
    function CheckUser($connection, $tablename, $username)
    {
        $sql = "SELECT * FROM ".$tablename."
        WHERE username='".$username."'";

        $result = $connection->query($sql);
//         $result = $connection->query($sql);

// if($result){
//     echo "Insert successful";
// } else {
//     echo "Error: " . $connection->error;
// }

//         return $result;
    }
}

?>