<?php
    // Global connection
    $connection = null;

    function database_connect() {
        // Use the global connection
        global $connection;

        // Server
        $server = "localhost";
        // Username
        $username = "root";
        // If using XAMPP, 
        //  the password is an empty string.
        $password = "";
        // Database
        $database = "lab";

        if($connection == null) {
            $connection = mysqli_connect($server, $username, $password, $database);
        }
    }

    function database_addUser($username, $password) {
        // Use the global connection
        global $connection;

        if($connection != null) {
            // Overwrite the existing password value as a hash
            $password = password_hash($password, PASSWORD_DEFAULT);
            // Insert username and hashed password
            mysqli_query($connection, "INSERT INTO users (username, password) VALUES ('{$username}', '{$password}');");
        }
    }

    function database_verifyUser($username, $password) {
        // Use the global connection
        global $connection;

        // Create a default value
        $status = false;

        if($connection != null) {
            // Use WHERE expressions to look for username
            $results = mysqli_query($connection, "SELECT password FROM users WHERE username = '{$username}';");
            
            // mysqli_fetch_assoc() returns either null or row data
            $row = mysqli_fetch_assoc($results);
            
            // If $row is not null, it found row data.
            if($row != null) {
                // Verify password against saved hash
                if(password_verify($password, $row["password"])) {
                    $status = true;
                }
            }
        }

        return $status;
    }

    function database_deleteUser($username, $password) {
        // Use the global connection
        global $connection;

        $status = false;

        if ($connection != null) {
            // Verify that user is in the database
            if (database_verifyUser($username, $password)) {
                if (mysqli_query($connection, "DELETE FROM users WHERE username = '{$username}'"));
                    $status = true;
            }
        }

        return $status;
    }

    function database_updatePassword($username, $password, $new_password) {
        // Use the global connection
        global $connection;

        $status = false;

        if ($connection != null) {
            // Verify that user is in the database
            if (database_verifyUser($username, $password)) {
                // Hashing the new password
                $new_password = password_hash($new_password, PASSWORD_DEFAULT);
                // Create query
                $update_query = "UPDATE users SET password = '{$new_password}'  WHERE username = '{$username}'";

                if (mysqli_query($connection, $update_query))
                    $status = true;
            }
        }

        return $status;
    }

    function database_close() {
        // user global connection
        global $connection;

        if($connection != null) {
            mysqli_close($connection);
        }
    }
?>