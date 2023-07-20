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

        if ($couponCode == "" || $expiredDate == "" || $releaseDate == "" || $notes == "" || $discountAmount == "") {
            $alert = "<span class='alert alert-warning'>Các Trường không được phép rỗng</span>";
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
    // public function UpdateCoupon($data)
    // {
    //     $couponName = $this->fm->validation($couponName);

    //     if (empty($couponName)) {
    //         $alert = "<span>Khoogn được bỏ trống couponName</span>";
    //         return $alert;
    //     } else {
    //         $query = "UPDATE tbl_expiredDate SET couponName ='$couponName' WHERE expiredDateId='$id'";
    //         $result = $this->db->update($query);
    //         if ($result) {
    //             $alert = '
    //             <div class="alert alert-success" role="alert">
    //             Cập nhật thành công <a class="alert-link" href="./couponList.php">Quay lại danh sách thương hiệu</a>
    //             </div>
    //             ';


    //             return $alert;
    //         } else {
    //             $alert = '
    //             <div class="alert alert-danger" role="alert">
    //             Cập nhật thất bại <a class="alert-link" href="./couponList.php">Quay lại danh sách thương hiệu</a>
    //             </div>
    //             ';
    //             return $alert;
    //         }
    //     }
    // }

    public function DeleteCoupon($id)
    {
        $query = "DELETE FROM tbl_expiredDate WHERE expiredDateId = '$id' ";
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