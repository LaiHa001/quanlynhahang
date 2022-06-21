<?php 
    require_once 'config/db.php';
    session_start();
    $err=[];
    if(isset($_POST['login'])){
        $tk = $_POST['taikhoan'];
        $mk = $_POST['matkhau'];

        $sql_brand = "SELECT * FROM taikhoan where taikhoan='$tk' and matkhau='$mk'";
        $qr_brand = mysqli_query($connect, $sql_brand);
        $data = mysqli_fetch_assoc($qr_brand);
        $checktk = mysqli_num_rows($qr_brand);
        if(mysqli_num_rows($qr_brand) > 0){
            $_SESSION['member'] = $data['taikhoan'];
            $_SESSION['loai'] = $data['loai'];
            
            header('location: index.php');
        }
        else if(empty($tk)){
            $err['taikhoan'] = 'Bạn chưa nhập tài khoản';
        }
        else if(empty($mk)){
            $err['matkhau'] = 'Bạn chưa nhập mật khẩu';
        }
        else{
            $err['matkhau'] = 'Tài khoản hoặc mật khẩu sai';
        }
        // var_dump($err);
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Đăng nhập</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h2>ĐĂNG NHẬP</h2>
            <input type="text" id="username" name="taikhoan" placeholder="Nhập tên tài khoản">
            <span class="username_error"><?php echo (isset($err['taikhoan']))?$err['taikhoan']:'' ?></span>
            <input type="password" id="password" name="matkhau" placeholder="Nhập mật khẩu">
            <span class="password_error"><?php echo (isset($err['matkhau']))?$err['matkhau']:'' ?></span>
            <button class="submit" name="login">LOGIN</button>
        </form>
    </div>
</body>
</html>