
<?php
    $sql = "SELECT SUM(gia) FROM hoadon";
    $qr = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($qr);
    if(isset($_POST["thongke"])){
        $s = $_POST["thang"];
        if($s == ""){
            $sql = "SELECT SUM(gia) FROM hoadon";
            $qr = mysqli_query($connect, $sql);
            $row = mysqli_fetch_assoc($qr);

        }else{
            $sql = "SELECT SUM(gia) FROM hoadon where thang LIKE '$s'";
            $qr = mysqli_query($connect, $sql);
            $row = mysqli_fetch_assoc($qr);
        }
    }

    $sql_up = "SELECT SUM(gia) FROM phieunhap";
    $qr_up = mysqli_query($connect, $sql_up);
    $row_up = mysqli_fetch_assoc($qr_up);
    if(isset($_POST["thongke"])){
        $s = $_POST["thang"];
        if($s == ""){
            $sql_up = "SELECT SUM(gia) FROM phieunhap";
            $qr_up = mysqli_query($connect, $sql_up);
            $row_up = mysqli_fetch_assoc($qr_up);

        }else{
            $sql_up = "SELECT SUM(gia) FROM phieunhap where thang LIKE '$s'";
            $qr_up = mysqli_query($connect, $sql_up);
            $row_up = mysqli_fetch_assoc($qr_up);
        }
    }
?>


<div class="row">
    <div class="content">
        <h1>Thống kê</h1>         
        <div class="panel-body">
            <div class="toolbar">
                <form action="" method="POST">
                <input type="month" name="thang">
                <input type="submit" name="thongke" value="Thống kê">

                </form>
                <?php
                if(!empty($_POST['thang'])){
                ?>
                    <div>Tháng:<?php echo $_POST['thang'] ?></div>
                <?php } 
                $lo=0;
                $lo=$row['SUM(gia)'] - $row_up['SUM(gia)']
                ;?>
                    <div>Tổng doanh thu: <?php echo $row['SUM(gia)'] ?></div>
                    <div>Tổng chi tiêu: <?php echo $row_up['SUM(gia)'] ?></div>
                    <div>Lợi nhuận: <?php echo $lo ?></div>                                     
            </div>        
        </div>         
    </div>
</div>