<?php 
    $sql = "SELECT * FROM nhanvien inner join chucvu on nhanvien.id_chucvu = chucvu.id_chucvu";
    $qr = mysqli_query($connect, $sql);
    if(isset($_POST["timkiem"])){
        $s = $_POST["tukhoa"];
        if($s == ""){
            $sql = "SELECT * FROM nhanvien inner join chucvu on nhanvien.id_chucvu = chucvu.id_chucvu";
            $qr = mysqli_query($connect, $sql);
        }else{
            $sql = "SELECT * FROM nhanvien inner join chucvu on nhanvien.id_chucvu = chucvu.id_chucvu where tenNV  LIKE '$s' or chucvu LIKE '$s' or diachi LIKE '$s' or sdt LIKE '$s'";
            $qr = mysqli_query($connect, $sql);
        }
    }
?>
<div class="row">
    <div class="content">         
        <h1>Danh sách Nhân viên</h1>
        <div class="panel-body">
            <div class="toolbar">
                <a href="QLnhanvien.php?content=ThemNV" class="btn btn-info">Thêm mới</a>
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
                            <th style="width: 250px">Họ và tên</th>
                            <th style="width: 150px">SĐT</th>
                            <th style="width: 150px">Ngày sinh</th>
                            <th style="width: 200px">Địa chỉ</th>
                            <th style="width: 130px">Chức vụ</th>
                            <th style="width: 180px">Lương</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_assoc($qr)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id_NV'] ?></td>
                            <td><?php echo $row['tenNV'] ?></td>
                            <td><?php echo $row['sdt'] ?></td>
                            <td><?php echo $row['ns'] ?></td>
                            <td><?php echo $row['diachi'] ?></td>
                            <td><?php echo $row['chucvu'] ?></td>
                            <td><?php echo $row['luong'] ?> vnđ</td>
                            <td><a href="QLnhanvien.php?content=SuaNV&id=<?php echo $row['id_NV']; ?>">Sửa</a></td>
                            <td><a href="QLnhanvien.php?content=XoaNV&id=<?php echo $row['id_NV']; ?>">Xóa</a></td>
                        </tr>
                        <?php } ?>                      
                    </tbody>
                </table> 
            </div>        
        </div>         
    </div>
</div>