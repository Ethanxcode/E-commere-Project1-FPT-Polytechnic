<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
class brand
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_brand($brandName)
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
                Cập nhật thành công <a href="./brandlist.php" class="alert-link">Quay lại danh sách</a>
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


    public function show_brand()
    {
        $query = "SELECT * FROM tbl_brand ORDER BY brandId desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getbrandbyid($id)
    {
        $query = "SELECT * FROM tbl_brand WHERE brandId = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_brand($brandName, $id)
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

    public function delete_brand($id)
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