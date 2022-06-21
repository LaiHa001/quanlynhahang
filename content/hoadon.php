<?php 
    $sql = "SELECT * FROM hoadon ORDER BY hoadon_id DESC";
    $qr = mysqli_query($connect, $sql);
    if(isset($_POST["timkiem"])){
        $s = $_POST["tukhoa"];
        if($s == ""){
            $sql = "SELECT * FROM hoadon ORDER BY hoadon_id DESC";
            $qr = mysqli_query($connect, $sql);
        }else{
            $sql = "SELECT * FROM hoadon where tenkhachhang LIKE '$s' or sdt LIKE '$s' ORDER BY hoadon_id DESC";
            $qr = mysqli_query($connect, $sql);
        }
    }
?>
<div class="row">
    <div class="content">         
        <h1>Danh sách Mặt hàng</h1>
        <div class="panel-body">
            <div class="toolbar">
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
                            <th style="width: 250px">Tên khách hàng</th>
                            <th style="width: 250px">SĐT</th>
                            <th style="width: 250px">Tổng tiền</th>
                            <th>Xem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_assoc($qr)) {
                        ?>
                        <tr>
                            
                            <td><?php echo $row['hoadon_id'] ?></td>
                            <td><?php echo $row['time'] ?></td>
                            <td><?php echo $row['tenkhachhang'] ?></td>
                            <td><?php echo $row['sdt'] ?></td>
                            <td><?= number_format($row['gia'], 0,",",".")?> vnđ</td>
                            <td><a href="QLhoadon.php?content=XemHD&id=<?php echo $row['hoadon_id'] ?>"> Xem</a></td>
                        </tr>
                        <?php } ?>                      
                    </tbody>
                </table> 
            </div>        
        </div>         
    </div>
</div>