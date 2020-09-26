<?php
$path = realpath(__DIR__);
include_once $path . '/../models/Session.php';
include_once $path.'/../models/Database.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

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
                $this->sendMail($email,$name);
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

    public function sendMail($to,$name)
    {
        $query = "SELECT * FROM tbl_user WHERE email = '$to' AND name = '$name'";
        $resultSelect = $this->database->select($query);
        if ($resultSelect) {
            try {
                //Server settings
                $mail = new PHPMailer();
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'mylover21072000@gmail.com';                     // SMTP username
                $mail->Password   = '0393532107';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipientsi
                $mail->setFrom('mongtamquoc2015@gmail.com','Namisan');
                $mail->addAddress($to , $name);
                $mail->addReplyTo($to);

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = "E-Shop";
                $mail->Body    =  "Xin chào " .$name . ",bạn đã đăng ký tài khoản thành công tại website E-Shop của chúng tôi,chúc bạn mua sắm vui vẻ!";

                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }

    }



}
