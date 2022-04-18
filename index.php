<?php
    include("security.php")
?>

<html>
<head>
    <title>HOME</title>
</head>
<body>
<?php
    if(security_loggedIn()) { ?>
        <h2>Welcome Back</h2>
        <a href='update.php'>Update Password</a>
        <a href='remove.php'>Remove User</a>
    <?php   
    } 
    else { ?>
        <h2>Hello New User</h2>
        <a href='signup.php'>Sign Up</a>
        <a href='login.php'>Login</a> 
    <?php 
    }
?>
</body>
</html>