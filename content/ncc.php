<?php 
    $sql = "SELECT * FROM nhacungcap";
    $qr = mysqli_query($connect, $sql);
    if(isset($_POST["timkiem"])){
        $s = $_POST["tukhoa"];
        if($s == ""){
            $sql = "SELECT * FROM nhacungcap ";
            $qr = mysqli_query($connect, $sql);
        }else{
            $sql = "SELECT * FROM nhacungcap where tenncc LIKE '$s' or diachi LIKE '$s' or sdt LIKE '$s'";
            $qr = mysqli_query($connect, $sql);
        }
    }
?>
<div class="row">
    <div class="content">         
        <h1>Danh sách Nhà cung cấp</h1>
        <div class="panel-body">
            <div class="toolbar">
                <a href="QLncc.php?content=Themncc" class="btn btn-info">Thêm mới</a>
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
                            <th style="width: 250px">Tên nhà cung cấp</th>
                            <th style="width: 150px">SĐT</th>
                            <th style="width: 150px">Địa chỉ</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_assoc($qr)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id_nhacc'] ?></td>
                            <td><?php echo $row['tenncc'] ?></td>
                            <td><?php echo $row['sdt'] ?></td>
                            <td><?php echo $row['diachi'] ?></td>
                            <td><a href="QLncc.php?content=Suancc&id=<?php echo $row['id_nhacc']; ?>">Sửa</a></td>
                            <td><a href="QLncc.php?content=Xoancc&id=<?php echo $row['id_nhacc']; ?>">Xóa</a></td>
                        </tr>
                        <?php } ?>                      
                    </tbody>
                </table> 
            </div>        
        </div>         
    </div>
</div>