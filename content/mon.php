<?php 
    $sql = "SELECT * FROM mon";
    $qr = mysqli_query($connect, $sql);
    if(isset($_POST["timkiem"])){
        $s = $_POST["tukhoa"];
        if($s == ""){
            $sql = "SELECT * FROM mon ";
            $qr = mysqli_query($connect, $sql);
        }else{
            $sql = "SELECT * FROM mon where tenmon LIKE '$s'";
            $qr = mysqli_query($connect, $sql);
        }
    }
?>
<div class="row">
    <div class="content">         
        <h1>Danh sách Món ăn</h1>
        <div class="panel-body">
            <div class="toolbar">
                <?php if ($loai == "quản lý"){ ?>

                <a href="QLmon.php?content=ThemMon" class="btn btn-info">Thêm mới</a>
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
                            <th style="width: 250px">Tên món ăn</th>
                            <th style="width: 150px">Giá</th>
                            <?php if ($loai == "quản lý"){ ?>
                            <th>Sửa</th>
                            <th>Xóa</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_assoc($qr)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id_mon'] ?></td>
                            <td><?php echo $row['tenmon'] ?></td>
                            <td><?= number_format($row['gia'], 0,",",".")?> vnđ</td>
                            <?php if ($loai == "quản lý"){ ?>
                            <td><a href="QLmon.php?content=SuaMon&id=<?php echo $row['id_mon']; ?>">Sửa</a></td>
                            <td><a href="QLmon.php?content=XoaMon&id=<?php echo $row['id_mon']; ?>">Xóa</a></td>
                            <?php } ?>
                        </tr>
                        <?php } ?> 

                    </tbody>
                </table> 
            </div>        
        </div>         
    </div>
</div>