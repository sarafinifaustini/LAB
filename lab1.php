<?php
// error_reporting(E_ALL ^ E_WARNING); 
  include_once 'DBConnector.php';
  include_once 'user.php';
  $con = new DBConnector;

  if (isset($_POST['btn-save'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $city = $_POST['city_name'];

    $user = new User($first_name, $last_name, $city);
    $res = $user->save($con->conn);

    if ($res) {
      echo "Save operation successful!";
    } else {
      echo "An error occurred!";
    }
  }
?>
<html>
  <head>
      <body>
        <form method="post" action="lab1.php">
          <table align="center">
            <tr>
              <td><input type="text" name="first_name" placeholder="First Name" required/></td>
            </tr>
            <tr>
              <td><input type="text" name="last_name" placeholder="Last Name" required/></td>
            </tr>
            <tr>
              <td><input type="text" name="city_name" placeholder="City" required/></td>
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