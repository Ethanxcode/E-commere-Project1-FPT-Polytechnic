<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
class user
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function show_customer()
    {
        $query = "SELECT * FROM tbl_customer ORDER BY id desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function showCustomerById($id)
    {
        $query = "SELECT * FROM tbl_customer WHERE id = " . $id . " ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_index()
    {
        $query = "SELECT * FROM tbl_product WHERE sales > 0";
        $result = $this->db->select($query);
        return $result;
    }

    public function calculate_total_revenue()
    {
        $query = "SELECT SUM(p.sales * p.price) AS totalRevenue
              FROM tbl_product AS p
              WHERE p.sales > 0";
        $result = $this->db->select($query);
        return $result[0]['totalRevenue'];
    }
    // public function update_profile($id, $data, $file)
    // {
    //     $fullName = htmlspecialchars($data['fullName']);
    //     $phoneNumber = htmlspecialchars($data['phoneNumber']);
    //     $username = htmlspecialchars($data['username']);
    //     $password = md5(htmlspecialchars($data['password']));
    //     $email = htmlspecialchars($data['email']);

    //     $permited = array('jpg', 'jpeg', 'png', 'gif');
    //     $file_name = $_FILES['image']['name'];
    //     $file_size = $_FILES['image']['size'];
    //     $file_temp = $_FILES['image']['tmp_name'];

    //     $div = explode('.', $file_name);
    //     $file_ext = strtolower(end($div));
    //     $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    //     $uploads_dir = realpath(dirname(__FILE__)) . '/../admin/uploads/';
    //     $uploaded_image = $uploads_dir . $unique_image;

    //     if (!empty($file_name)) {
    //         if ($file_size > 3000000) {
    //             $alert = "<span class='success'>file vượt quá dung lượng (3mb)</span>";
    //             return $alert;
    //         }
    //         if (!in_array($file_ext, $permited)) {
    //             echo $alert = "<span class='success'>file không hợp lệ</span>";
    //             return $alert;
    //         }
    //         $userImage = $unique_image;
    //         move_uploaded_file($file_temp, $uploaded_image);
    //     } else {
    //         $userImage = 'faceIcon.jpg';
    //     }
    //     $query = "UPDATE tbl_customer SET fullName ='$fullName',phoneNumber ='$phoneNumber', username ='$username', email='$email', userImage='$userImage'  WHERE id='$id'";
    //     $result = $this->db->update($query);
    //     if ($result) {
    //         Session::set('customer_login', true);
    //         Session::set('customer_id', $id);
    //         Session::set('customer_name', $fullName);
    //         // header('Location:profile.php');
    //         $alert = '
    //             <div class="alert alert-success" role="alert">
    //             Cập nhật thành công 
    //             </div>
    //             ';
    //         return $alert;
    //     } else {
    //         $alert = '
    //             <div class="alert alert-success" role="alert">
    //             Cập ông 
    //             </div>
    //             ';
    //         return $alert;
    //     }
    // }
    // public function update_product($data, $file, $id)
    // {
    //     $username = htmlspecialchars($data['tendangnhap']);
    //     $fullName = htmlspecialchars($data['hoavten']);
    //     $phoneNumber = htmlspecialchars($data['sodienthoai']);
    //     $password = htmlspecialchars($data['matkhau']);

    //     // Kiểm tra hình ảnh lấy hình anh vbaof forder 


    //     $permited = array('jpg', 'jpeg', 'png', 'gif');
    //     $file_name = $_FILES['image']['name'];
    //     $file_size = $_FILES['image']['size'];
    //     $file_temp = $_FILES['image']['tmp_name'];

    //     $div = explode('.', $file_name);
    //     $file_ext = strtolower(end($div));
    //     $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    //     $uploaded_image = "uploads/" . $unique_image;

    //     if ($username == "" || $fullName == "" || $phoneNumber == "" || $password == "") {
    //         $alert = '<div class="alert alert-danger" role="alert">
    //         Các Trường không được phép rỗng 
    //                 </div>';
    //         return $alert;
    //     } else {
    //         // nếu người dùng chọn ảnh
    //         if (!empty($file_name)) {
    //             if ($file_size > 3000000) {
    //                 echo $alert = "<span class='success'>file vượt quá dung lượng (3mb)</span>";
    //                 return $alert;
    //             }
    //             if (in_array($file_ext, $permited) === false) {
    //                 echo $alert = "<span class='success'>file không hợp lệ</span>";
    //                 return $alert;
    //             }
    //             move_uploaded_file($file_temp, $uploaded_image);

    //             $query = "UPDATE tbl_product SET 
    //             hovaten = '$username',
    //             fullName = '$fullName',
    //             phoneNumber = '$phoneNumber',
    //             type = '$type',
    //             price = '$price',
    //             image = '$unique_image',
    //             product_desc = '$product_desc'
    //             WHERE productId = '$id'
    //             ";
    //         } else {
    //             $query = "UPDATE tbl_product SET 
    //             hovaten = '$username',
    //             fullName = '$fullName',
    //             phoneNumber = '$phoneNumber',
    //             type = '$type',
    //             price = '$price',
    //             product_desc = '$product_desc'
    //             WHERE productId = '$id'
    //             ";
    //         }
    //         $result = $this->db->update($query);
    //         if ($result) {
    //             $alert = '
    //             <div class="alert alert-success" role="alert">
    //             Cập nhật thành công <a href="./productlist.php" class="alert-link">Quay lại danh sách</a>
    //             </div>
    //             ';
    //             return $alert;
    //         } else {
    //             $alert = '
    //             <div class="alert alert-danger" role="alert">
    //             Cập nhật thất bại 
    //             </div>
    //             ';
    //             return $alert;
    //         }
    //     }
    // }
}





?>