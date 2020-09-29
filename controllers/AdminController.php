<?php
$path = realpath(__DIR__);
include_once $path.'/../models/Session.php';
Session::checkAdminLogin();

include_once '../models/Database.php';


class AdminController
{
    private $database;
    private $format;
    public function __construct()
    {
        $this->database = new Database();
    }

    public function login($adminUser, $adminPass)
    {

        $adminUser = mysqli_real_escape_string($this->database->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->database->link, $adminPass);

        // check empty
        if (empty($adminUser) || empty($adminPass)) {
            return 'User or password must be not empty';
        } else {
            $query = "SELECT * FROM tbl_admin 
                WHERE username = '$adminUser'
                AND `password` = '$adminPass'
                LIMIT 1";
            $row = $this->database->select($query);

            if ($row !== false) {
                // fetch_assoc: trả về 1 hàng kết quả như là mảng kết hợp
                $value = $row->fetch_assoc();
                Session::set('adminLogin', true);
                Session::set('adminId', $value['id']);
                Session::set('adminUsername', $value['username']);
                Session::set('adminName', $value['name']);

                header('Location:index.php');
            } else {
                return "User or Password not match";
            }
        }
    }
}
?>