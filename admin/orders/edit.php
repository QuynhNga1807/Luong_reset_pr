<?php
if (isset($_GET['id'])) {
	$id       = $_GET['id'];
	$sql      = 'SELECT * FROM  orders  WHERE order_id = '.$id;
	$result  = executeSingleResult($sql);
	if ($result != null) {
		$status = $result ['status'];
	}
}
if (isset($_POST['sbm'])) {
	if (isset($_POST['status'])) {
		$status = $_POST['status'];
	}

	if (!empty($status)) {
		$sql = 'update orders set status = "'.$status.'" where order_id = '.$id;
		execute($sql);
		header('Location:index.php?page_layout=orders');
		die();
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa Đơn Hàng</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<!--summer not-->
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data">
                <div class="form-group">
					  <label for="price">Trạng thái:</label>
					  <input required="true" type="number" class="form-control"  name="status" value="<?=$status?>">
					</div>
					<input type="submit" class="btn btn-success" value="Lưu lại" name="sbm">
				</form>
			</div>
		</div>
	</div>
</body>
</html>