<?php 
        $prd_id = $_GET['prd_id'];
        $sql = "SELECT * FROM products WHERE id= ".$prd_id;
        $result = mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($result);
        if($product == null) {
            header('Location: ../../index.php');
            die();
        }
?>
<style>
	.product_img img{
		display: flex;
		justify-content: center;
		object-fit: contain;
		width: 100%;}
</style>
<!--	List Product	-->
<div class="product" style="color:black">
<h1><?php echo $product['name']; ?></h1><hr>
<div id="product-head" class="row">
        <div class="col-sm-8 product_img">
            <img src="admin/images/<?php echo $product['Thumbnail']; ?>" width="200px" height="300px"><br>
			<div class="d-flex details" style="padding:9px;border:2px solid #444b521f;background-color:#444b521f">
            <?php echo $product['content']; ?>
        </div>
        </div>
        <div class="col-sm-4 product-details" >
		<h3><?php echo number_format($product['price'],0,",","."); ?>đ</h3>
            <ul class="flex-column mb-3 content" style="list-style:none">
                <li><span>Bảo hành: 12 tháng</li>
                <li><span>Đi kèm: hộp, sạc, cáp</li>
                <li><span>Tình trạng: Sản phẩm mới</li>
                <li id="status">
                    <?php
                        if($product['status'] >= 1) {
                            echo '<span style="color: green;">Còn hàng</span>';
                        }else{
                            echo '<span style="color: red;">Hết hàng</span>';
                        }
                    ?>
                </li>
            </ul>
				<button class="btn btn-danger" style="width: 100%;" onclick="addToCart(<?=$prd_id?>)"> Mua ngay</button></a>
		</div>
    </div>   

    <!--	Comment	-->
    <?php 
        // Thêm bình luận vào cơ sở dữ liệu:

        // Thiết lập múi giờ Việt Nam (timezone): date_default_timezone_set("Asia/Ho_Chi_Minh");
        
        // Hàm lấy thời gian là hàm:
        // time() : timestamp => chuyển sang dạng thời gian của MySQL bằng hàm date().

        // Định dạng giờ trong MySQL:  Y-m-d H:i:s

    ?>
    <div id="comment" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
		<br><br><h3>Bình luận sản phẩm</h3>
            <form method="post" action ='Frontend/product/get_cmt.php?id_sanpham=<?php echo $product['id'] ?>'>
                <div class="form-group">
                    <label>Tên:</label>
                    <input name="comm_name" required type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input name="comm_mail" required type="email" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <label>Nội dung:</label>
                    <textarea name="comm_details" required rows="8" class="form-control"></textarea>
                </div>
                <button type="submit" name="sbm" class="btn btn-primary">Gửi</button>
            </form>
        </div>
    </div>
    <!--	End Comment	-->

    <!--	Comments List	-->
    <?php 
    
        if(isset($_GET['prd_id'])) {
            $prd_id = $_GET['prd_id'];
            $sqlComment = "SELECT * FROM comment WHERE prd_id=$prd_id";
            $resultComment = mysqli_query($conn, $sqlComment);
        }
    ?>
    <div id="comments-list" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?php
                if(mysqli_num_rows($resultComment) > 0) {
                    while ($productComment = mysqli_fetch_assoc($resultComment)) {
            ?>
                <div class="comment-item">
                    <ul>
                        <li><b> người dùng : <?php echo $productComment['name']; ?></b></li>
                        <li> timecomment: <?php echo date("d-m-Y H:i:s",strtotime($productComment['comm_date'])); ?></li>
                        <li>
                            <p>nội dung comment: <?php echo $productComment['comm_details']; ?></p>
                        </li>
                    </ul>
                </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <!--	End Comments List	-->
</div>
<script type="text/javascript">
	function addToCart(prd_id) {
		$.post('Frontend/api/cookie.php', {
			'action': 'add',
			'id': prd_id,
			'num': 1
		}, function(data) {
			location.href = 'index.php?page_layout=cart';
		})
       
	}
</script>