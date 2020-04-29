<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location:login.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>This is a private page</p>
    <p><a href="logout.php">Log out</a></p>
</body>
</html>