<?php
 error_reporting(E_ALL ^ E_WARNING); 
  include "crud.php";
  include "authenticator.php";
  include_once 'DBConnector.php';

    class User implements Crud,Authenticator
  {

    private $user_id;
    private $first_name;
    private $last_name;
    private $city_name;
    // new variables
    private $username;
    private $password;
    /*
    We cav use the class constructor to initialize our values
    member variables cannot be instantiated from elsewhere coz 
    they are private.
    */
    function __construct($first_name=null, $last_name=null, $city_name=null,$username=null,$password=null)
    {
      $this->first_name = $first_name;
      $this->last_name = $last_name;
      $this->city_name = $city_name;
      $this->username = $username;
      $this ->password = $password;
    }
    // php doesnt allow multiple constructors
    // make method static so that we access it with the class 
    // rather than an object
//static constructor
    public static function create()
    {
      $instance = new self();
            return $instance;
    }
    public function setUsername($username)
    {
      $this->username = $username;
    }
    public function getUsername(){
      return $this->username;
    }
    public function setPassword($password){
      $this->password = $password;
    }
    public function getPassword(){
      return $this->password;
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
      $uname = $this->username;
      $this->hashPassword();
      $pass = $this->password;
      $res = mysqli_query($con, "INSERT INTO user(first_name, last_name, user_city,username,password) 
                                VALUES('$fn', '$ln', '$city','$uname','$pass')") 
                                or die("Error: ". mysqli_error($con));
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
    public function valiteForm()
    {
        //returns true if the values are not empty 
        $fn = $this ->first_name;
        $ln = $this->last_name;
        $city = $this->city_name;
        if($fn == "" || $ln == "" || $city == ""){
            return false;
        }
        return true;

    }
    public function createFormErrorSessions(){
        session_start();
        $_SESSION['form_errors'] = "All fields are required";
    }
  
    public function hashPassword(){
      // inbuilt function password_hash hashes our password
      $this->password = password_hash($this->password,PASSWORD_DEFAULT);
    }
    public static function isPasswordCorrect($username,$password){
     $con = new DBConnector();
        $found =false;

        // $query = "SELECT * FROM user";
        $res = mysqli_query($con->conn,"SELECT * FROM user ");
        
            while($row= $res->fetch_assoc()){
              if(password_verify($password, $row['password']) && $username == $row['username']){
               $found = true;
      
              }
      }
    $con->closeDatabase();
    return $found;
  }
    
    public function login(){
      if($this->isPasswordCorrect()){
        ///password is correct so we load the protected page
        header("Location:private_page.php");
      }
  }
    public static function createUserSession($username){
      session_start();
      $_SESSION['username'] = $username;  
     }
     public static function logout(){
         session_start();
         unset($_SESSION['username']);
         session_destroy();
         header("Location:lab1.php");
     }
  }
?>