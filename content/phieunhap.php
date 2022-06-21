<?php 
    $sql = "SELECT * FROM (phieunhap INNER JOIN nhacungcap ON phieunhap.id_nhacc=nhacungcap.id_nhacc)
     ORDER BY phieunhap.id_phieunhap DESC";
    $qr = mysqli_query($connect, $sql);
    if(isset($_POST["timkiem"])){
        $s = $_POST["tukhoa"];
        if($s == ""){
            $sql = "SELECT * FROM (phieunhap INNER JOIN nhacungcap ON phieunhap.id_nhacc=nhacungcap.id_nhacc)
            ORDER BY phieunhap.id_phieunhap DESC";
            $qr = mysqli_query($connect, $sql);
        }else{
            $sql = "SELECT * FROM (phieunhap INNER JOIN nhacungcap ON phieunhap.id_nhacc=nhacungcap.id_nhacc)
            where tenncc LIKE '$s'";
            $qr = mysqli_query($connect, $sql);
        }
    }
?>
<div class="row">
    <div class="content">         
        <h1>Danh sách Phiếu nhập</h1>
        <div class="panel-body">
            <div class="toolbar">
                <?php if ($loai == "quản lý"){ ?>

                <a href="QLphieunhap.php?content=Taophieunhap" class="btn btn-info">Tạo phiếu nhập</a>
                <?php } ?>
                <form action="" method="POST">
                    <input type="submit" name="timkiem" value="Search" class="btn btn-danger search">
                    <input type="text" name="tukhoa" placeholder="Nhập từ khóa" class="form-control">
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th style="width: 250px">Thời gian lập</th>
                            <th style="width: 250px">Nhà cung cấp</th>
                            <th style="width: 150px">Tổng tiền</th>
                            <th>Xem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_assoc($qr)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id_phieunhap'] ?></td>
                            <td><?php echo $row['ngaynhap'] ?></td>
                            <td><?php echo $row['tenncc'] ?></td>
                            <td><?= number_format($row['gia'], 0,",",".")?> vnđ</td>
                            <td><a href="QLphieunhap.php?content=Xempn&id=<?php echo $row['id_phieunhap'] ?>"> Xem</a></td>
                        </tr>
                        <?php } ?> 

                    </tbody>
                </table> 
            </div>        
        </div>         
    </div>
</div>