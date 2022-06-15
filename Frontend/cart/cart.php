
<?php
	$cart = [];
	if(isset($_COOKIE['cart'])) {
		$json = $_COOKIE['cart'];
		$cart = json_decode($json, true);
	}
	$idList = [];
	foreach ($cart as $item) {
		$idList[] = $item['id'];
	}
	if(count($idList) > 0) {
		$idList = implode(',', $idList);
		//[2, 5, 6] => 2,5,6

		$sql = "SELECT * FROM products WHERE id in ($idList)";
		$cartList = executeResult($sql);
	} else {
		$cartList = [];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>cart</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<style>
table, th {  
    border: 1px solid gray;
    border-collapse: collapse;
	
}
th{  
    padding: 40px;  
} 
p{  
    display: flex;
	justify-content:end;
} 
.btn2{
	width: 100%;
	font-size: 32px;
	background-color: green;
	color: white;
}
.btn2:hover{
	opacity: .8;
}
.btn1{
	width: 100%;
	font-size: 22px;
	background-color: orange;
	color: black;
}
.btn-2{
	padding: 0 10px;
}
</style>
</head>
<body>
<div class="container" style="margin-top:30px;color:black;">
	<div class="row">
		<div class="col-md-12">
			<table>
				<thead>
					<tr>
						<th>STT</th>
						<th>Hình ảnh</th>
						<th>Sản phẩm</th>
						<th>SL</th>
						<th>Gía</th>
						<th>Thành tiền</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
<?php
	$count = 0;
	$total = 0;
	foreach ($cartList as $item) {
		$num = 0;
		foreach ($cart as $value) {
			if($value['id'] == $item['id']) {
				$num = $value['num'];
				break;
			}
		}
		$total += $num*$item['price'];
		echo '
			<tr>
				<th>'.(++$count).'</th>
				<th> <img src="admin/images/'.$item['Thumbnail'].'" style="max-width:150px"></th>
				<th>'.$item['name'].'</th>
				<th><button class="btn-2" onclick="addCart('.$item['id'].')">+</button>'.$num.'<button class="btn-2" onclick="moveCart('.$item['id'].')">-</button></th>
				<th>'.number_format($item['price'], 0, ',', '.').'</th>
				<th>'.number_format($num*$item['price'], 0, ',', '.').'</th>
				<th><button class="btn1" onclick="deleteCart('.$item['id'].')">Delete</button></th>
			</tr>';
	}
?>
				</tbody>
			</table>
			<p style="font-size: 30px; color: red;">
				Tổng : <?=number_format($total, 0, ',', '.')?>
			</p>
			<?php 
                        if(!isset($_SESSION['username'])):
                    ?>
                        <a style="color:white;text-decoration:none" href = "Frontend/form/dangnhap.php" class="Login"> 
                        <button class="btn2">Đăng nhập để mua hàng</button>
                        </a>
                    <?php else: ?>  
                    <section >
                    <a style="color:white;text-decoration:none" href = "index.php?page_layout=checkout">
					<button class="btn2">Đặt hàng</button>
                    </a> &emsp;
                     </section>
                    <?php endif; ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	function deleteCart(id) {
		$.post('Frontend/api/cookie.php', {
			'action': 'delete',
			'id': id
			
		}, function(data) {
			location.reload()
		})
	}
	function addCart(id) {
		$.post('Frontend/api/cookie.php', {
			'action': 'add',
			'id': id,
			'num': 1
		}, function(data) {
			location.reload()
		})
	}
	function moveCart(id) {
		$.post('Frontend/api/cookie.php', {
			'action': 'move',
			'id': id,
			'num': 1
		}, function(data) {
			location.reload()
		})
	}
</script>
</body>
</html>