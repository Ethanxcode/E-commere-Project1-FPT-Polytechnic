<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
include_once($filepath . '/../lib/session.php');
?>

<?php
class adminlogin
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function login_admin($adminUser, $adminPass)
    {
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);
        $adminPass = htmlspecialchars($adminPass);

        if (empty($adminUser) || empty($adminPass)) {
            $alert = "Tên Đăng nhập và Mật khẩu không được để trống";
            return $alert;
        } else {
            $query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass' LIMIT 1";
            $result = $this->db->select($query);
            if ($result != false) {
                $value = $result;
                Session::set('adminlogin', "check");
                Session::set('adminId', $value[0]['adminId']);
                Session::set('adminUser', $value[0]['adminUser']);
                Session::set('adminName', $value[0]['adminName']);
                // qua trang index
                header('Location:index.php');
            } else {
                echo $adminPass;
                echo 'sđs';
                // nếu nhập sai tkmk
                $alert = "Tên Đăng nhập hoặc Mật khẩu không Đúng";
                return $alert;
            }
        }
    }
}





?>