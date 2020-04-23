<?php
  include "crud.php";
  //include "DBConnector.php";

  /**
   *
   */
  class User implements Crud
  {

    private $user_id;
    private $first_name;
    private $last_name;
    private $city_name;

    function __construct($first_name, $last_name, $city_name)
    {
      $this->first_name = $first_name;
      $this->last_name = $last_name;
      $this->city_name = $city_name;
    }

    public function setUserId($user_id)
    {
      $this->user_id = $user_id;
    }

    public function getUserId()
    {
      return $this->user_id;
    }

    public function save($con)
    {
      $fn = $this->first_name;
      $ln = $this->last_name;
      $city = $this->city_name;
      $res = mysqli_query($con, "INSERT INTO user(first_name, last_name, user_city) VALUES('$fn', '$ln', '$city')") or die("Error: ". mysqli_error($con));

      return $res;
    }

    public static function readAll($con)
    {
      $res = $con->query("SELECT * FROM user");
      return $res;
    }
    public function readUnique()
    {
      return null;
    }
    public function search()
    {
      return null;
    }
    public function update()
    {
      return null;
    }
    public function removeOne()
    {
      return null;
    }
    public function removeAll()
    {
      return null;
    }
  }

?>