<?php
include_once '../models/Session.php';
Session::checkLogin();

include_once '../models/Database.php';
include_once '../helpers/Format.php';
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
            $query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass' LIMIT 1";
            $row = $this->database->select($query);

            if ($row !== false) {
                // fetch_assoc: trả về 1 hàng kết quả như là mảng kết hợp
                $value = $row->fetch_assoc();
                Session::set('adminLogin', true);
                Session::set('adminId', $value['adminId']);
                Session::set('adminUser', $value['adminUser']);
                Session::set('adminName', $value['adminName']);

                header('Location:index.php');
            } else {
                return "User or Password not match";
            }
        }
    }
}
?>