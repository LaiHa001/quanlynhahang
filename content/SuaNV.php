<?php 
    $id = $_GET['id'];

    $sql_brand = "SELECT * FROM chucvu";
    $qr_brand = mysqli_query($connect, $sql_brand);

    $sql_up = "SELECT * FROM nhanvien where id_NV=$id";
    $query_up = mysqli_query($connect, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if(isset($_POST['sbm'])){
        $id_chucvu = $_POST['id_chucvu'];
        $tenNV = $_POST['tenNV'];
        $ns = $_POST['ns'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];

        $sql = "UPDATE nhanvien SET id_chucvu = '$id_chucvu',tenNV = '$tenNV',ns = '$ns',sdt = '$sdt',diachi = '$diachi' where id_NV='$id'";
        $query = mysqli_query($connect, $sql);
        header('location: QLnhanvien.php?content=nhanvien');
    }
?>
<div class="row">
    <div class="content">         
        <h1>Sửa Nhân viên</h1>
        <div class="panel-body">
            <div class="table-responsive">
                <form method="POST" >
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Họ và tên</th>
                                <th>SĐT</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th>Chức vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 250px">
                                    <input name="tenNV" type="text" class="form-control" required value="<?php echo $row_up['tenNV'] ?>">
                                </td>
                                <td style="width: 150px">
                                    <input name="sdt" type="int" class="form-control" required value="<?php echo $row_up['sdt'] ?>">
                                </td>
                                <td style="width: 150px">
                                    <input name="ns" type="date" class="form-control" required value="<?php echo $row_up['ns'] ?>">
                                </td>
                                <td style="width: 200px">
                                    <input name="diachi" type="text" class="form-control" required value="<?php echo $row_up['diachi'] ?>">
                                </td>
                                <td style="width: 150px">
                                    <select name="id_chucvu" class="form-control" required>
                                        <?php
                                            while($row = mysqli_fetch_assoc($qr_brand)) {
                                        ?>
                                        <option value="<?php echo $row['id_chucvu'] ?>"><?php echo $row['chucvu'] ?></option>
                                        <?php } ?> 
                                    </select>
                                </td>
                                <td>
                                    <button name="sbm" class="btn btn-info" type="submit">Sửa</button>
                                </td>
                            </tr>                                           
                        </tbody>
                    </table>
                </form>
                 
            </div>        
        </div>         
    </div>
</div>