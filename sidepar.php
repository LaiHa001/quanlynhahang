<?php  
    session_start();
    if (empty($_SESSION['member'])){
        header('location: login.php');
    }
    $loai = $_SESSION['loai'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sidepar.css">
    <title>Home</title>
</head>
<body>
    <div class="continer"> 
        <div class="sidebar">
            <div class="header">
                <i class="bx bx-heart" id="active"></i>
            </div>
            <ul>
                <a href="index.php" style="text-decoration: none;">
                    <li>
                        <i class="bx bxs-home-heart"></i>
                        <span>Trang chủ</span>
                    </li>
                </a>
                <a href="QLmon.php" style="text-decoration: none;">
                    <li>
                        <i class="bx bxs-bowl-hot"></i>
                        <span>Món ăn</span>
                    </li>
                </a>
                <?php if ($loai == "quản lý"){ ?>
                    <a href="QLnhanvien.php" style="text-decoration: none;">
                        <li>
                            <i class="bx bxs-user-detail"></i>
                            <span>Nhân viên</span>
                        </li>
                    </a>               
                <a href="QLhoadon.php" style="text-decoration: none;">
                    <li>
                        <i class="bx bxs-receipt"></i>
                        <span>Hóa đơn</span>
                    </li>
                </a>
                <a href="QLphieunhap.php" style="text-decoration: none;">
                    <li>
                        <i class="bx bxs-notepad"></i>
                        <span>Phiếu nhập</span>
                    </li>
                </a>               
                <a href="QLmathang.php" style="text-decoration: none;">
                    <li>
                        <i class="bx bxs-category"></i>
                        <span>Mặt hàng</span>
                    </li>
                </a>
                <a href="QLncc.php" style="text-decoration: none;">
                    <li>
                        <i class="bx bxs-coin-stack"></i>
                        <span>Nhà cung cấp</span>
                    </li>
                </a>               
                <a href="QLtaikhoan.php" style="text-decoration: none;">
                    <li>
                        <i class="bx bxs-user-circle"></i>
                        <span>Tài khoản</span>
                    </li>
                </a>
                <?php } ?>               
                <a href="loguot.php" style="text-decoration: none;">
                    <li>
                        <i class="bx bxs-log-out"></i>
                        <span>Đăng xuất</span>
                    </li>
                </a>
            </ul>
        </div>
    </div>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="js/sidepar.js"></script>
</body>
</html>