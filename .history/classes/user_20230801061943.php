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
        $query = "SELECT * FROM tbl_order_items WHERE quantity > 0";
        $result = $this->db->select($query);
        return $result;
    }
    public function getOrderTypeCount()
    {
        $query = "SELECT COUNT(*) AS count FROM tbl_order_items WHERE status = 0";
        $result = $this->db->select($query);

        if ($result && isset($result[0]['count'])) {
            return (int) $result[0]['count'];
        }

        return 0;
    }
    public function getOrderTypeCancel()
    {
        $query = "SELECT COUNT(*) AS count FROM tbl_order_items WHERE status = 9";
        $result = $this->db->select($query);

        if ($result && isset($result[0]['count'])) {
            return (int) $result[0]['count'];
        }

        return 0;
    }

    public function calculateTotalSales()
    {
        $query = "SELECT SUM(quantity) AS totalSales FROM tbl_order_items WHERE status = 2";
        $result = $this->db->select($query);

        if ($result && isset($result[0]['totalSales'])) {
            return (int) $result[0]['totalSales'];
        }

        return 0;
    }

    public function calculateTotalRevenue()
    {
        $query = "SELECT SUM(total_price) AS totalRevenue 
              FROM tbl_order_items 
              WHERE status = '2'";

        $result = $this->db->select($query);

        if ($result && isset($result[0]['totalRevenue'])) {
            return (float) $result[0]['totalRevenue'];
        }

        return 0;
    }

    public function getCategoryCount()
    {
        $query = "SELECT COUNT(*) AS count FROM tbl_category";
        $result = $this->db->select($query);

        if ($result && isset($result[0]['categoryCount'])) {
            return (int) $result[0]['count'];
        }

        return 0;
    }
    public function getBrandCount()
    {
        $query = "SELECT COUNT(*) AS count FROM tbl_brand";
        $result = $this->db->select($query);

        if ($result && isset($result[0]['count'])) {
            return (int) $result[0]['count'];
        }

        return 0;
    }




}





?>