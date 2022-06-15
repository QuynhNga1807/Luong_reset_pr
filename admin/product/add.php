<?php
if (isset($_POST['sbm'])) {
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$name = str_replace('"','\\"', $name);
	}
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}
    if (isset($_FILES['Thumbnail'])) {
		// Nếu file upload không bị lỗi,
            // Tức là thuộc tính error > 0
            if ($_FILES['Thumbnail']['error'] > 0)
            {
                echo 'File Upload Bị Lỗi';
            }
            else{
                // Upload file
				$tmp_name = $_FILES['Thumbnail']['tmp_name'];
				$target = 'images/'.$_FILES['Thumbnail']['name'];
                move_uploaded_file($tmp_name,$target);
                $Thumbnail = $_FILES['Thumbnail']['name'];
            }

	}
    if (isset($_POST['content'])) {
		$details = $_POST['content'];
		$details = str_replace('"','\\"', $content);
	}
    if (isset($_POST['price'])) {
		$price = $_POST['price'];
	}
    if (isset($_POST['status'])) {
		$status = $_POST['status'];
	}
    if (isset($_POST['cat_id'])) {
		$cat_id = $_POST['cat_id'];
	}

	// die();
	if (!empty($name)) {
		//Luu vao database
		$sql = 'INSERT INTO products (name, content, Thumbnail, price, status, cat_id ) values ("'.$name.'", "'.$content.'", "'.$Thumbnail.'","'.$price.'", "'.$status.'", "'.$cat_id.'")';
		execute($sql);
		header('Location: index.php?page_layout=product');
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
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm Sản Phẩm</h2>
			</div>
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
					  <label for="name">Tên Sản Phẩm:</label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">
					  <input required="true" type="text" class="form-control" name="name" value="">
					</div>
                    <div class="form-group">
					  <label for="status">SL:</label>
					  <input required="true" type="number" class="form-control"name="status" value="">
					</div>
                    <div class="form-group">
					  <label for="price">Giá bán:</label>
					  <input required="true" type="number" class="form-control"  name="price" value="">
					</div>
                    <div class="form-group">
					  <label for="cat_id">Danh mục:</label>
					  <select class="form-control" name="cat_id" >
                          <option>--Lựa chọn danh mục--</option>
                          <?php 
                            //Lay danh sach danh muc tu database
                            $sql          = 'select * from category';
                            $categoryList = executeResult($sql);
                            foreach ($categoryList as $item) {
                                 if ($item['id'] == $cat_id){
                                    echo '<option selected value ="'.$item['id'].'"> '.$item['name'].'</option>';
                                }else{
                                    echo '<option value ="'.$item['id'].'"> '.$item['name'].'</option>';
                            }
						}
                            ?>
                          </select>
					</div>
					<div class="form-group">
							<label for="Thumbnail">Hình ảnh:</label>
							<input required="true" type="file" class="form-control" name="Thumbnail" value="" onchange="preview()">
							<br><img src="images/no-image.jpg" id="thumbnail_img"  style="max-width:200px">
					</div>
                    <div class="form-group">
							<label for="content">Nội dung:</label>
							<textarea class="form-control" row="5" name="content" ></textarea>
					</div>
					<input type="submit" class="btn btn-success" value="Lưu" name="sbm">
				</form>
			</div>
		</div>
	</div>
	<script>
		function preview() {
			thumbnail_img.src=URL.createObjectURL(event.target.files[0]);
		}
	</script>
</body>
</html>