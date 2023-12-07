<?php
include "header.php";
include "../model/pdo.php";
include "../model/category.php";
include "../model/product.php";
include "../model/color.php";
include "../model/size.php";
include "../model/user.php";


// controler
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            /**----------------------------------------Category----------------------------------- */
        case 'adddm':
            if (isset($_POST['add']) && ($_POST['add'])) {
                $name = $_POST['name'];
                insert_category($name);
                $thongbao = "THEM THANH CONG";
            }
            include "category/add.php";
            break;

        case 'listdm':
            $listcategory = loalall();
            include "category/list.php";
            break;

        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_category($_GET['id']);
            }
            $listcategory = loalall();
            include "category/list.php";
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loalone($_GET['id']);
            }
            include "category/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $name = $_POST['name'];
                $category_id = $_POST['category_id'];
                update_category($category_id, $name);
                $thongbao = "UPDATE THANH CONG";
            }
            $listcategory = loalall();
            include "category/list.php";
            break;

            /**----------------------------------------Product----------------------------------- */

        case 'addsp':
            if (isset($_POST['add']) && ($_POST['add'])) {
                $category_id = $_POST['category_id'];
                $title = $_POST['title'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $thumbnail = $_FILES['thumbnail']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);

                // Check if required fields are empty
                if (empty($category_id) || empty($title) || empty($price) || empty($description) || empty($thumbnail)) {
                    $thongbao = "Vui lòng nhập đầy đủ thông tin sản phẩm.";
                } else {
                    // Kiểm tra xem file có phải là hình ảnh không
                    $image_info = getimagesize($_FILES["thumbnail"]["tmp_name"]);
                    if ($image_info === FALSE) {
                        $thongbao = "File không phải là hình ảnh. Vui lòng chọn một file hình ảnh.";
                    } else {
                        // Tiếp tục quá trình upload và thêm vào cơ sở dữ liệu
                        if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                            insert_product($title, $price, $thumbnail, $description, $category_id);
                            $thongbao = "Thêm thành công.";
                        } else {
                            $thongbao = "Xin lỗi, có lỗi khi tải file của bạn lên.";
                        }
                    }
                }
            }
            $listcategory = loalall();
            include "product/add.php";
            break;

        case 'listsp':

            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $category_id = $_POST['category_id'];
            } else {
                $kyw = '';
                $category_id = 0;
            }
            $listcategory = loalall();
            $listproduct = loalallsp($kyw, $category_id);
            include "product/list.php";
            break;
        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_product($_GET['id']);
            }
            $listproduct = loalallsp("", 0);
            include "product/list.php";
            break;
        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $product = loadonesp($_GET['id']);
            }
            $listcategory = loalall();
            include "product/update.php";
            break;
        case 'updatesp':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $product_id = $_POST['product_id'];
                $category_id = $_POST['category_id'];
                $title = $_POST['title'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $thumbnail = $_FILES['thumbnail']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
                if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                    // $thongbao = "Thêm thành công.";
                } else {
                    // $thongbao = "Xin lỗi, có lỗi khi tải file của bạn lên.";
                }
                update_product($title, $price, $thumbnail, $description, $category_id, $product_id);
                $thongbao = "UPDATE THANH CONG";
            }
            $listcategory = loalall();
            $listproduct = loalallsp("", 0);
            include "product/list.php";
            break;
            /**----------------------------------------------------SIZE HAO ----------------------------------------------- */
        case 'addsize':
            if (isset($_POST['add']) && ($_POST['add'])) {
                $size_name = $_POST['size_name'];

                insert_size($size_name);
                $thongbao = "Thêm thành công";
            }
            include "size/add.php";
            break;

        case 'listsize':
            $listsize = loadall_size();
            include "size/list.php";
            break;
        case 'xoasize':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_size($_GET['id']);
            }
            $listsize = loadall_size();
            include "size/list.php";
            break;
        case 'suasize':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $size = loadone_size($_GET['id']);
            }
            include "size/update.php";
            break;
        case 'update':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $size_name = $_POST['size_name'];
                $id = $_POST['id'];
                update_size($id, $size_name);
                $thongbao = "UPDATE THANH CONG";
            }
            $listsize = loadall_size();
            include "size/list.php";
            break;
            /**----------------------------------------------------COLOR THAO----------------------------------------------- */
        case 'addcolor':
            if (isset($_POST['add']) && ($_POST['add'])) {
                $color_name = $_POST['color_name'];

                insert_color($color_name);
                $thongbao = "Thêm thành công";
            }
            include "color/add.php";
            break;

        case 'listcolor':
            $listcolor = loadall_color();
            include "color/list.php";
            break;
        case 'xoacolor':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_color($_GET['id']);
            }
            $listcolor = loadall_color();
            include "color/list.php";
            break;
        case 'suacolor':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $color = loadone_color($_GET['id']);
            }
            include "color/update.php";
            break;
        case 'update':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $color_name = $_POST['color_name'];
                $id = $_POST['id'];
                update_color($id, $color_name);
                $thongbao = "UPDATE THANH CONG";
            }
            $listcolor = loadall_color();
            include "color/list.php";
            break;
            // --------------------------------------------------User Huy-----------------------------------------------------
        case 'dskh':
            include "user/list.php";
            break;
        case 'addus':
            include "user/add.php";
            break;
        case 'delus':
            include "user/delete.php";
            break;
        case 'updateuser':
            include "user/update.php";
            break;
            /**----------------------------------------------------END------------------------------------------------------- */
        case 'dsctsp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $SAMPHAM =  loadonesp($_GET['id']);
                $lisctsp = loadall_ctsp($_GET['id']);
            }
            include "product/listctsp.php";
            break;

            case 'addctsp':
                if (isset($_POST['add']) && ($_POST['add'])) {
                    $size_id = $_POST['size_id'];
                    $color_id = $_POST['color_id'];
                    $stock_quantity = $_POST['stock_quantity'];
                    insert_ctsp($size_id, $color_id, $stock_quantity);
                    $thongbao = "Thêm thành công.";
                            }
                include "product/addctsp.php";        
                break;
            
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";
