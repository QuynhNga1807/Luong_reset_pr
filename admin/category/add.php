<?php
if (isset($_POST['submit'])) {
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$name = str_replace('"','\\"', $name);
	}
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}
	// die();
	if (!empty($name)) {
		//Luu vao database
		$sql = 'INSERT INTO category (name) values ("'.$name.'")';
		execute($sql);
		header('Location:index.php?page_layout=category');
		die();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa Danh Mục Sản Phẩm</title>
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
	<style>
      body {
        background-color: lavender;
      }
  </style>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm Danh mục</h2>
			</div>
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
					  <label for="name">Tên danh mục:</label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">
					  <input required="true" type="text" class="form-control" name="name" value="">
					</div>
					<input type="submit" class="btn btn-success" value="Lưu" name="submit">
				</form>
			</div>
		</div>
	</div>
</body>
</html>