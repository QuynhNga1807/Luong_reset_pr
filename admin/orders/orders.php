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
					<table  class="table table-bordered table-hover">
                        <tr>
                            <th>Mã Đơn hàng</th>
                            <th>Khách hàng</th>
                            <th>Ngày đặt</th>
                            <th>Nơi giao</th>
                            <th>Trạng thái </th>
						
                        </tr>
                    <tbody>
					  <?php 
					  $sql= 'SELECT products.name, products.Thumbnail, order_details.price, order_details.num, order_details.order_id, orders.order_id, orders.order_date,
					  				orders.address, orders.status, orders.fullname,orders.phone_number
					  			 FROM order_details
					  			JOIN products ON products.id = order_details.product_id 
								JOIN orders ON orders.order_id = order_details.order_id
								GROUP BY products.name, products.Thumbnail, order_details.price, order_details.num, order_details.order_id, orders.order_id, orders.order_date,
					  				orders.address, orders.status, orders.fullname,orders.phone_number';
						$result = executeResult($sql);
						foreach ($result as $item) {
					  ?>
						
                            <tr>
                                <td><?= $item['order_id'] ?></td>
                                <td><b><?= $item['fullname'] ?></b><br />(<?= $item['phone_number'] ?>)</td>
                                <td><?= $item['order_date'] ?></td>
                                <td><?= $item['address'] ?></td>
                                <td>
                                    <?php if ($item['status'] == 0) : ?>
                                        <span class="badge badge-danger">Chưa xử lý</span>
										&nbsp;&nbsp; <a href="index.php?page_layout=editorders&id=<?= $item['order_id'] ?>" class="btn btn-warning">
                                         Sửa
                                        </a>
                                    <?php else : ?>
                                    <?php endif;?>
									<?php if ($item['status'] == 2) : ?>
										<span class="badge badge-success">Đã giao hàng</span>
										<?php else : ?>
                                    <?php endif;?>
									<?php if ($item['status'] == 1) : ?>
										<span class="badge badge-success">Đang giao hàng</span>
                                    <?php else : ?>
                                    <?php endif;?>
                                </td>
								
                            </tr>
							<?php }?>
                    </tbody>
                </table>
							    <!-- End block content -->
								</main>
        </div>
    </div>		
	</div>

</body>
</html>

