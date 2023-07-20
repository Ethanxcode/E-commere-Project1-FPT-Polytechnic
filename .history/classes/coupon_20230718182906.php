<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
class coupon
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_product($data)
    {
        $couponCode = htmlspecialchars($data['couponCode']);
        $brand = htmlspecialchars($data['brand']);
        $category = htmlspecialchars($data['category']);
        $product_desc = htmlspecialchars($data['product_desc']);
        $price = htmlspecialchars($data['price']);
        $type = htmlspecialchars($data['type']);
        // Kiểm tra hình ảnh lấy hình anh vbaof forder 


        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;


        if ($couponCode == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $type == "" || $file_name == "") {
            $alert = "<span>Các Trường không được phép rỗng</span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product(couponCode,brandId,catId,product_desc,price,type,image) VALUE('$productName','$brand','$category','$product_desc','$price','$type','$unique_image')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = '
                <div class="alert alert-success" role="alert">
                Cập nhật thành công <a href="./productlist.php" class="alert-link">Quay lại danh sách</a>
                </div>
                ';
                return $alert;
            } else {
                $alert = '
                <div class="alert alert-danger" role="alert">
                Cập nhật thất bại 
                </div>
                ';
                return $alert;
            }
        }
    }


    public function showCoupon()
    {
        $query = "SELECT * FROM tbl_brand ORDER BY brandId desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getCouponById($id)
    {
        $query = "SELECT * FROM tbl_brand WHERE brandId = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function UpdateCoupon($data)
    {
        $couponName = $this->fm->validation($couponName);

        if (empty($couponName)) {
            $alert = "<span>Khoogn được bỏ trống couponName</span>";
            return $alert;
        } else {
            $query = "UPDATE tbl_brand SET couponName ='$couponName' WHERE brandId='$id'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = '
                <div class="alert alert-success" role="alert">
                Cập nhật thành công <a class="alert-link" href="./couponList.php">Quay lại danh sách thương hiệu</a>
                </div>
                ';


                return $alert;
            } else {
                $alert = '
                <div class="alert alert-danger" role="alert">
                Cập nhật thất bại <a class="alert-link" href="./couponList.php">Quay lại danh sách thương hiệu</a>
                </div>
                ';
                return $alert;
            }
        }
    }

    public function DeleteCoupon($id)
    {
        $query = "DELETE FROM tbl_brand WHERE brandId = '$id' ";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = '
            <div class="alert alert-success" role="alert">
            Cập nhật thành công
            </div>
            ';

            return $alert;
        } else {
            $alert = '
            <div class="alert alert-danger" role="alert">
            Cập nhật thất bại 
            </div>
            ';
            return $alert;
        }
    }
}





?>