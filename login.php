<?php
 error_reporting(E_ALL ^ E_WARNING); 
// login codes

include_once 'DBConnector.php';
include_once 'user.php';

$con = new DBConnector;
if(isset($_POST['btn-login'])){
    $password = $_POST['password'];
    $username= $_POST['username'];
    // $instance = User::create();
    // $instance->setPassword($password);
    // $instance->setUsername($username);

//     if($instance->isPasswordCorrect()){
//         $instance->login();
//         //close db
//         $con->closeDatabase();
//         //create a user session
//         $instance->createUserSession();
//     }
//     else{
//         $con->closeDatabase();
//         header("Location:login.php");
//     }
// }
if (User::isPasswordCorrect($username, $password)) {
   
            User::createUserSession($username);
            header("Location:private_page.php");
        } else {
            header("Location:login.php");
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="validate.js"></script>
    <link rel="stylesheet" type="text/css"href="validate.css">
</head>
<body>
    <!-- '$_SERVER['PHP_SELF']' means that we are submitting this form to itself -->
    <form method="post" name="login" id="login"action="login.php">
    <table align="center">
        <tr>
            <td><input type="text" name="username" placeholder="Username"required></td>
        </tr>
        <tr>
            <td><input type="password" name="password" placeholder="Password"required></td>
        </tr>
        <tr>
            <td><input type="submit" name="btn-login" ><strong>LOGIN</strong></td>
        </tr>
        
    </table>
</form>
</body>
</html>