<?php 
    $sql = "SELECT * FROM mathang";
    $qr = mysqli_query($connect, $sql);
    if(isset($_POST["timkiem"])){
        $s = $_POST["tukhoa"];
        if($s == ""){
            $sql = "SELECT * FROM mathang ";
            $qr = mysqli_query($connect, $sql);
        }else{
            $sql = "SELECT * FROM mathang where tenhang LIKE '$s'";
            $qr = mysqli_query($connect, $sql);
        }
    }
?>
<div class="row">
    <div class="content">         
        <h1>Danh sách Mặt hàng</h1>
        <div class="panel-body">
            <div class="toolbar">
                <a href="QLmathang.php?content=ThemMH" class="btn btn-info">Thêm mới</a>
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
                            <th style="width: 250px">Tên mặt hàng</th>
                            <th style="width: 150px">Giá</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_assoc($qr)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id_hang'] ?></td>
                            <td><?php echo $row['tenhang'] ?></td>
                            <td><?php echo $row['gia'] ?> vnđ</td>
                            <td><a href="QLmathang.php?content=SuaMH&id=<?php echo $row['id_hang']; ?>">Sửa</a></td>
                            <td><a href="QLmathang.php?content=XoaMH&id=<?php echo $row['id_hang']; ?>">Xóa</a></td>
                        </tr>
                        <?php } ?>                      
                    </tbody>
                </table> 
            </div>        
        </div>         
    </div>
</div>