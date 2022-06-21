<?php

$id = $_GET['id'];

$sql ="SELECT * FROM phieunhap INNER JOIN nhacungcap ON phieunhap.id_nhacc = nhacungcap.id_nhacc where id_phieunhap = '$id'";
$qr = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($qr);
$a = "SELECT * FROM themhang INNER JOIN mathang ON themhang.id_hang = mathang.id_hang where id_phieunhap='$id'";
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
                            <th  style="width: 150px">Tên nhà cung cấp</th>
                            <th style="width: 150px">Địa chỉ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $row['tenncc'] ?></td>
                            <td><?php echo $row['diachi'] ?></td>
                        </tr>
                    </tbody>
                </table> 
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 250px">Tên hàng</th>
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
                            <td><?php echo $row_up['tenhang'] ?></td>
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