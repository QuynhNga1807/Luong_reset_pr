<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="admin/index.php">
  <?php 
        if(!isset($_SESSION['username'])):
    ?>
           <a style="color:white;text-decoration:none" href = "form/dangnhap.php" class="Login">Đăng nhập</a>
             <?php else: ?>  
                <section style='float:left;'>
                    <a style="color:white;">
                        <?php echo $_SESSION['username'] ?>
                    </a> &emsp;
                    <a href="form/logout.php" style="text-decoration:none;color:white;">&ensp; 
                        [Logout]</a> 
                 </section>
               <?php endif; ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php?page_layout=product">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page_layout=category">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page_layout=orders">Order</a>
      </li>
    </ul>
  </div>  
</nav>