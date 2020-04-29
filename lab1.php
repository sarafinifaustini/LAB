<?php
  error_reporting(E_ALL ^ E_WARNING); 
  include_once 'DBConnector.php';
  include_once 'user.php';
  $con = new DBConnector;

  if (isset($_POST['btn-save'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $city    =   $_POST['city_name'];
    $username = $_POST['username'];
    $password= $_POST['password'];


    $user = new User($first_name, $last_name, $city,$username,$password);
    if(!$user-> valiteForm()){
        $user->createFormErrorSessions();
        header("Refresh:0");
        die();
    }
    $res = $user->save($con->conn);
    if ($res) {
      echo "Save operation successful!";
    } else {
      echo "An error occurred!";
    }
    $con->closeDatabase();
  }
?>
<html>
  <head>
  <title>My title</title>
  <script type="text/javascript" src="validate.js"></script>
  <link rel="stylesheet" type="text/css" href="validate.css">
      <body>
        <form method="post" name="user_details" onsubmit="return validateForm()" action = "lab1.php">
          <table align="center">
              <tr><td>
                  <div id="form-errors">
                     <?php
                        session_start();
                        if(!empty($_SESSION['form_errors'])){
                            echo "" . $_SESSION('form_errors');
                            unset($_SESSION['form_errors']);
                        }

                     ?>
                  </div>
              </td></tr>
            <tr>
              <td><input type="text" name="first_name" placeholder="First Name" /></td>
            </tr>
            <tr>
              <td><input type="text" name="last_name" placeholder="Last Name" /></td>
            </tr>
            <tr>
              <td><input type="text" name="city_name" placeholder="City" /></td>
            </tr>
            <tr>
              <td>
                <input type ="text" name="username" placeholder="Username"/>
              </td>
            </tr>
            <tr>
              <td><input type="password" name="password" placeholder="Password"/></td>
            </tr>
            <tr>
              <td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
            </tr>
          </table>
        </form>
      </body>
      <a href="all.php">View All Records</a>
  </head>

</html>