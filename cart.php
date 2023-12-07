 <?php

if (!isset($_SESSION)) session_start();
$cart = $_SESSION['cart']??[];
$product_id=$_POST['product_id'];
$color_id=$_POST['color_id'];
$size_id=$_POST['size_id'];
include './model/pdo.php';
include './model/product.php';

$info = getVariant($product_id, $color_id, $size_id);
print_r($info);
if (isset($cart[$info['variant_id']]))
{
    $cart[$info['variant_id']]['qty']++;
}
else 
{
    //moi

    $row = [
                'product_id'=> $info['product_id'], 
                'product_name'=>$info['title'],
                'price'=>$info['price'],
                'color_id'=>$info['color_id'],
                'size_id'=>$info['size_id'],
                'qty'=>1
   
];
$cart[$info['variant_id']] = $row;
}

$_SESSION['cart']=$cart;