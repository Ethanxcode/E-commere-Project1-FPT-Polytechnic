<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
class category
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_category($catName)
    {
        $catName = $this->fm->validation($catName);
        if (empty($catName)) {
            $alert = "<span>Khoogn được bỏ trống catName</span>";
            return $alert;
        } else {
            $query = "INSERT INTO tbl_category(catName) VALUE('$catName')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = '
                <div class="alert alert-success" role="alert">
                Cập nhật thành công <a href="./catlist.php" class="alert-link">Quay lại danh sách</a>
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


    public function show_category()
    {
        $query = "SELECT * FROM tbl_category ORDER BY catId desc ";
        $result = $this->db->select($query);
        return $result;
    }

    public function getcatbyid($id)
    {
        $query = "SELECT * FROM tbl_category WHERE catId = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_category($catName, $id)
    {
        $catName = $this->fm->validation($catName);

        if (empty($catName)) {
            $alert = "<span>Khoogn được bỏ trống catName</span>";
            return $alert;
        } else {
            $query = "UPDATE tbl_category SET catName ='$catName' WHERE catId='$id'";
            $result = $this->db->update($query);
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

    public function delete_category($id)
    {
        $query = "DELETE FROM tbl_category WHERE catId = '$id' ";
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