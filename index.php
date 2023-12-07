<?php
include "model/pdo.php";
include "model/product.php";
include "model/category.php";
include "model/taikhoan.php";
include "view/header.php";
include "global.php";

$spnew = loadallsp_home();
$dsdm = loadall();
$sp10 = loadallsp_home10();
session_start();
ob_start();

if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'about':
            include "view/about.php";
            break;
        case 'product':
            if (isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
                $category_id = $_GET['category_id'];
                $dssp = loalallsp("", $category_id);
                $tendm = loadtendm($category_id);
                include "view/product.php";
            } else {
                include "view/home.php";
            }
            break;

        case 'variant':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $product_id = $_GET['id'];
                $onesp = loadonesp($product_id);
                extract($onesp);
                $spcl = loadspcl($product_id, $category_id);
                $listctsp = loadall_ctsp($product_id);
            } else {
                include "view/home.php";
            }
            include "view/product_variant.php";
            break;
        case 'cart':
              include "view/cart/cart.php";
              break;
        case 'delcart':
            if(isset($_GET['act']) && $_GET['act'] == 'delcart' && isset($_GET['idcart'])) {
                $indexToRemove = $_GET['idcart'];
            
                // Kiểm tra xem $indexToRemove có hợp lệ không, sau đó xóa sản phẩm khỏi giỏ hàng
                if($indexToRemove >= 0 && $indexToRemove < count($_SESSION['cart'])) {
                    unset($_SESSION['cart'][$indexToRemove]);
                    // Cập nhật giỏ hàng sau khi xóa
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                }
                // Chuyển hướng trở lại trang giỏ hàng hoặc trang chính
                header('Location: index.php?act=cart');
                exit();
            }

        case'dangky':
         include "view/dangky.php";
          if(isset($_POST['register'])) {
           
            $name= $_POST["username"];
            $email= $_POST["email"];
            $phone= $_POST["phone"];
            $address= $_POST["address"];
            $pass= $_POST["confirm_password"];
            insert_tk($name, $email,$phone,$address,$pass);
            $thongbao = "Success";
        }
        case'dangnhap':
            if(isset($_POST['dangnhap'])) {
                $user= $_POST["user"];
                $pass= $_POST["pass"];
                $checkuser=checkuser($user,$pass);
                // $_SESSION['role']=$checkuser;
               if ($checkuser == 1) {
                header('Location: admin/index.php');
               }
               else {
                $_SESSION['user'] = 2;
                header('Location: index.php');
               }
            }
            break;
            case'edt_taikhoan':
                include "view/edt_taikhoan.php";
                   
                break;
        case 'thoat':
              session_unset();
              header('Location: index.php');
                break;
        case 'contact':
            include "view/contact.php";
            break;
        case 'feedback':
            include "view/feedback.php";
            break;
        case 'hoidap':
            include "view/hoidap.php";
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
