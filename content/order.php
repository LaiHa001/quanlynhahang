<?php date_default_timezone_set("Asia/Ho_Chi_Minh");
                       ?>
<?php
    if(!isset($_SESSION["order"])){
    $_SESSION["order"]=array();
    }
    $success = false;
    if (isset($_GET['action'])){
        function update_order($add = false){
            foreach ($_POST['quantity'] as $id_mon => $quantity){
                if($quantity==0){
                    unset($_SESSION["order"][$id_mon]);
                } else{
                    if($add){
                        $_SESSION["order"][$id_mon] += $quantity;
                    }else{
                        $_SESSION["order"][$id_mon] = $quantity;
                    }
                }
                
            }
        }
        
        switch ($_GET['action']){
            case "add":
                update_order(true);
                header('location:index.php?content=Taohoadon');
                break;
            case "delete":
                if(isset($_GET['id_mon'])){
                    unset($_SESSION["order"][$_GET['id_mon']]); 
                }
                header('location:index.php?content=Taohoadon');
                break;
            case "submit":
                if(isset($_POST['update_click'])){
                    update_order();
                    header('location:index.php?content=Taohoadon');
                }elseif($_POST['order_click']){
                    if(empty($_POST['quantity'])){
                        $error = "Giỏ Hàng Rỗng";

                    }
                    elseif(empty($_POST['tenkhachhang'])){
                        $error ="Bạn chưa nhập tên khách hàng";
                    }
                    elseif(empty($_POST['sdt'])){
                        $error ="Bạn chưa nhập số điện thoại khách hàng";
                    }
                    elseif(!empty($_POST['quantity'])){
                        $sql = "SELECT * FROM `mon` WHERE `id_mon` IN (".implode(",", array_keys($_POST['quantity'])).") ";
                        $qrr = mysqli_query($connect, $sql);
                        $total = 0;
                        $orderqrr= array();
                        while($roww = mysqli_fetch_array($qrr)) {
                            $orderqrr[]=$roww;
                            $total += $roww['gia']* $_POST['quantity'][$roww['id_mon']];
                            

                        }

                        $sql="INSERT INTO `hoadon`(`hoadon_id`,`gia`,`tenkhachhang`,`sdt`,`time`,`thang`,`id_NV`)VALUES (NULL,'".$total."','".$_POST['tenkhachhang']."', '".$_POST['sdt']."','".date("d-m-Y h:i")."','".date("Y-m")."', '".$_POST['id_NV']."')" ;
                        $inse= mysqli_query($connect,$sql);
                        $hoadon_id=$connect->insert_id;
                        $insertString = "";
                        foreach ($orderqrr as $key => $qrr) {
                            $insertString .="(NULL, '".$qrr['id_mon']."','".$hoadon_id ."', '".$_POST['quantity'][$qrr['id_mon']]."', '".$qrr['gia']."', '".$_POST['quantity'][$qrr['id_mon']]*$qrr['gia']."' )";
                            if($key != count($orderqrr) -1){
                                $insertString .= ",";
                            }
                        }
                
                        $sql="INSERT INTO `themmon`(`id`,`id_mon`,`hoadon_id`,`soluong`,`gia`,`giatong`)VALUES ".$insertString.";" ;
                        $inse= mysqli_query($connect,$sql);
                        $success = "Đặt món thành công";
                        unset($_SESSION['order']);
                    }
                }
                break;
        }
    }
    if(!empty($_SESSION["order"])){
        $sql = "SELECT * FROM `mon` WHERE `id_mon` IN (".implode(",", array_keys($_SESSION["order"])).") ";
        $qr = mysqli_query($connect, $sql);
    }
?>
<?php if(!empty($error)){ ?>
    <?= $error ?>. <a href="javascript:history.back()">Quay lại</a>
<?php 
}elseif(!empty($success)){ ?>
    <?= $success ?>. <a href="index.php?content=index">Tiếp tục order</a>
    <?php 
    }else{ ?>
<div class="row">
    <div class="content">     
        <h1>Tạo hóa đơn</h1>   
        <form action="index.php?content=Taohoadon&action=submit" method="POST">
            <div class="panel-body">
            <div style="margin-bottom: 10px ;">
                <input type="submit" name="update_click" value="Cập nhật " class="btn btn-info">
                <a href="index.php?content=Datmon" class="btn btn-dark">menu</a>
                <input type="submit" name="order_click" value="Xác nhận đặt món " class="btn btn-danger">
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th  style="width: 150px">Họ và tên</th>
                            <th style="width: 150px">SĐT</th>
                            <th style="width: 150px">Nhân viên phụ trách</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input name="tenkhachhang" type="text" class="form-control" >
                            </td>
                            <td >
                                <input name="sdt" type="int" class="form-control" >
                            </td>
                            <td>
                                <select name="id_NV" class="form-control" required>
                                    <?php 
                                    $sql = "SELECT * FROM nhanvien";
                                    $rooo = mysqli_query($connect,$sql);
                                    ?>
                                    <option>Chọn nhân viên</option>
                                    <?php
                                        while($ro = mysqli_fetch_assoc($rooo)) {
                                    ?>
                                    <option value="<?php echo $ro['id_NV'] ?>"><?php echo $ro['tenNV'] ?></option>
                                    <?php } ?> 
                                </select>
                            </td>
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
                            if(!empty($qr)){
                            $total=0;
                            $num=1;
                            
                            while($row = mysqli_fetch_array($qr)) {
                        ?>
                        <tr>
                            <td><?php echo $row['tenmon'] ?></td>
                            <td><?= number_format($row['gia'], 0,",",".")?></td>
                            <td><input type="text" value="<?= $_SESSION["order"][$row['id_mon']] ?>" name="quantity[<?php echo $row['id_mon'] ?>]"></td>
                            <td><?= number_format($row['gia'] * $_SESSION["order"][$row['id_mon']], 0,",",".")?> vnđ</td>
                            <td><a style="text-decoration: none;" href="index.php?content=Taohoadon&action=delete&id_mon=<?= $row['id_mon'] ?>"> Xoá </a></td>
                        </tr>
                        <?php 
                        $total +=$row['gia'] * $_SESSION["order"][$row['id_mon']];
                        }
                        ?>
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
                            <td><?= number_format($total, 0,",",".")?> vnđ</td>
                        </tr>
                                <?php } ?>                                                                                                               
                    </tbody>
                </table>
                <?php } ?>
            </div>        
        </div>
        </form>
    </div>
</div>