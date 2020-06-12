<?php
$path = realpath(__DIR__);
include_once $path.'/../models/Session.php';
Session::checkAdminLogin();

include_once '../models/Database.php';
?>

<?php


class HomeController
{

    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function signIn($userName,$password)
    {
        $userName = mysql_real_escape_string($this->database->link,$userName);
        $password = mysqli_real_escape_string($this->database->link,$password);

        if (!empty($userName) && !empty($password)) {
            $query = "INSERT INTO tbl_user(userName,password) VALUES('$userName','$password')";
            $result = $this->database->insert($query);
            if ($result) {
                header('login.php');
            }
        }
    }

    public function login($userName,$password)
    {

        $userName = mysql_real_escape_string($this->database->link,$userName);
        $password = mysqli_real_escape_string($this->database->link,$password);

        if (!empty($userName) && !empty($password)) {
            $query = "SELECT * FROM tbl_user WHERE userName = '$userName' AND password = '$password' ";
            $result = $this->database->select($query);

            if ($result) {
                $row = $result->fetch_assoc();
                Session::set('userLogin',true);
                Session::set('userName',$userName);
                
            }
        }
    }


}
