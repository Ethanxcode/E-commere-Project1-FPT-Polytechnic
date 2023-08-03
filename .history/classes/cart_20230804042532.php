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
        $checkQuantityQuery = "SELECT stock FROM tbl_product WHERE productId = '$cartId'";
        $checkQuantityResult = $this->db->select($checkQuantityQuery);

        if ($checkQuantityResult) {
            $stock = $checkQuantityResult[0]['stock'];

            if ($quantity > $stock) {
                $msg = "Số lượng không được vượt quá tồn kho!";
                return $msg;
            }

            $sId = session_id();
            $query = "SELECT * FROM tbl_product WHERE productId = '$cartId'";
            $result = $this->db->select($query);

            if ($result) {
                $image = $result[0]['image'];
                $price = $result[0]['price'];
                $productName = $result[0]['productName'];

                $checkCartQuery = "SELECT * FROM tbl_cart WHERE productId = '$cartId' AND sId = '$sId'";
                $checkCartResult = $this->db->select($checkCartQuery);

                if ($checkCartResult) {
                    $msg = "Sản Phẩm Đã Có Trong Giỏ Hàng";
                    return $msg;
                } else {
                    $query_insert = "INSERT INTO tbl_cart (productId, quantity, sId, image, price, productName) VALUES ('$cartId', '$quantity', '$sId', '$image', '$price', '$productName')";
                    $insert_cart = $this->db->insert($query_insert);
                    if ($insert_cart) {
                        header('Location: cart.php');
                        exit();
                    } else {
                        header('Location: index.php');
                        exit();
                    }
                }
            } else {
                header('Location: index.php');
                exit();
            }
        } else {
            header('Location: index.php');
            exit();
        }
    }


    public function update_quantity_cart($quantity, $cartId, $productId)
    {

        $quantity = $this->fm->validation($quantity);
        $checkQuantityQuery = "SELECT stock FROM tbl_product WHERE productId = '$productId'";
        $checkQuantityResult = $this->db->select($checkQuantityQuery);

        if ($checkQuantityResult) {
            $stock = $checkQuantityResult[0]['stock'];
            if ($quantity > $stock) {
                $msg = "<div class='alert alert-danger' role='alert'>
            Số lượng không được vượt quá tồn kho!
            </div>";
                return $msg;
            } else {
                $query = "UPDATE tbl_cart SET 
        quantity = '$quantity'
        WHERE cartId = '$cartId' ";
                $result = $this->db->update($query);

            }
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






    public function insertOrder($customer_id, $totalPrice, $notes, $address, $discountAmount, $quantity)
    {
        if ($address == null || $address = '') {
            $msg = '
            <div class="alert alert-danger" role="alert">
            Vui lòng nhập địa chỉ nhận hàng!
            </div>
            ';

            return $msg;
        }

        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
        $get_product = $this->db->select($query);

        if ($get_product) {
            // Insert the order into the tbl_order_items table
            $insert_order_items = "INSERT INTO tbl_order_items (customer_id, order_date, notes, total_price, address, discountAmount, quantity) 
            VALUES ('$customer_id', NOW(), '$notes', '$totalPrice', '$address', '$discountAmount', '$quantity')";
            $this->db->insert($insert_order_items);

            $query = "SELECT id FROM tbl_order_items ORDER BY order_date DESC LIMIT 1";
            $getOrderId = $this->db->select($query);

            if ($getOrderId) {
                $order_id = $getOrderId[0]['id'];

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

                return $getOrderId[0]['id']; // Return the order_id
            } else {
                // Handle the case when no order_id is found (possibly no orders in tbl_order_items yet)
                echo "No order_id found in tbl_order_items";
                exit();
            }
        } else {
            // Handle the case when no products are in the cart
            echo "No products found in cart";
            exit();
        }
    }







    public function checkCoupon($couponCode, $currentTime)
    {
        if ($couponCode != null && $currentTime != null) {

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
        header("Location: offline.php");

    }





    public function getAmountPrice($customer_id)
    {
        $sId = session_id();
        $query = "SELECT price FROM tbl_order_items WHERE customer_id ='$customer_id'";
        $get_price = $this->db->select($query);
        return $get_price;
    }

    public function get_cart_order($customer_id, $order_id)
    {
        $sId = session_id();

        $query = "SELECT * FROM tbl_order_items WHERE customer_id = '$customer_id' AND id = '$order_id' ORDER BY order_date DESC LIMIT 1";
        $get_cart_order = $this->db->select($query);
        return $get_cart_order;
    }

    public function get_cart_orders($customer_id)
    {
        $sId = session_id();
        // $query = "SELECT * FROM tbl_order_items WHERE customer_id ='$customer_id' ORDER BY order_date ASC";
        $query = "SELECT * FROM tbl_order_items WHERE customer_id = '$customer_id' ORDER BY order_date DESC ";


        $get_cart_order = $this->db->select($query);
        return $get_cart_order;
    }
    public function get_inbox_cart()
    {
        $query = "SELECT oi.*, c.fullName, o.price 
              FROM tbl_order_items AS oi
              INNER JOIN tbl_customer AS c ON oi.customer_id = c.id
              INNER JOIN tbl_order AS o ON oi.id = o.orderId
              ORDER BY oi.order_date DESC";
        $get_inbox_cart = $this->db->select($query);
        return $get_inbox_cart;
    }

    public function get_detail_inbox_cart($customer_id, $order_id)
    {
        $query = "SELECT
                oi.*,
                c.fullName,
                c.phoneNumber,
                c.email,
                c.address AS customer_address
            FROM tbl_order_items AS oi
            INNER JOIN tbl_customer AS c ON oi.customer_id = c.id
            WHERE oi.customer_id = '$customer_id' AND oi.id = '$order_id'";

        $get_detail_inbox_cart = $this->db->select($query);
        return $get_detail_inbox_cart;
    }









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



    public function shifted($id, $time, $price, $total_price)
    {

        $query = "UPDATE tbl_order_items SET 
            status = '1'
          WHERE id = '$id' AND order_date = '$time' AND total_price = '$total_price'";
        $result = $this->db->update($query);

        if ($result) {
            $query = "UPDATE tbl_order SET 
            status = '1'
          WHERE id = '$id' AND order_date = '$time' AND total_price = '$total_price'";

            $msg = '<div class="alert alert-success" role="alert">
                Cập nhật thành công
            </div>';

            // Tăng sales của sản phẩm
            $querySales = "UPDATE tbl_product SET 
                    sales = sales + (
                        SELECT quantity 
                        FROM tbl_order_items
                        WHERE id = '$id' AND order_date = '$time'
                    ),
                    stock = stock - (
                        SELECT quantity 
                        FROM tbl_order 
                        WHERE orderId = '$id' AND date_order = '$time' AND price = '$price'
                    )
                   WHERE productId = (
                        SELECT productId 
                        FROM tbl_order 
                        WHERE id = '$id' AND date_order = '$time' AND price = '$price'
                    )";

            $resultSales = $this->db->update($querySales);

            // Sales đã được tăng thành công
            return $msg;


        } else {
            $msg = '<div class="alert alert-danger" role="alert">
                Cập nhật thất bại 
            </div>';
            return $msg;
        }
    }

    public function shiftCancel($id, $time, $price, $total_price)
    {
        $query = "UPDATE tbl_order_items SET 
        status = '9'
      WHERE id = '$id' AND order_date = '$time' AND total_price = '$total_price'";
        $result = $this->db->update($query);

        if ($result) {
            $query = "UPDATE tbl_order SET 
        status = '9'
      WHERE id = '$id' AND order_date = '$time' AND total_price = '$total_price'";
            $msg = '<div class="alert alert-success" role="alert">
            Cập nhật thành công
        </div>';

            // Tăng sales của sản phẩm
            $querySales = "UPDATE tbl_product SET 
                sales = sales + (
                    SELECT quantity 
                    FROM tbl_order_items
                    WHERE id = '$id' AND order_date = '$time'
                ),
                stock = stock - (
                    SELECT quantity 
                    FROM tbl_order 
                    WHERE orderId = '$id' AND date_order = '$time' AND price = '$price'
                )
               WHERE productId = (
                    SELECT productId 
                    FROM tbl_order 
                    WHERE id = '$id' AND date_order = '$time' AND price = '$price'
                )";

            $querySales = $this->db->update($querySales);

            // Sales đã được tăng thành công
            return $msg;
        } else {
            $msg = '<div class="alert alert-danger" role="alert">
            Cập nhật thất bại 
        </div>';
            return $msg;
        }
    }



    public function del_shifted($id, $time, $price, $total_price)
    {
        $queryOrderItems = "DELETE FROM tbl_order_items WHERE id = '$id' AND order_date = '$time' AND total_price = '$total_price'";
        $queryOrder = "DELETE FROM tbl_order WHERE id = '$id' AND date_order = '$time' AND price = '$price'";

        $resultOrderItems = $this->db->update($queryOrderItems);
        $resultOrder = $this->db->update($queryOrder);

        if ($resultOrderItems && $resultOrder) {
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

    public function shifted_conf($id, $time, $price, $total_price)
    {
        $queryOrderItems = "UPDATE tbl_order_items SET status = '2' WHERE id = '$id' AND order_date = '$time' AND total_price = '$total_price'";
        $queryOrder = "UPDATE tbl_order SET status = '2' WHERE date_order = '$time' AND price = '$price'";

        $resultOrderItems = $this->db->update($queryOrderItems);
        $resultOrder = $this->db->update($queryOrder);

        if ($resultOrderItems && $resultOrder) {
            $msg = '<div class="alert alert-success" role="alert">
                    Xác nhận thành công 
                </div>';
            return $msg;
        } else {
            $msg = '<div class="alert alert-danger" role="alert">
                    Xác nhận thất bại 
                </div>';
            return $msg;
        }
    }



}





?>