<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Danh Mục</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style>
      body {
        background-color: lavender;
      }
  </style>
</head>
<body>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản Lý Sản Phẩm</h2>
			</div>
			<div class="panel-body">
				<a href="index.php?page_layout=addproduct">
					<button class="btn btn-success" style="margin-bottom: 15px;">Thêm Sản Phẩm</button>
				</a>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">STT</th>
                            <th>Hình ảnh sản phẩm</th>
							<th>Tên sản phẩm</th>
                            <th>SL</th>
                            <th>Giá bán</th>
							<th width="20px"></th>
							<th width="20px"></th>
						</tr>
					</thead>
					<tbody>
<?php
//Lay danh sach danh muc tu database
$sql = 'select * from products';
$productList = executeResult($sql);

$index = 1;
foreach ($productList as $item) {
	echo '<tr>
				<td>'.($index++).'</td>
				<td> <img src="images/'.$item['Thumbnail'].'" style="max-width:100px"></td>
                <td>'.$item['name'].'</td>
                <td>'.$item['status'].'</td>
                <td>'.$item['price'].'</td>
				<td>
					<a href="index.php?page_layout=editproduct&id='.$item['id'].'"><button class="btn btn-warning">Sửa</button></a>
				</td>
				<td>
					<button class="btn btn-danger" onclick="deleteproduct('.$item['id'].')">Xoá</button>
				</td>
			</tr>';
}
?>
					</tbody>
				</table>
			</div>
		</div>

	<script type="text/javascript">
		function deleteproduct(id) {
			var option = confirm('Bạn có chắc chắn muốn xoá danh mục này không?')
			if(!option) {
				return;
			}
			console.log(id)
			$.post('index.php?page_layout=deleteproduct', {
				'id': id,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>
</body>
</html>