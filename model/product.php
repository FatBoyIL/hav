<?php
function insert_product($title, $price, $thumbnail, $description, $category_id) {
    $sql = "INSERT INTO product (title, price, thumbnail, description, category_id) VALUES ('$title', '$price', '$thumbnail', '$description', '$category_id')";
    pdo_execute($sql);
}
function delete_product($product_id){
    $sql = "DELETE FROM product WHERE product_id = :product_id";
    pdo_execute($sql, [':product_id' => $product_id]);
}
function loadallsp_home() {
    $sql = "SELECT * FROM product WHERE 1";
    $sql .= " ORDER BY title ASC limit 0,9";
    $listproduct = pdo_query($sql);
    return $listproduct;
}
function loadallsp_home10() {
    $sql = "SELECT * FROM product WHERE 1";
    $sql .= " ORDER BY title ASC limit 9";
    $listproduct = pdo_query($sql);
    return $listproduct;
}

function loalallsp($kyw, $category_id=0) {
    $sql = "SELECT * FROM product WHERE 1";
    if ($kyw != "") {
        $sql .= " AND title LIKE '%" . $kyw . "%'";
    }
    if ($category_id > 0) {
        $sql .= " AND category_id= '" . $category_id . "'";
    }
    $sql .= " ORDER BY product_id DESC";
    $listproduct = pdo_query($sql);
    return $listproduct;
}


function loadonesp($product_id){
    $sql = "SELECT * FROM product WHERE product_id=" .$product_id ;
    $sp = pdo_query_one($sql);
    return $sp;
}
function loadone_ctsp($product_id){
    $sql = "SELECT * FROM productvariants WHERE product_id=" .$product_id ;
    $sp = pdo_query_one($sql);
    return $sp;
}

function loadall_ctsp($product_id){
    $sql = "SELECT pv.*, s.size_name, c.color_name
            FROM productvariants pv
            LEFT JOIN size s ON pv.size_id = s.id
            LEFT JOIN color c ON pv.color_id = c.id
            WHERE pv.product_id = " . $product_id . "
            ORDER BY c.color_name ASC, s.size_name ASC"; // Sắp xếp theo tên màu sắc tăng dần và tên size tăng dần

    $listctsp = pdo_query($sql);
    return $listctsp;
}



function loadtendm($category_id){
    $sql = "SELECT * FROM category WHERE category_id=" .$category_id ;
    $dm = pdo_query_one($sql);
    extract($dm);
    return $name;
}
function loadspcl($product_id,$category_id){
    $sql = "SELECT * FROM product WHERE category_id=".$category_id." AND product_id <>" .$product_id ;
    $listproduct = pdo_query($sql);
    return $listproduct;
}
function update_product($title, $price, $thumbnail, $description, $category_id, $product_id){
    if($thumbnail!="")
    $sql="UPDATE product SET title='".$title."',price='".$price."',thumbnail='".$thumbnail."',description='".$description."',category_id='".$category_id."' WHERE product_id=".$product_id;
    else
    $sql="UPDATE product SET title='".$title."',price='".$price."',description='".$description."',category_id='".$category_id."' WHERE product_id=".$product_id;
    pdo_execute($sql);
}
function insert_ctsp($size_id, $color_id, $stock_quantity){
    $sql = "INSERT INTO productvariants (size_id, color_id, stock_quantity) VALUES ('$size_id', '$color_id', '$stock_quantity')";
    pdo_execute($sql);
}

function getVariant($product_id, $color_id, $size_id)
{
    $sql ="SELECT price, title, productvariants.* FROM `product` join productvariants on 
    product.product_id=productvariants.product_id WHERE product.product_id='$product_id' and color_id='$color_id' and size_id='$size_id' ";
    return pdo_query_one($sql);   
}

?>