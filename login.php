<?php
    include("security.php")
?>

<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php 
    if (security_loggedIn()) { 
        echo("<a href='index.php'>Back to Home</a>");
    }
    else { ?>
        <form action='login.php' method='POST'>
            <label for='username'>USERNAME<label><br>
            <input type='text' name='username' id='username'><br><br>
            <label for='password'>PASSWORD<label><br>
            <input type='password' name='password' id='password'><br><br>
            <input type='submit' name='submit' value='LOGIN'>
        </form>
        <?php
        if (security_validate()) {
            security_login();

            if (security_loggedIn()) {
                echo("<br><br>Success");
                // echo("<br><a href='logout.php'>Logout</a>");
            }
            else 
                echo("<br><br>Username or password is wrong.");
        }
    }
    ?>
    
</body>
</html>