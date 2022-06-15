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

		$sql = "select * from products where id in ($idList)";
		$cartList = executeResult($sql);
	} else {
		$cartList = [];
	}
?>
<!-- body -->
<form method="post" style="color:black;" action="Frontend/api/checkout-form.php">
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<h3>Thông tin</h3>
			<div class="form-group">
			  <label for="usr">Họ và tên:</label>
			  <input required="true" type="text" class="form-control" id="usr" name="fullname">
			</div>
			<div class="form-group">
			  <label for="phone_number">Số điện thoại:</label>
			  <input type="text" class="form-control" id="phone_number" name="phone_number">
			</div>
			<div class="form-group">
			  <label for="address">Địa chỉ:</label>
			  <input type="text" class="form-control" id="address" name="address">
			</div>
		</div>
		<div class="col-md-7">
			<h3>Giỏ hàng</h3>
			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>ID</th>
						<th>Ảnh</th>
						<th>Sản phẩm</th>
						<th>SL</th>
						<th>Giá</th>
						<th>Thành tiền</th>
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
				<td>'.(++$count).'</td>
				<td> <img src="admin/images/'.$item['Thumbnail'].'" style="max-width:100px"></td>
				<td>'.$item['name'].'</td>
				<td>'.$num.'</td>
				<td>'.number_format($item['price'], 0, ',', '.').'</td>
				<td>'.number_format($num*$item['price'], 0, ',', '.').'</td>
			</tr>';
	}
?>
				</tbody>
			</table>
			<p style="font-size: 30px; color: red">
				Total: <?=number_format($total, 0, ',', '.')?>
			</p>

			<button class="btn btn-success" style="width: 100%; font-size: 32px;">Complete</button>
		</div>
	</div>
</div>
</form>

