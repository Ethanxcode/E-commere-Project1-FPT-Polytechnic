<?php
require_once 'database.php';
require_once 'format.php';

class Cart
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function addToCart($quantity, $cartId)
    {
        $quantity = $this->fm->validation($quantity);
        $sId = session_id();

        $query = "SELECT * FROM tbl_product WHERE productId = '$cartId'";
        $result = $this->db->select($query);

        if (!$result) {
            return "Sản phẩm không tồn tại.";
        }

        $product = $result[0];
        $image = $product['image'];
        $price = $product['price'];
        $productName = $product['productName'];

        $checkCartQuery = "SELECT * FROM tbl_cart WHERE productId = '$cartId' AND sId = '$sId'";
        $existingCart = $this->db->select($checkCartQuery);

        if ($existingCart) {
            return "Sản phẩm đã có trong giỏ hàng.";
        }

        $insertCartQuery = "INSERT INTO tbl_cart(productId, quantity, sId, image, price, productName) VALUE('$cartId', '$quantity', '$sId', '$image', '$price', '$productName')";
        $insertCart = $this->db->insert($insertCartQuery);

        if ($insertCart) {
            header('Location: cart.php');
        } else {
            header('Location: index.php');
        }
    }

    public function updateQuantityCart($quantity, $cartId)
    {
        $query = "UPDATE tbl_cart SET quantity = '$quantity' WHERE cartId = '$cartId'";
        $result = $this->db->update($query);

        if ($result) {
            $alert = '<div class="alert alert-success" role="alert">Cập nhật thành công</div>';
            return $alert;
        } else {
            $alert = '<div class="alert alert-danger" role="alert">Cập nhật thất bại</div>';
            return $alert;
        }
    }

    public function deleteProductCart($cartId)
    {
        $query = "DELETE FROM tbl_cart WHERE cartId ='$cartId'";
        $result = $this->db->delete($query);

        if ($result) {
            header('Location: cart.php');
            $msg = '<div class="alert alert-success" role="alert">Xóa thành công</div>';
            return $msg;
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Xóa thất bại</div>';
            return $msg;
        }
    }

    public function getProductCart()
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId ='$sId'";
        $result = $this->db->select($query);
        return $result;
    }

    public function deleteDataCart()
    {
        $sId = session_id();
        $query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }

    // Các phương thức khác...

}
?>