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
    public function insertCoupon($brandName)
    {
        $brandName = $this->fm->validation($brandName);
        if (empty($brandName)) {
            $alert = "<span>Không được bỏ trống </span>";
            return $alert;
        } else {
            $query = "INSERT INTO tbl_brand(brandName) VALUE('$brandName')";
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
    public function UpdateCoupon($brandName, $id)
    {
        $brandName = $this->fm->validation($brandName);

        if (empty($brandName)) {
            $alert = "<span>Khoogn được bỏ trống brandName</span>";
            return $alert;
        } else {
            $query = "UPDATE tbl_brand SET brandName ='$brandName' WHERE brandId='$id'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = '
                <div class="alert alert-success" role="alert">
                Cập nhật thành công <a class="alert-link" href="./brandlist.php">Quay lại danh sách thương hiệu</a>
                </div>
                ';


                return $alert;
            } else {
                $alert = '
                <div class="alert alert-danger" role="alert">
                Cập nhật thất bại <a class="alert-link" href="./brandlist.php">Quay lại danh sách thương hiệu</a>
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