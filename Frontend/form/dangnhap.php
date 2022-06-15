<?php 
session_start();
require_once ('../../admin/connection/db_conn.php');
if (isset($_POST['login'])) {
    if(isset($_POST['username'])) {
        $username = $_POST['username'];
    }
    if(isset($_POST['password'])) {
        $password = $_POST['password'];
    }
		if (empty($username) || empty($password)) {
			echo "username hoặc password bạn không được để trống!";
		}else{
			$sql = "SELECT * FROM member where username = '$username' and password = '$password' ";
			$query = mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
				echo "tên đăng nhập hoặc mật khẩu không đúng !";
			}else{
				//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
				$_SESSION['username'] = $username;
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                header('Location: ../../index.php');
			}
		}
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đăng nhập</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/form.css">
    <body>
    <form method="post" style="width:300px">
      <div class="d-flex flex-column mb-3 container" style="margin-top: 80px;border-radius: 10px;">
            <center><h2>Đăng nhập</h2></center>
            <label for="uname"><b>Tên đăng nhập :</b></label>
            <input type="text" placeholder="Enter Username" name='username' required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name='password' required>
            <button class="btn btn-success" type="submit" name="login">Đăng nhập</button>
            <a href='dangky.php' >Bạn chưa có tài khoản?</a>
            </div>
        </form>
    </body>
</html>