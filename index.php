<?php
require_once ('db/dbhelper.php');
require_once ('db/utility.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
 <header>      
      <?php
        require "Frontend/header/header.php"?>
</header>
<div class="body">
<div class="container" style="margin-top:10px">
    <?php include_once "Frontend/slide.php";  ?><br><br>
      <?php 
 
                    if(isset($_GET['page_layout'])) {
                        switch ($_GET['page_layout']) {
                            case 'category':
                                include_once "Frontend/category/category.php";
                                break;
                            case 'product':
                                  include_once "Frontend/product/product.php";
                                    break;
                            case 'search':
                                include_once "Frontend/search/search.php";
                                break;
                            case 'cart':
                                include_once "Frontend/cart/cart.php";
                                break;
                             case 'checkout':
                                 include_once "Frontend/cart/checkout.php";
                                  break;
                        }
                    }else{
                        include_once "Frontend/product/productindex.php";
                    } 
                ?>
        </div>
    </div>
<br><br>
<footer>      
      <?php
        require "Frontend/footer/footer.php"?>
</footer>
</div>
</body>
</html>