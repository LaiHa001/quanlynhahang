<?php

$id = $_GET['id'];

$sql ="SELECT * FROM hoadon where hoadon_id = '$id'";
$qr = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($qr);
$a = "SELECT * FROM themmon INNER JOIN mon ON themmon.id_mon = mon.id_mon where hoadon_id='$id'";
$b = mysqli_query($connect, $a);
?>
<div class="row">
    <div class="content">     
        <h1>Chi tiết hóa đơn</h1>   
            <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th  style="width: 150px">Họ và tên</th>
                            <th style="width: 150px">SĐT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $row['tenkhachhang'] ?></td>
                            <td><?php echo $row['sdt'] ?></td>
                        </tr>
                    </tbody>
                </table> 
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 250px">Tên món</th>
                            <th style="width: 250px">Giá</th>
                            <th style="width: 250px">Số lượng</th>
                            <th style="width: 250px">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php
                    while($row_up = mysqli_fetch_assoc($b)) {
                     ?>
                        <tr>
                            <td><?php echo $row_up['tenmon'] ?></td>
                            <td><?= number_format($row_up['gia'], 0,",",".")?> vnđ</td>
                            <td><?php echo $row_up['soluong'] ?></td>
                            <td><?= number_format($row_up['giatong'], 0,",",".")?></td>
                        </tr>
                    <?php } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr> 
                        <tr>
                            <td>Tổng tiền</td>
                            <td></td>
                            <td></td>
                            <td><?= number_format($row['gia'], 0,",",".")?> vnđ</td>
                        </tr>                                                                                                           
                    </tbody>
                </table>
            </div>        
        </div>
    </div>
</div>