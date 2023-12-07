<?php 
function insert_tk($name, $email, $phone,$address,$pass) {
  $sql = "INSERT INTO user (fullname,email,phone_number,address,password_hash) VALUES ('$name', '$email','$phone','$address', '$pass')";
  pdo_execute($sql);
}


function checkuser($user,$pass) {
  $sql = "SELECT * FROM user WHERE fullname = '".$user."' AND password_hash =  '".$pass."' ";
  $sp=pdo_query_one($sql);
  return $sp;
}
?>