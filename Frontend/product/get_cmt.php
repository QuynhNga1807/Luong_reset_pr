<?php

$mysqli = new mysqli("localhost","root","","webcongnghe");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$cmt = $_POST['comm_details'];
$user_name = $_POST['comm_name'];
$user_mail = $_POST['comm_mail'];
$id_sanpham = $_GET['id_sanpham'];

if(isset($_POST['sbm'])) {
  $sql = "INSERT INTO comment(name,comm_mail,comm_details,prd_id) VALUES('$user_name','$user_mail','$cmt',$id_sanpham)";
  mysqli_query($mysqli,$sql);
  
    header("Location: ../../index.php?page_layout=product&prd_id=$id_sanpham");
  
  

}
?>
