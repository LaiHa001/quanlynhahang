<?php date_default_timezone_set("Asia/Ho_Chi_Minh");
?>

<?php
    if(!isset($_SESSION["pn"])){
    $_SESSION["pn"]=array();
    }
    $success = false;
    if (isset($_GET['action'])){
        function update_order($add = false){
            foreach ($_POST['quantity'] as $id_hang => $quantity){
                if($quantity==0){
                    unset($_SESSION["pn"][$id_hang]);
                } else{
                    if($add){
                        $_SESSION["pn"][$id_hang] += $quantity;
                    }else{
                        $_SESSION["pn"][$id_hang] = $quantity;
                    }
                }
                
            }
        }
        
        switch ($_GET['action']){
            case "add":
                update_order(true);
                header('location:QLphieunhap.php?content=Taophieunhap');
                break;
            case "delete":
                if(isset($_GET['id_hang'])){
                    unset($_SESSION["pn"][$_GET['id_hang']]); 
                }
                header('location:QLphieunhap.php?content=Taophieunhap');
                break;
            case "submit":
                if(isset($_POST['update_click'])){
                    update_order();
                    header('location:QLphieunhap.php?content=Taophieunhap');
                }elseif($_POST['order_click']){
                    if(empty($_POST['quantity'])){
                        $error = "Giỏ Hàng Rỗng";

                    }
                    
                    elseif(!empty($_POST['quantity'])){
                        $sql = "SELECT * FROM `mathang` WHERE `id_hang` IN (".implode(",", array_keys($_POST['quantity'])).") ";
                        $qrr = mysqli_query($connect, $sql);
                        $total = 0;
                        $orderqrr= array();
                        while($roww = mysqli_fetch_array($qrr)) {
                            $orderqrr[]=$roww;
                            $total += $roww['gia']* $_POST['quantity'][$roww['id_hang']];
                            

                        }

                        $sql="INSERT INTO `phieunhap`(`id_phieunhap`,`gia`,`id_nhacc`,`ngaynhap`,`thang`)VALUES (NULL,'".$total."','".$_POST['id_nhacc']."', '".date("d-m-Y h:i")."', '".date("Y-m")."')" ;
                        $inse= mysqli_query($connect,$sql);
                        $id_phieunhap=$connect->insert_id;
                        $insertString = "";
                        foreach ($orderqrr as $key => $qrr) {
                            $insertString .="(NULL, '".$qrr['id_hang']."','".$id_phieunhap ."', '".$_POST['quantity'][$qrr['id_hang']]."', '".$_POST['quantity'][$qrr['id_hang']]*$qrr['gia']."' )";
                            if($key != count($orderqrr) -1){
                                $insertString .= ",";
                            }
                        }
                
                        $sql="INSERT INTO `themhang`(`id`,`id_hang`,`id_phieunhap`,`soluong`,`giatong`)VALUES ".$insertString.";" ;
                        $inse= mysqli_query($connect,$sql);
                        $success = "Đặt hàng thành công";
                        unset($_SESSION['pn']);
                    }
                }
                break;
        }
    }
    if(!empty($_SESSION["pn"])){
        $sql = "SELECT * FROM `mathang` WHERE `id_hang` IN (".implode(",", array_keys($_SESSION["pn"])).") ";
        $qr = mysqli_query($connect, $sql);
    }
?>
<?php if(!empty($error)){ ?>
    <?= $error ?>. <a href="javascript:history.back()">Quay lại</a>
<?php 
}elseif(!empty($success)){ ?>
    <?= $success ?>. <a href="QLphieunhap.php?content=phieunhap">Tiếp tục order</a>
    <?php 
    }else{ ?>
<div class="row">
    <div class="content">     
        <h1>Tạo hóa đơn</h1>   
        <form action="QLphieunhap.php?content=Taophieunhap&action=submit" method="POST">
            <div class="panel-body">
            <div style="margin-bottom: 10px ;">
                <input type="submit" name="update_click" value="Cập nhật " class="btn btn-info">
                <a href="QLphieunhap.php?content=Dathang" class="btn btn-dark">menu</a>
                <input type="submit" name="order_click" value="Xác nhận đặt món " class="btn btn-danger">
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th  style="width: 150px">Nhà cung cấp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="id_nhacc" class="form-control" required>
                                    <?php 
                                    $sql = "SELECT * FROM nhacungcap";
                                    $rooo = mysqli_query($connect,$sql);
                                    ?>
                                    <option>Chọn nhà cung cấp</option>
                                    <?php
                                        while($ro = mysqli_fetch_assoc($rooo)) {
                                    ?>
                                    <option value="<?php echo $ro['id_nhacc'] ?>"><?php echo $ro['tenncc'] ?></option>
                                    <?php } ?> 
                                </select>
                            </td>
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
                            if(!empty($qr)){
                            $total=0;
                            $num=1;
                            
                            while($row = mysqli_fetch_array($qr)) {
                        ?>
                        <tr>
                            <td><?php echo $row['tenhang'] ?></td>
                            <td><?= number_format($row['gia'], 0,",",".")?></td>
                            <td><input type="text" value="<?= $_SESSION["pn"][$row['id_hang']] ?>" name="quantity[<?php echo $row['id_hang'] ?>]"></td>
                            <td><?= number_format($row['gia'] * $_SESSION["pn"][$row['id_hang']], 0,",",".")?> vnđ</td>
                            <td><a style="text-decoration: none;" href="QLphieunhap.php?content=Taophieunhap&action=delete&id_hang=<?= $row['id_hang'] ?>"> Xoá </a></td>
                        </tr>
                        <?php 
                        $total +=$row['gia'] * $_SESSION["pn"][$row['id_hang']];
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