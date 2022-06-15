<?php
	$productList1 = executeResult('SELECT * FROM products WHERE cat_id = 1 LIMIT 6');
        $productList2 = executeResult('SELECT * FROM products WHERE cat_id = 2 LIMIT 6');
?>
<!-- body -->
<div class="products" style="color:black">
        <center><h2>Sản phẩm nổi bật<h2></center><br>
	<div class="row">
		<?php
			foreach ($productList1 as $item) {
				echo '<div class="col-md-3 col-6">
						<a href="index.php?page_layout=product&prd_id='.$item['id'].'"><img src="admin/images/'.$item['Thumbnail'].'" style="width: 100%"></a>
						<a href="index.php?page_layout=product&prd_id='.$item['id'].'"><p>'.$item['name'].'</p></a>
						<p style="color: red">'.number_format($item['price'], 0, ',', '.').'đ</p>
					</div>';
			}
		?>
	</div>
</div>
<div class="products" style="color:black">
        <center><h2>Sản phẩm mới<h2></center><br>
		<div class="row">
		<?php
			foreach ($productList2 as $item) {
				echo '<div class="col-md-3 col-6">
						<a href="index.php?page_layout=product&prd_id='.$item['id'].'"><img src="admin/images/'.$item['Thumbnail'].'" style="width: 100%"></a>
						<a href="index.php?page_layout=product&prd_id='.$item['id'].'"><p>'.$item['name'].'</p></a>
						<p style="color: red">'.number_format($item['price'], 0, ',', '.').'đ</p>
					</div>';
			}
		?>
</div>
</div>

