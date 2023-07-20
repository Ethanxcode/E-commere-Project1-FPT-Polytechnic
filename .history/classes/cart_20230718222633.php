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
        $result = $this->db->select($query);
        $image = $result[0]['image'];
        $price = $result[0]['price'];
        $productName = $result[0]['productName'];

        $check_cart = "SELECT * FROM tbl_cart WHERE productId = '$cartId' AND sId = '$sId'";
        $query_cart = $this->db->select($check_cart);
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
    // public function insertOrder($customer_id, $totalPrice)
    // {
    //     $sId = session_id();
    //     $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
    //     $get_product = $this->db->select($query);

    //     if ($get_product) {
    //         foreach ($get_product as $result) {
    //             $productId = $result['productId'];
    //             $productName = $result['productName'];
    //             $quantity = $result['quantity'];
    //             $price = ($result['price'] * $quantity) * 1.1;
    //             $image = $result['image'];
    //             $customer_id = $customer_id;

    //             $insert_order = "INSERT INTO tbl_order(productId, productName, quantity, price, image, customer_id) 
    //         VALUE('$productId', '$productName', '$quantity', '$price', '$image', '$customer_id')";
    //             $insert_order = $this->db->insert($insert_order);

    //             if ($insert_order) {
    //                 header('Location: cart.php');
    //             } else {
    //                 header('Location: index.php');
    //             }
    //         }
    //     } else {
    //         echo "Error";
    //         echo $get_product;
    //         echo $sId;
    //     }
    // }





    public function insertOrder($customer_id, $totalPrice)
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
        $get_product = $this->db->select($query);

        if ($get_product) {
            $order_id = ''; // Lưu order_id của đơn hàng mới
            foreach ($get_product as $result) {
                $productId = $result['productId'];
                $productName = $result['productName'];
                $quantity = $result['quantity'];
                $price = ($result['price'] * $quantity) * 1.1;
                $image = $result['image'];

                // Thêm dữ liệu vào bảng tbl_order
                $insert_order = "INSERT INTO tbl_order (productId, productName, quantity, price, image, customer_id) 
                VALUES ('$productId', '$productName', '$quantity', '$price', '$image', '$customer_id')";
                $this->db->insert($insert_order);

                // Lấy order_id của đơn hàng vừa thêm vào
                $order_id = $this->db->getLastInsertedId();
            }

            // Thêm dữ liệu vào bảng tbl_order_items để lưu thông tin chi tiết của đơn hàng
            $insert_order_items = "INSERT INTO tbl_order_items (order_id, order_date, total_price) 
            VALUES ('$order_id', NOW(), '$totalPrice')";
            $this->db->insert($insert_order_items);

            // Xóa các sản phẩm trong giỏ hàng (tbl_cart) của session hiện tại
            $delete_cart_items = "DELETE FROM tbl_cart WHERE sId = '$sId'";
            $this->db->delete($delete_cart_items);

            // Chuyển hướng người dùng đến trang cart.php
            header('Location: cart.php');
            exit();
        } else {
            // Nếu không có sản phẩm trong giỏ hàng, xử lý tùy ý theo yêu cầu của bạn
            echo "Error";
            // header('Location: index.php');
            // exit();
        }
    }


    public function checkCoupon($couponCode, $currentTime)
    {

        $query = "SELECT * FROM tbl_coupon WHERE couponCode = '$couponCode' AND '$currentTime' >= releaseDate AND '$currentTime' <= expiredDate";
        $result = $this->db->select($query);

        if ($result) {
            foreach ($result as $coupon) {
                $discountAmount = $coupon['discountAmount'];
                $response = array(
                    'isValid' => true,
                    'discountAmount' => $discountAmount,
                    'errorMessage' => '<div class="w-100 alert alert-success" role="alert">Mã giảm giá đã được áp dụng.</div>'
                );
                header("Location: offline.php?discountAmount=$discountAmount");
                exit();
            }
        } else {

            $errorMessage = 'Mã giảm giá không hợp lệ.';
            $response = array(
                'isValid' => false,
                'errorMessage' => '<div class="alert " role="alert">' . $errorMessage . ' Đến trang đặt hàng? <a class="btn-danger text-danger" href="./offline.php">Tiếp tục</a></a></div>'
            );
        }

        return $response;
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
        $query = "SELECT o.*, c.fullName 
              FROM tbl_order AS o
              INNER JOIN tbl_customer AS c ON o.customer_id = c.id
              ORDER BY o.date_order";
        $get_inbox_cart = $this->db->select($query);
        return $get_inbox_cart;
    }

    // Trong lớp cart (hoặc lớp cha mà cart kế thừa), thêm phương thức get_order_items()
    // Các phương thức và thuộc tính khác của lớp

    // Trong lớp cart
    public function get_order_product($customer_id)
    {
        $query = "SELECT * FROM tbl_order WHERE customer_id = :customer_id";
        $params = array(':customer_id' => $customer_id);

        $result = $this->db->select($query, $params);

        return $result ? $result : false;
    }

    // Trong lớp cart
    public function get_product_details($product_id)
    {
        $query = "SELECT * FROM tbl_product WHERE productId = :product_id";
        $params = array(':product_id' => $product_id);

        $result = $this->db->select($query, $params);

        return $result ? $result[0] : false;
    }

    public function get_order_items($customer_id)
    {
        $query = "SELECT * FROM tbl_order_items WHERE customer_id = :order_id";
        $params = array(':order_id' => $customer_id);

        $result = $this->db->select($query, $params);

        return $result ? $result : false;
    }


    // Trong lớp cart
    public function get_order_items($order_id)
    {
        $query = "SELECT * FROM tbl_order_items WHERE customer_id = :order_id";
        $params = array(':order_id' => $order_id);

        $result = $this->db->select($query, $params);

        return $result ? $result : false;
    }




    public function shifted($id, $time, $price)
    {
        $query = "UPDATE tbl_order SET 
    status = '1'
    WHERE id = '$id' AND date_order = '$time' AND price = '$price'";
        $result = $this->db->update($query);

        if ($result) {
            $msg = '
        <div class="alert alert-success" role="alert">
        Cập nhật thành công
        </div>
        ';

            // Tăng sales của sản phẩm
            $querySales = "UPDATE tbl_product SET 
        sales = sales + (
            SELECT quantity 
            FROM tbl_order 
            WHERE id = '$id' AND date_order = '$time' AND price = '$price'
        )
        WHERE productId = (
            SELECT productId 
            FROM tbl_order 
            WHERE id = '$id' AND date_order = '$time' AND price = '$price'
        )";

            $resultSales = $this->db->update($querySales);

            if ($resultSales) {
                // Sales đã được tăng thành công
            } else {
                // Lỗi khi tăng sales
            }

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
    WHERE id = '$id' AND date_order = '$time' AND price = '$price'";
        $result = $this->db->update($query);
    }

}





?>