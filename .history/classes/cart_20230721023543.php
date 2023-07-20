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





    public function insertOrder($customer_id, $totalPrice, $notes, $address, $discountAmount)
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
        $get_product = $this->db->select($query);

        if ($get_product) {
            // Insert the order into the tbl_order_items table
            $insert_order_items = "INSERT INTO tbl_order_items (customer_id, order_date, notes, total_price, address, discountAmount) 
VALUES ('$customer_id', NOW(), '$notes', '$totalPrice', '$address', '$discountAmount')";

            $this->db->insert($insert_order_items);


            $query = "SELECT id FROM tbl_order_items ORDER BY order_date DESC LIMIT 1";
            $getOrderId = $this->db->select($query);
            $order_id = $getOrderId[0]['id'];

            if ($getOrderId) {

                // Use the obtained order_id in the subsequent insert query
                foreach ($get_product as $result) {
                    $productId = $result['productId'];
                    $productName = $result['productName'];
                    $quantity = $result['quantity'];
                    $price = ($result['price'] * $quantity) * 1.1;
                    $image = $result['image'];

                    // Insert the order items into the tbl_order table
                    $insert_order = "INSERT INTO tbl_order (orderId, productId, productName, quantity, price, image, customer_id) 
        VALUES ('$order_id', '$productId', '$productName', '$quantity', '$price', '$image', '$customer_id')";
                    $this->db->insert($insert_order);
                }

                // Proceed with other parts of the code
            } else {
                // Handle the case when no order_id is found (possibly no orders in tbl_order_items yet)
                echo "No order_id found in tbl_order_items";
            }
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
        $query = "SELECT * FROM tbl_order_items WHERE customer_id ='$customer_id' ORDER BY order_date DESC";
        $get_cart_order = $this->db->select($query);
        return $get_cart_order;
    }
    public function get_inbox_cart()
    {
        $query = "SELECT oi.*, c.fullName 
              FROM tbl_order_items AS oi
              INNER JOIN tbl_customer AS c ON oi.customer_id = c.id
              ORDER BY oi.order_date";
        $get_inbox_cart = $this->db->select($query);
        return $get_inbox_cart;
    }
    public function get_detail_inbox_cart($customer_id)
    {
        $query = "SELECT oi.*, 
              FROM tbl_order_items AS oi
              INNER JOIN tbl_customer AS c ON oi.customer_id = c.id
              WHERE oi.customer_id = '$customer_id'
              ";
        $get_detail_inbox_cart = $this->db->select($query);
        return $get_detail_inbox_cart;
    }





    // Trong lớp cart (hoặc lớp cha mà cart kế thừa), thêm phương thức get_order_items()
    // Các phương thức và thuộc tính khác của lớp

    // Trong lớp cart

    // Trong lớp cart

    // Trong lớp cart
    public function get_order_items($customer_id, $order_id)
    {
        $query = "SELECT 
        oi.id AS order_item_id,
        oi.notes,
        o.orderId AS order_id,
        o.productName AS product_name,
        o.quantity AS quantity,
        o.price AS price,
        o.status AS order_status,
        o.date_order AS order_date,
        oi.address AS order_address,
        oi.total_price AS total_price,
        o.image AS image
    FROM
        tbl_order_items oi
    JOIN
        tbl_order o ON oi.id = o.orderId
    WHERE
        o.customer_id = '$customer_id' AND
        o.orderId = '$order_id'";

        $result = $this->db->select($query);


        if ($result) {
            return $result;
        }
    }



    public function shifted($id, $time, $price)
    {
        $query = "UPDATE tbl_order_items SET 
                status = '1'
              WHERE id = '$id' AND order_date = '$time' AND total_price = '$price'";
        $result = $this->db->update($query);

        if ($result) {
            $msg = '<div class="alert alert-success" role="alert">
                    Cập nhật thành công
                </div>';

            // Tăng sales của sản phẩm
            $querySales = "UPDATE tbl_product SET 
                        sales = sales + (
                            SELECT quantity 
                            FROM tbl_order_items 
                            WHERE id = '$id' AND order_date = '$time' AND total_price = '$price'
                        )
                       WHERE productId = (
                            SELECT productId 
                            FROM tbl_order_items 
                            WHERE id = '$id' AND order_date = '$time' AND total_price = '$price'
                        )";

            $resultSales = $this->db->update($querySales);

            if ($resultSales) {
                // Sales đã được tăng thành công
            } else {
                // Lỗi khi tăng sales
            }

            return $msg;
        } else {
            $msg = '<div class="alert alert-danger" role="alert">
                    Cập nhật thất bại 
                </div>';
            return $msg;
        }
    }

    public function del_shifted($id, $time, $price)
    {
        $query = "DELETE FROM tbl_order_items
              WHERE id = '$id' AND order_date = '$time' AND total_price = '$price'";
        $result = $this->db->update($query);
        if ($result) {
            $msg = '<div class="alert alert-success" role="alert">
                    Xoá thành công 
                </div>';
            return $msg;
        } else {
            $msg = '<div class="alert alert-danger" role="alert">
                    Xoá thất bại 
                </div>';
            return $msg;
        }
    }
    public function shifted_conf($id, $time, $price)
    {
        $query = "UPDATE tbl_order_items SET 
                status = '2'
              WHERE id = '$id' AND order_date = '$time' AND total_price = '$price'";
        $result = $this->db->update($query);
    }


}





?>