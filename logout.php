<?php
    include("security.php");
    security_logout();
?>

<html>
<head>
    <title>Logout</title>
</head>
<body>
    <h2>Logged Out</h2>
    <p>You have been logged out.</p>

    <a href="login.php">Login</a>
</body>
</html>