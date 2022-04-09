<?php
    include("security.php")
?>

<html>
<head>
    <title>Remove User</title>
</head>
<body>
    <h2>Remove User</h2>
    <form action="remove.php" method="POST">
        <label for="username">USERNAME<label><br>
        <input type="text" name="username" id="username"><br><br>
        <label for="password">PASSWORD<label><br>
        <input type="password" name="password" id="password"><br><br>
        <input type="submit" name="submit" value="REMOVE">
    </form>
    <?php
        if (security_validate()) {
            if (security_deleteUser())
                echo("<br><br>User was successfully removed.");
            else 
                echo("<br><br>User could not be removed");
        }
            
    ?>
</body>
</html>