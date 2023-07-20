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


    public function insertCoupon($data)
    {
        $couponCode = htmlspecialchars($data['couponCode']);
        $releaseDate = htmlspecialchars($data['releaseDate']);
        $expiredDate = htmlspecialchars($data['expiredDate']);
        $notes = htmlspecialchars($data['notes']);
        $discountAmount = htmlspecialchars($data['discountAmount']);

        if ($expiredDate < $releaseDate) {
            $alert = "<span class='alert alert-warning'>Ngày hết hạn không được phép nhỏ hơn ngày phát hành</span>";
            return $alert;
        } else if ($couponCode == "" || $expiredDate == "" || $releaseDate == "" || $discountAmount == "") {
            $alert = "<span class='alert alert-warning'>Các trường không được phép rông</span>";
            return $alert;
        } else {
            $query = "INSERT INTO tbl_coupon(couponCode,discountAmount ,releaseDate,expiredDate, notes) VALUE('$couponCode','$discountAmount','$releaseDate','$expiredDate','$notes')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = '
        <div class="alert alert-success" role="alert">
        Cập nhật thành công <a href="./couponList.php" class="alert-link">Quay lại danh sách</a>
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
        $query = "SELECT * FROM tbl_coupon ORDER BY releaseDate desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getCouponById($id)
    {
        $query = "SELECT * FROM tbl_coupon WHERE couponId = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function UpdateCoupon($data, $id)
    {
        $couponCode = htmlspecialchars($data['couponCode']);
        $releaseDate = htmlspecialchars($data['releaseDate']);
        $expiredDate = htmlspecialchars($data['expiredDate']);
        $notes = htmlspecialchars($data['notes']);
        $discountAmount = htmlspecialchars($data['discountAmount']);




        if ($expiredDate < $releaseDate) {
            $alert = "<span class='alert alert-warning'>Ngày hết hạn không được phép nhỏ hơn ngày phát hành</span>";
            return $alert;
        } else if ($couponCode == "" || $expiredDate == "" || $releaseDate == "" || $discountAmount == "") {
            $alert = "<span class='alert alert-warning'>Các trường không được phép rông</span>";
            return $alert;
        }

        if ($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $type == "") {
            $alert = '<div class="alert alert-danger" role="alert">
            Các Trường không được phép rỗng 
                    </div>';
            return $alert;
        } else {
            // nếu người dùng chọn ảnh
            if (!empty($file_name)) {
                if ($file_size > 3000000) {
                    echo $alert = "<span class='success'>file vượt quá dung lượng (3mb)</span>";
                    return $alert;
                }
                if (in_array($file_ext, $permited) === false) {
                    echo $alert = "<span class='success'>file không hợp lệ</span>";
                    return $alert;
                }
                move_uploaded_file($file_temp, $uploaded_image);

                $query = "UPDATE tbl_product SET 
                productName = '$productName',
                brandId = '$brand',
                catId = '$category',
                type = '$type',
                price = '$price',
                image = '$unique_image',
                product_desc = '$product_desc'
                WHERE productId = '$id'
                ";
            } else {
                $query = "UPDATE tbl_product SET 
                productName = '$productName',
                brandId = '$brand',
                catId = '$category',
                type = '$type',
                price = '$price',
                product_desc = '$product_desc'
                WHERE productId = '$id'
                ";
            }
            $result = $this->db->update($query);
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
    public function DeleteCoupon($id)
    {
        $query = "DELETE FROM tbl_coupon WHERE id = '$id' ";
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