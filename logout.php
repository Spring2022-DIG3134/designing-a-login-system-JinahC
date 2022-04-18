<?php
    include("security.php");
?>

<html>
<head>
    <title>Logout</title>
</head>
<body>
    <?php 
    if (security_loggedIn()) {
        security_logout();
        echo("<h2>Logged Out</h2>");
        echo("<p>You have been logged out.</p>");
    }
    else {
        echo("<a href='index.php'>Back to Home</a>");
    }
    ?>
</body>
</html>