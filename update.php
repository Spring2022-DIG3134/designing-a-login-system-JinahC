<?php
    include("security.php")
?>

<html>
<head>
    <title>Update Password</title>
</head>
<body>
    <h2>Update Password</h2>
    <?php 
    if (security_loggedIn()) { ?>
        <form action="update.php" method="POST">
            <label for="username">USERNAME<label><br>
            <input type="text" name="username" id="username"><br><br>
            <label for="password">CURRENT PASSWORD<label><br>
            <input type="password" name="password" id="password"><br><br>
            <label for="new_password">NEW PASSWORD<label><br>
            <input type="password" name="new_password" id="new_password"><br><br>
            <input type="submit" name="submit" value="UPDATE">
        </form>
        <?php
        if (security_validate()) {
            if (security_updatePassword())
                echo("<br><br>Password successfully updated.");
            else 
                echo("<br><br>Password could not be updated.");
        }          
    }
    else {
        echo("<a href='signup.php'>Sign Up</a>");
    }
    ?>
    
</body>
</html>