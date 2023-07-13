<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
class cart
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function add_to_cart($quantity, $cartId)
    {

        $quantity = $this->fm->validation($quantity);
        $sId = session_id();


        $query = "SELECT * FROM tbl_product WHERE productId = '$cartId'";
        $result =   $this->db->select($query);
        $image = $result[0]['image'];
        $price = $result[0]['price'];
        $productName = $result[0]['productName'];

        $check_cart = "SELECT * FROM tbl_cart WHERE productId = '$cartId' AND sId = '$sId'";
        $query_cart =  $this->db->select($check_cart);
        if ($query_cart) {
            $msg = "Sản Phẩm Đã Có Trong Gỏi Hàng";
            return $msg;
        } else {
            $query_insert = "INSERT INTO tbl_cart(productId,quantity,sId,image,price,productName) VALUE('$cartId','$quantity','$sId','$image','$price','$productName')";
            $insert_cart = $this->db->insert($query_insert);
            if ($result) {
                header('Location:cart.php');
            } else {
                header('Location:index.php');
            }
        }
    }


    public function update_quantity_cart($quantity, $cartId)
    {
        $query = "UPDATE tbl_cart SET 
        quantity = '$quantity'
        WHERE cartId = '$cartId' ";
        $result = $this->db->update($query);
        if ($result) {
            $msg = '
            <div class="alert alert-success" role="alert">
            Cập nhật thành công 
            </div>
            ';
            return $msg;
        } else {
            $msg = '
            <div class="alert alert-danger" role="alert">
            Cập nhật thất bại
            </div>
            ';
            return $msg;
        }
    }
    public function delete_product_cart($cartId)
    {

        $query = "DELETE FROM tbl_cart WHERE cartId ='$cartId'";
        $result = $this->db->delete($query);
        if ($result) {
            header('Location:cart.php');

            $msg = '
            <div class="alert alert-success" role="alert">
            Xóa thành công <a class="alert-link"
            </div>
            ';
            return $msg;
        } else {
            $msg = '
            <div class="alert alert-danger" role="alert">
            Xóa thất bại 
            </div>
            ';
            return $msg;
        }
    }
    public function get_product_cart()
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId ='$sId'";
        $result = $this->db->select($query);
        return $result;
    }
    public function dell_data_cart()
    {
        $sId = session_id();
        $query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }
    public function insertOrder($customer_id)
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId ='$sId'";
        $get_product = $this->db->select($query);
        if ($get_product) {
            foreach ($get_product as $result) {
                $productId = $result['productId'];
                $productName = $result['productName'];
                $quantity = $result['quantity'];
                $price = ($result['price'] * $quantity) * 1.1;
                $image = $result['image'];
                $customer_id = $customer_id;
                // tăng số lượng mua sản phảm 
                $querySales = "UPDATE tbl_product SET 
                sales = sales + '$quantity'
                WHERE productId = '$productId'
                ";
                $resultSales = $this->db->update($querySales);
                $insert_order = "INSERT INTO tbl_order(productId,productName,quantity,price,image,customer_id) 
                VALUE('$productId','$productName','$quantity','$price','$image','$customer_id')";
                $insert_order = $this->db->insert($insert_order);
                if ($insert_order) {
                    header('Location:cart.php');
                } else {
                    header('Location:index.php');
                }
            }
        } else {
            echo "Error";
            echo $get_product;
            echo $sId;
        }
    }
    public function getAmountPrice($customer_id)
    {
        $sId = session_id();
        $query = "SELECT price FROM tbl_order WHERE customer_id ='$customer_id'";
        $get_price = $this->db->select($query);
        return $get_price;
    }

    public function get_cart_order($customer_id)
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_order WHERE customer_id ='$customer_id'";
        $get_cart_order = $this->db->select($query);
        return $get_cart_order;
    }
    public function get_inbox_cart()
    {
        $query = "SELECT * FROM tbl_order ORDER BY date_order";
        $get_inbox_cart = $this->db->select($query);
        return $get_inbox_cart;
    }
    public function shifted($id, $time, $price)
    {
        $query = "UPDATE tbl_order SET 
        status = '1'
        WHERE id = '$id' AND date_order= '$time' AND price= '$price' ";
        $result = $this->db->update($query);
        if ($result) {
            $msg = '
            <div class="alert alert-success" role="alert">
            Cập nhật thành công
            </div>
            ';
            // /
            return $msg;
        } else {
            $msg = '
            <div class="alert alert-danger" role="alert">
            Cập nhật thất bại 
            </div>
            ';
            return $msg;
        }
    }
    public function del_shifted($id, $time, $price)
    {
        $query = "DELETE FROM  tbl_order
        WHERE id = '$id' AND date_order= '$time' AND price= '$price' ";
        $result = $this->db->update($query);
        if ($result) {
            $msg = '
            <div class="alert alert-success" role="alert">
            Xóa thành công 
            </div>
            ';
            return $msg;
        } else {
            $msg = '
            <div class="alert alert-danger" role="alert">
            Xóa thất bại 
            </div>
            ';
            return $msg;
        }
    }
    public function shifted_conf($id, $time, $price)
    {
        $query = "UPDATE tbl_order SET 
        status = '2'
        WHERE customer_id = '$id' AND date_order= '$time' AND price= '$price' ";
        $result = $this->db->update($query);
    }
}





?>