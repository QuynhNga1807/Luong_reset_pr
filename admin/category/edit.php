<?php
if (isset($_GET['id'])) {
	$id       = $_GET['id'];
	$sql      = 'SELECT * FROM category WHERE id = '.$id;
	$product  = executeSingleResult($sql);
	if ($product != null) {
		$name = $product ['name'];
	}
}
if (isset($_POST['sbm'])) {
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$name = str_replace('"','\\"', $name);
	}

	if (!empty($name)) {
		$sql = 'update category  set name = "'.$name.'" where id = '.$id;
		execute($sql);
		header('Location:index.php?page_layout=category');
		die();
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa Danh Mục Sản Phẩm</title>
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
			<div class="panel-heading">
				<h2 class="text-center">Sửa Danh Mục</h2>
			</div>
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
					  <label for="name">Danh mục:</label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">
					  <input required="true" type="text" class="form-control" name="name" value="<?=$name?>">
					</div>
					<input type="submit" class="btn btn-success" value="Lưu lại" name="sbm">
				</form>
			</div>
		</div>
	</div>
</body>
</html>