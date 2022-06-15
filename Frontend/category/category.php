
<?php 
    if(isset($_GET['cat_id'])){
        $cat_id = $_GET['cat_id'];
        //Lấy thông tin danh mục
        $sqlCate = "SELECT * FROM category WHERE id = $cat_id";
        $resultCate  = mysqli_query($conn, $sqlCate);
        $cate = mysqli_fetch_assoc($resultCate);
        //Lấy thông tin sản phẩm theo danh mục
        $sqlByCatId = "SELECT * FROM products WHERE cat_id= $cat_id";
        $resultByCatId = mysqli_query($conn, $sqlByCatId);
        $count = mysqli_num_rows($resultByCatId);
    }else{
        header("location: index.php");
    }

?>
<!--	List Product	-->
<div class="products">
    <div class="row">
            <h3><?php echo $cate['name']; ?>(<?php echo $count; ?> sản phẩm)</h3>
            <div class="product-list row">
                <?php 
                    if($count > 0) {
                        while ($prd = mysqli_fetch_assoc($resultByCatId)) {
                ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                        <div class="product-item card text-center">
                            <a href="index.php?page_layout=product&prd_id=<?php echo $prd['id']; ?>"><img src="admin/images/<?php echo $prd['Thumbnail']; ?>"></a>
                            <h4><a href="index.php?page_layout=product&prd_id=<?php echo $prd['id']; ?>"><?php echo $prd['name']; ?></a></h4>
                            <p>Giá Bán: <span><?php echo number_format($prd['price'],0,",","."); ?>đ</span></p>
                        </div>
                    </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        
    </div>
</div>
