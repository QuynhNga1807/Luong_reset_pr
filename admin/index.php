<?php
require_once ('../db/dbhelper.php');
require_once ('../db/utility.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>
      body {
        background-color: lavender;
      }
  </style>
  </head>
<body>
<?php
     require "header.php"?>
<div class="body">
<div class="container">
<?php 
 if(isset($_GET['page_layout'])) {
     switch ($_GET['page_layout']) {
         case 'category':
             include_once "category/category.php";
             break;
          case 'addcategory':
              include_once "category/add.php";
              break;
           case 'editcategory':
              include_once "category/edit.php";
                break;
           case 'deletecategory':
               include_once "category/delete.php";
                break;
          case 'product':
                include_once "product/product.php";
              break;
              case 'addproduct':
                include_once "product/add.php";
            break;
            case 'editproduct':
              include_once "product/edit.php";
            break;
            case 'deleteproduct':
              include_once "product/delete.php";
            break;
              case 'orders':
                  include_once "orders/orders.php";
              break;
              case 'editorders':
                include_once "orders/edit.php";
            break;
     }
 }else{
  echo'<center><h1>Chào mừng đến với trang Admin!!!</h1><center>';
} 
?>
        </div>
    </div>
</body>
</html>