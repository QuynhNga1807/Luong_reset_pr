<?php
require_once ('../admin/connection/db_conn.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Đơn hàng</title>
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
					<div class="form-group" style="margin-top:30px">
					<h2 style="text-align:center">Đơn hàng</h2>
					  <?php 
					  $sql= 'SELECT products.name, products.Thumbnail, order_details.price, order_details.num, order_details.order_id, orders.order_id, orders.order_date,
					  				orders.address, orders.status, orders.fullname,orders.phone_number
					  			 FROM order_details
					  			JOIN products ON products.id = order_details.product_id 
								JOIN orders ON orders.order_id = order_details.order_id
								GROUP BY products.name, products.Thumbnail, order_details.price, order_details.num, order_details.order_id, orders.order_id, orders.order_date,
					  				orders.address, orders.status, orders.fullname,orders.phone_number';
					  $result = mysqli_query($conn, $sql);
					  $data = [];
					  while ($row = mysqli_fetch_array($result)) {
						  $data[] = array(
							  'order_id' => $row['order_id'],
							  'order_date' => date('d/m/Y H:i:s', strtotime($row['order_date'])),
							  'address' => $row['address'],
							  'status' => $row['status'],
							  'fullname' => $row['fullname'],
							  'name' => $row['name'],
							  'phone_number' => $row['phone_number'],
						  );
					  }
					  ?>
						<table  class="table table-bordered table-hover">
                        <tr>
                            <th>Mã Đơn hàng</th>
                            <th>Khách hàng</th>
                            <th>Ngày đặt</th>
                            <th>Nơi giao</th>
                            <th>Trạng thái thanh toán</th>
                        </tr>
                    <tbody>
					<?php foreach ($data as $dondathang)
						?>
						
                            <tr>
                                <td><?= $dondathang['order_id'] ?></td>
                                <td><b><?= $dondathang['fullname'] ?></b><br />(<?= $dondathang['phone_number'] ?>)</td>
                                <td><?= $dondathang['order_date'] ?></td>
                                <td><?= $dondathang['address'] ?></td>
                                <td>
                                    <?php if ($dondathang['status'] == 0) : ?>
                                        <span class="badge badge-danger">Chưa xử lý</span>
                                    <?php else : ?>
                                        <span class="badge badge-success">Đã giao hàng</span>
                                    <?php endif;?>
                                
									 <!-- Đơn hàng nào chưa thanh toán thì được phép phép Xóa, Sửa -->
									 <?php if ($dondathang['status'] == 0) : ?>
                                        <!-- Nút sửa, bấm vào sẽ hiển thị form hiệu chỉnh thông tin dựa vào khóa chính `dh_ma` -->
										&nbsp;&nbsp; <a href="index.php?page_layout=editorders&id=<?= $dondathang['order_id'] ?>" class="btn btn-warning">
                                         Sửa
                                        </a>
                                    <?php else : ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                    </tbody>
                </table>
							    <!-- End block content -->
								</main>
        </div>
    </div>		
	</div>
	
</body>
</html>