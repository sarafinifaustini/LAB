<?php
include_once 'User.php';



if (isset($_POST['btn-login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (User::isPasswordCorrect($username, $password)) {

        User::createUserSession($username);
        header("Location:private_page.php");
    } else {
        header("Location:login.php");
    }
}
?>

<html>
    <head>
        <title>Log In</title>
        <script type="text/javascript" src="validate.js"></script>
        <link rel="stylesheet" type="text/css" href="validate.css">
    </head>

    <body>
        <form method="post" name="login" id="login" action="<?=$_SERVER['PHP_SELF']?>">
            <table align="center">
                <tr>
                    <td><input type="text" name="username" placeholder="Username" required></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" placeholder="password" required></td>
                </tr>
                <tr>
                    <td><button type="submit" name="btn-login"><strong>Log In</strong></button> </td>
                </tr>
            </table>
        </form>
    </body>
</html>