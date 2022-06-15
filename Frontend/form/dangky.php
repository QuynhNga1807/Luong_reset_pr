<?php
require_once ('../../db/dbhelper.php');
if (isset($_POST['resigter'])) {
if(isset($_POST['fullname'])) {
    $fullname = $_POST['fullname'];
}
if(isset($_POST['password'])) {
    $password = $_POST['password'];
}
if(isset($_POST['username'])) {
    $username = $_POST['username'];
}
if(isset($_POST['email'])) {
    $email = $_POST['email'];
}
if(isset($_POST['birthday'])) {
    $birthday = $_POST['birthday'];
}
if(isset($_POST['sex'])) {
    $sex = $_POST['sex'];
}
if(!empty($username)) {
    $sql = 'INSERT INTO member (username, password, fullname, email, birthday, sex) values ("'.$username.'", "'.$password.'", "'.$fullname.'","'.$email.'", "'.$birthday.'", "'.$sex.'")';
    execute($sql);
    header('location:dangnhap.php?username='.$username.'');
    die();
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Trang đăng ký</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/form.css">
    </head>
    <body>
        <form action="dangky.php" method="POST" style="width:600px;margin-top:5px">
        <div class="d-flex flex-column mb-3 container" style="border-radius: 10px;">
            <center><h2>Đăng ký</h2></center>
            <label ><b>Tên đăng nhập</b></label>
            <input type="text" name='username' required>
            <label ><b>Họ và tên</b></label>
            <input type="text" name="fullname" required>
            <label ><b>Email</b></label>
            <input type="email" name='email'required>
            <label ><b>Ngày sinh</b></label>
            <input type="date" name="birthday" required>
            <label ><b>Giới tính</b></label>
            <select name="sex" required>
                    <option value="Nam">Nam</option>
                     <option value="Nu">Nữ</option>
             </select>
            <label ><b>Password</b></label>
            <input type="password"  name='password' required>
            <button class="btn btn-success" type="submit" name="resigter">Đăng ký</button>
            <a href='dangnhap.php' >Bạn đã có tài khoản?</a>
            </div>
        </form>
    </body>
</html>