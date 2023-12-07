<?php 
function insert_tk($name, $email, $phone,$address,$pass) {
  $sql = "INSERT INTO user (fullname,email,phone_number,address,password_hash) VALUES ('$name', '$email','$phone','$address', '$pass')";
  pdo_execute($sql);
}


function checkuser($user,$pass) {
  $sql = "SELECT * FROM user WHERE fullname = '".$user."' AND password_hash =  '".$pass."' ";
  $conn = pdo_get_connection();
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result= $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $kq = $stmt->fetchAll();
  return $kq[0]['role_id'];
}
?>