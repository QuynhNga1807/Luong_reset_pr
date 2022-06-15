<?php 
$serverName = 'localhost';
$userName = 'root';
$password = '';
$database = 'webcongnghe';
$conn = mysqli_connect($serverName, $userName, $password, $database);
if(!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}else{
    mysqli_set_charset($conn, "utf8");
}
?>

<?php 
    $sqlMenu = 'select * from category';
    $result = mysqli_query($conn, $sqlMenu);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Header</title>
<link rel="stylesheet" href="../../css/header.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid px-0">
    <nav class="navbar navbar-expand-sm navbar-dark bg-black py-0 px-0">
        <a class="navbar-brand" href="index.php"><img id="logo" src="https://i.imgur.com/K7Nwq4V.jpg">Reddit</a>
        <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php if(mysqli_num_rows($result) > 0)  {
                        while($cate = mysqli_fetch_assoc($result)) {
                ?>
                <li class="ml-2 menu-item">
                    <a href="index.php?page_layout=category&cat_id=<?php echo $cate['id']; ?>"><?php echo $cate['name']; ?></a>
                </li>
            <?php 
                }
            } 
            ?>   
            </ul>
        </div>
        <div class="justify-content-end collapse navbar-collapse" id="navbarSupportedContent">
            <div class="md-form my-0">
                <ul class="navbar-nav">
                <li  class=" menu-item">
                    <form class="form-inline" action="index.php" method="GET" >
                            <input type="hidden" name="page_layout" value="search">
                            <input class="form-control " type="search" name="keyword" placeholder="Tìm kiếm" aria-label="Search" style="height: 32px;">
                            <button class="btn btn-danger " type="submit" style="height: 32px;">Tìm kiếm</button>
                    </form>
                </li>
                <li  class="d-flex align-items-center ml-3 cart-item">
                <?php
                        $cart = [];
                        if(isset($_COOKIE['cart'])) {
                            $json = $_COOKIE['cart'];
                            $cart = json_decode($json, true);
                        }
                        $count = 0;
                        foreach ($cart as $item) {
                            $count += $item['num'];
                        }
                    ?>
                           <a href="index.php?page_layout=cart">
                         <font color="white"><i class="fa fa-shopping-cart" aria-hidden="true"></i><font>
                         <span class="badge badge-light"><?=$count?></span>
                          </button>
                       </a>
                </li>
                <li class="login-item d-flex align-items-center h-100 ml-3 mr-3">
                    <?php 
                        if(!isset($_SESSION['username'])):
                    ?>
                        <a style="color:white;text-decoration:none" href = "Frontend/form/dangnhap.php" class="Login"> 
                        Đăng nhập
                        </a>
                    <?php else: ?>  
                    <section style='float:left;'>
                    <a style="color:white;background-color:#ac0617;">
                        Welcome: <?php echo $_SESSION['username'] ?>
                    </a> &emsp;
                    <a href="Frontend/form/logout.php" style="text-decoration:none;color:white;">&ensp; 
                        [Logout]</a> 
                     </section>
                    <?php endif; ?>
                </li>  
                 </ul>
            </div>
            
        </div>
    </nav>
</div>
</body>
</html>