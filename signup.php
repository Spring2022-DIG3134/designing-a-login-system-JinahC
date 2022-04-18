<?php
    include("security.php")
?>

<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <h2>Signup</h2>
    <?php 
    if (security_loggedIn()) { 
        echo("<a href='index.php'>Back to Home</a>");
    }
    else { ?>
        <form action="signup.php" method="POST">
            <label for="username">USERNAME<label><br>
            <input type="text" name="username" id="username"><br><br>
            <label for="password">PASSWORD<label><br>
            <input type="password" name="password" id="password"><br><br>
            <input type="submit" name="submit" value="Sign Up">
        </form>
        <?php
            if (security_validate())
                security_addNewUser();
    } ?>
</body>
</html>