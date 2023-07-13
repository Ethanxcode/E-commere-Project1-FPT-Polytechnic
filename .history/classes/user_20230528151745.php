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
    public function show_index()
    {
        $query = "SELECT * FROM tbl_product";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_profile($id, $hovaten, $sodienthoai, $tendangnhap)
    {

        $query = "UPDATE tbl_customer SET hovaten ='$hovaten',sodienthoai ='$sodienthoai',tendangnhap ='$tendangnhap'  WHERE id='$id'";
        $result = $this->db->update($query);
        if ($result) {
            Session::set('customer_login', true);
            Session::set('customer_id', $id);
            Session::set('customer_name', $hovaten);
            header('Location:profile.php');
            // $alert = '
            //     <div class="alert alert-success" role="alert">
            //     Cập nhật thành công 
            //     </div>
            //     ';
            // return $alert;
        }
    }
}





?>