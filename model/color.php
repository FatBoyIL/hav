<?php
function insert_color($color_name){
    $sql = "INSERT INTO color (color_name) VALUES (:color_name)";
    pdo_execute($sql, [':color_name' => $color_name]);
}


function delete_color($id){
    $sql = "DELETE FROM color WHERE id = :id";
    pdo_execute($sql, [':id' => $id]);
}

function loadall_color(){
    $sql="SELECT * FROM color ORDER BY id DESC";
    $listcolor = pdo_query($sql);
    return $listcolor;
}
function loadone_color($id){
    $sql = "SELECT * FROM color WHERE id=" .$id ;
    $color = pdo_query_one($sql);
    return $color;
}
function update_color($id,$color_name){
    $sql="UPDATE color SET color_name='".$color_name."' WHERE id=".$id;
    pdo_execute($sql);
}
?>