<?php

use function PHPSTORM_META\type;

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
class product
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_product($data, $files)
    {
        $productName = htmlspecialchars($data['productName']);
        $brand = htmlspecialchars($data['brand']);
        $category = htmlspecialchars($data['category']);
        $product_desc = htmlspecialchars($data['product_desc']);
        $price = htmlspecialchars($data['price']);
        $type = htmlspecialchars($data['type']);
        // Kiểm tra hình ảnh lấy hình anh vbaof forder 


        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;


        if ($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $type == "" || $file_name == "") {
            $alert = "<span>Các Trường không được phép rỗng</span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product(productName,brandId,catId,product_desc,price,type,image) VALUE('$productName','$brand','$category','$product_desc','$price','$type','$unique_image')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = '
                <div class="alert alert-success" role="alert">
                Cập nhật thành công <a href="./productlist.php" class="alert-link">Quay lại danh sách</a>
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
    public function insert_slider($data, $files)
    {
        $sliderName = htmlspecialchars($data['sliderName']);
        $sliderDesc = htmlspecialchars($data['sliderDesc']);
        $title = htmlspecialchars($data['title']);
        $type = htmlspecialchars($data['type']);
        // Kiểm tra hình ảnh lấy hình anh vbaof forder 


        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($sliderName == "" || $sliderDesc == "" || $title == "" || $type == "") {
            $alert = '<div class="alert alert-danger" role="alert">
            Các Trường không được phép rỗng 
                    </div>';

            return $alert;
        } else {
            if (!empty($file_name)) {
                if ($file_size > 3000000) {
                    echo $alert = "<span class='success'>file vượt quá dung lượng (3mb)</span>";
                    return $alert;
                }
                if (in_array($file_ext, $permited) === false) {
                    echo $alert = "<span class='success'>file không hợp lệ</span>";
                    return $alert;
                }
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO tbl_slider(sliderName,sliderDesc,title,type,image) VALUE('$sliderName','$sliderDesc','$title','$type','$unique_image')";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = '
                    <div class="alert alert-success" role="alert">
                    Cập nhật thành công <a href="./sliderlist.php" class="alert-link">Quay lại danh sách !</a>
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
            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                Các Trường không được phép rỗng 
                        </div>';
                return $alert;
            }
        }
    }
    public function show_slider()
    {
        $query = "SELECT * FROM tbl_slider WHERE type ='1' order by 'id' desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_list_slider()
    {
        $query = "SELECT * FROM tbl_slider order by 'id' desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_type_slider($type, $id)
    {
        if ($type == 1) {
            $query = "UPDATE tbl_slider SET 
            type = '0'
            WHERE id = '$id'
            ";
        } else {
            $query = "UPDATE tbl_slider SET 
            type = '1'
            WHERE id = '$id'
            ";
        }
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
    public function del_slider($id)
    {
        $query = "DELETE FROM tbl_slider WHERE id = '$id' ";
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


    public function show_product()
    {
        $query = " SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
            FROM tbl_product INNER JOIN  tbl_category ON tbl_product.catId = tbl_category.catId
            INNER JOIN  tbl_brand ON tbl_product.brandId = tbl_brand.brandId
            ORDER BY tbl_product.productId desc ";
        // $query = "SELECT * FROM tbl_product ORDER BY productId desc ";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_product($data, $file, $id)
    {
        $productName = htmlspecialchars($data['productName']);
        $brand = htmlspecialchars($data['brand']);
        $category = htmlspecialchars($data['category']);
        $product_desc = htmlspecialchars($data['product_desc']);
        $price = htmlspecialchars($data['price']);
        $type = htmlspecialchars($data['type']);

        // Kiểm tra hình ảnh lấy hình anh vbaof forder 


        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $type == "") {
            $alert = '<div class="alert alert-danger" role="alert">
            Các Trường không được phép rỗng 
                    </div>';
            return $alert;
        } else {
            // nếu người dùng chọn ảnh
            if (!empty($file_name)) {
                if ($file_size > 3000000) {
                    echo $alert = "<span class='success'>file vượt quá dung lượng (3mb)</span>";
                    return $alert;
                }
                if (in_array($file_ext, $permited) === false) {
                    echo $alert = "<span class='success'>file không hợp lệ</span>";
                    return $alert;
                }
                move_uploaded_file($file_temp, $uploaded_image);

                $query = "UPDATE tbl_product SET 
                productName = '$productName',
                brandId = '$brand',
                catId = '$category',
                type = '$type',
                price = '$price',
                image = '$unique_image',
                product_desc = '$product_desc'
                WHERE productId = '$id'
                ";
            } else {
                $query = "UPDATE tbl_product SET 
                productName = '$productName',
                brandId = '$brand',
                catId = '$category',
                type = '$type',
                price = '$price',
                product_desc = '$product_desc'
                WHERE productId = '$id'
                ";
            }
            $result = $this->db->update($query);
            if ($result) {
                $alert = '
                <div class="alert alert-success" role="alert">
                Cập nhật thành công <a href="./productlist.php" class="alert-link">Quay lại danh sách</a>
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

    public function delete_product($id)
    {
        $query = "DELETE FROM tbl_product WHERE productId = '$id' ";
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
    public function getproductbyid($id)
    {
        $query = "SELECT * FROM tbl_product WHERE productId = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    //end
    public function getproduct_feathered()
    {
        ///sắp xếp theo sales 4/4/2023
        $query = "SELECT * FROM tbl_product ORDER BY sales DESC LIMIT 4 ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_new()
    {
        $query = "SELECT * FROM tbl_product order by productId desc LIMIT 4";

        $result = $this->db->select($query);
        return $result;
    }
    public function get_details($id)
    {

        $query = " SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
            FROM tbl_product INNER JOIN  tbl_category ON tbl_product.catId = tbl_category.catId
            INNER JOIN  tbl_brand ON tbl_product.brandId = tbl_brand.brandId WHERE tbl_product.productId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function insertCompare($productid, $customer_id)
    {

        $check_compare = "SELECT * FROM tbl_compare WHERE productId = '$productid' AND customer_id = '$customer_id'";
        $query_compare =  $this->db->select($check_compare);
        if ($query_compare) {
            $msg = '<div class="alert alert-danger" role="alert">
            Đã thêm vào so sách 
                    </div>';
            return $msg;
        }

        $query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
        $result =   $this->db->select($query);

        $productName = $result[0]['productName'];
        $price = $result[0]['price'];
        $image = $result[0]['image'];
        $query_insert = "INSERT INTO tbl_compare(productid,customer_id,productName,image,price) VALUE('$productid','$customer_id','$productName','$image','$price')";
        $insert_compare = $this->db->insert($query_insert);

        if ($insert_compare) {
            $alert = '<div class="alert alert-success" role="alert">
            Cập nhật thành công
                    </div>';
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
    public function insertWishlist($productid, $customer_id)
    {

        $check_compare = "SELECT * FROM tbl_wishlist WHERE productId = '$productid' AND customer_id = '$customer_id'";
        $query_compare =  $this->db->select($check_compare);
        if ($query_compare) {
            $msg = '<div class="alert alert-danger" role="alert">
            Sản phẩm đã thêm vào yêu thích 
                    </div>';;
            return $msg;
        }

        $query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
        $result =   $this->db->select($query);

        $productName = $result[0]['productName'];
        $price = $result[0]['price'];
        $image = $result[0]['image'];
        $query_insert = "INSERT INTO tbl_wishlist(productid,customer_id,productName,image,price) VALUE('$productid','$customer_id','$productName','$image','$price')";
        $insert_compare = $this->db->insert($query_insert);
        if ($insert_compare) {
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


    public function get_compare($customer_id)
    {
        $query = "SELECT * FROM tbl_compare WHERE customer_id = '$customer_id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function delete_compare($id)
    {
        $query = "DELETE FROM tbl_compare WHERE id = '$id' ";
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
    public function get_wishlist($customer_id)
    {
        $query = "SELECT * FROM tbl_wishlist WHERE customer_id = '$customer_id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function delete_wishlist($id)
    {
        $query = "DELETE FROM tbl_wishlist WHERE id = '$id' ";
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


    public function search_product($tukhoa, $page)
    {
        $pages = $page * 8 - 8;
        $catName = $this->fm->validation($tukhoa);
        $query = "SELECT * FROM tbl_product WHERE  productName like '%$tukhoa%' LIMIT 8 OFFSET $pages ";
        $result = $this->db->select($query);
        return $result;
    }
    public function all_product($page)
    {
        $pages = $page * 8 - 8;
        $query = "SELECT * FROM tbl_product order by productId desc LIMIT 8 OFFSET $pages";
        // $query = "SELECT * FROM tbl_product order by productId desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_category_product($catId, $page)
    {
        $pages = $page * 8 - 8;
        $query = "SELECT * FROM tbl_product WHERE catId = '$catId' LIMIT 8 OFFSET $pages  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_brand_product($brandId, $page)
    {
        $pages = $page * 8 - 8;
        $query = "SELECT * FROM tbl_product WHERE brandId = '$brandId' LIMIT 8 OFFSET $pages  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function count_pages($brandId)
    {
        $query = "SELECT * FROM tbl_product WHERE brandId = '$brandId'  ";
        $result = $this->db->select($query);
        return $result;
    }




    // comment
    public function insert_comment($productid, $customerid, $comment)
    {
        if (empty($comment)) {
            $alert = "<span>Không được bỏ trống </span>";
            return $alert;
        } else {

            $query = "INSERT INTO tbl_review(productId,customerId,comment) VALUE('$productid','$customerid','$comment')";
            $result = $this->db->insert($query);
        }
    }
    public function get_comment($productid)
    {
        $query = "SELECT * FROM tbl_review WHERE productId = '$productid' ";
        $result = $this->db->select($query);
        return $result;
    }
}





?>