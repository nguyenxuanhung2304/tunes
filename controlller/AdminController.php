<?php
include '../models/Session.php';
Session::checkLogin();

include '../models/Database.php';
include '../helpers/Format.php';
?>

<?php
class AdminController
{
    private $database;
    private $format;
    public function __construct()
    {
        $this->database = new Database();
        $this->format = new Format();
    }

    public function login($adminUser, $adminPass)
    {
        //validation data
        $adminUser = $this->format->validation($adminUser);
        $adminPass = $this->format->validation($adminPass);

        $adminUser = mysqli_real_escape_string($this->database->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->database->link, $adminPass);

        // check empty
        if (empty($adminUser) || empty($adminPass)) {
            return 'User or password must be not empty';
        } else {
            $query = 'SELECT * FROM tbl_admin WHERE adminUser = {$adminUser} AND adminPass = {$adminPass} LIMIT 1';
            $row = $this->database->select($query);
            echo $row;

            if ($row !== false) {
                // fetch_assoc: trả về 1 hàng kết quả như là mảng kết hợp
                Session::set('adminLogin', true);
                Session::set('adminId', $row['adminId']);
                Session::set('adminUser', $row['adminUser']);
                Session::set('adminName', $row['adminName']);

                header('Location:index.php');
            } else {
                return "User or Password not match";
            }
        }
    }
}
?>