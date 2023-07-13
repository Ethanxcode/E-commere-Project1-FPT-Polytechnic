<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
class customer
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_Customer($data)
    {
        $hovaten = htmlspecialchars($data['hovaten']);
        $sodienthoai = htmlspecialchars($data['sodienthoai']);
        $tendangnhap = htmlspecialchars($data['tendangnhap']);
        $matkhau = md5(htmlspecialchars($data['matkhau']));
        if ($hovaten == "" || $sodienthoai == "" || $tendangnhap == "" || $matkhau == "") {
            $alert = "<h5 class='text-danger'>Các Trường không được phép rỗng</h5>";
            return $alert;
        } else {
            $check_tendangnhap = "SELECT * FROM tbl_customer WHERE tendangnhap ='$tendangnhap' LIMIT 1";
            $result_check = $this->db->select($check_tendangnhap);
            if ($result_check) {
                $alert = "<h5 class='text-danger'>Tên đăng nhập đã tồn tại</h5>";
                return $alert;
            } else {
                $query = "INSERT INTO tbl_customer(hovaten,sodienthoai,tendangnhap,matkhau) 
                VALUE('$hovaten','$sodienthoai','$tendangnhap','$matkhau')";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = '
                    <div class="alert alert-success" role="alert">
                    Đăng kí thành công 
                    </div>
                    ';
                    return $alert;
                } else {
                    $alert = '
                    <div class="alert alert-danger" role="alert">
                    Đăng kí thất bại  
                    </div>
                    ';
                    return $alert;
                }
            }
        }
    }
    public function login_Customer($data)
    {
        $tendangnhap = htmlspecialchars($data['tendangnhap']);
        $matkhau = md5(htmlspecialchars($data['matkhau']));
        if ($tendangnhap == "" || $matkhau == "") {
            $alert = "<h5 class='text-danger'>Các Trường không được phép rỗng</h5>";
            return $alert;
        } else {
            $check_tendangnhap = "SELECT * FROM tbl_customer WHERE tendangnhap ='$tendangnhap' AND matkhau ='$matkhau'";
            $result_check = $this->db->select($check_tendangnhap);
            if ($result_check != false) {
                $value = $result_check;
                Session::set('customer_login', true);
                Session::set('customer_id', $value[0]['id']);
                Session::set('customer_name', $value[0]['hovaten']);
                header('Location:index.php');
            } else {
                $alert = "<h5 class='text-danger'>Tên đăng nhập hoặc mật khẩu không đúng</h5>";
                return $alert;
            }
        }
    }
    public function shows_customer($id)
    {
        $query = "SELECT * FROM tbl_customer WHERE id ='$id' LIMIT 1";
        $result = $this->db->select($query);
        return  $result;
    }
}





?>