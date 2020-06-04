<?php
$path = realpath(__DIR__);
include_once $path . '/../models/Session.php';
include_once $path.'/../models/Database.php';
?>

<?php


class UserController
{

    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function register($email, $password, $rePassword,$name)
    {
        $email = mysqli_real_escape_string($this->database->link, $email);
        $password = mysqli_real_escape_string($this->database->link, $password);
        $rePassword = mysqli_real_escape_string($this->database->link, $rePassword);
        $name = mysqli_real_escape_string($this->database->link, $name);

        if (!empty($email) && !empty($password)) {
            if ($password !== $rePassword) {
                return '<div class="alert alert-danger">Password and RepeatPassword does not match!</div>';
            }
            $query = "INSERT INTO tbl_user(email,password,name) VALUES('$email','$password','$name')";
            $result = $this->database->insert($query);
            if ($result) {
                echo '<script>window.location.replace("login.php")</script>';
            }
        } else {
            return '<div class="alert alert-danger">Field must no empty!</div>';
        }
    }

    public function login($email, $password)
    {

        $email = mysqli_real_escape_string($this->database->link, $email);
        $password = mysqli_real_escape_string($this->database->link, $password);

        if (!empty($email) && !empty($password)) {
            $query = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password' ";
            $result = $this->database->select($query);

            if ($result) {
                $row = $result->fetch_assoc();
                Session::set('userLogin', true);
                Session::set('email', $row['email']);
                Session::set('name', $row['name']);
                Session::set('id', $row['id']);
                echo '<script>window.location.replace("index.php")</script>';
            } else {
                return '<div class="alert alert-danger">Password does not match</div>';
            }
        }
    }
}
