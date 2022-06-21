<?php 
    $sql_brand = "SELECT * FROM chucvu";
    $qr_brand = mysqli_query($connect, $sql_brand);

    if(isset($_POST['sbm'])){
        $id_chucvu = $_POST['id_chucvu'];
        $tenNV = $_POST['tenNV'];
        $ns = $_POST['ns'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];

        $sql = "INSERT INTO nhanvien(id_chucvu,tenNV,ns,sdt,diachi) VALUES ('$id_chucvu','$tenNV','$ns','$sdt','$diachi')";
        mysqli_query($connect, $sql);
        header('location: QLnhanvien.php?content=nhanvien');
    }
?>
<div class="row">
    <div class="content">         
        <h1>Thêm Nhân viên</h1>
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
                                <th>Lương</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 250px">
                                    <input name="tenNV" type="text" class="form-control" required>
                                </td>
                                <td style="width: 150px">
                                    <input name="sdt" type="int" class="form-control" required>
                                </td>
                                <td style="width: 150px">
                                    <input name="ns" type="date" class="form-control" required>
                                </td>
                                <td style="width: 200px">
                                    <input name="diachi" type="text" class="form-control" required>
                                </td>
                                <td style="width: 150px">
                                    <select name="id_chucvu" class="form-control" required>
                                        <option>Chọn CV</option>
                                        <?php
                                            while($row = mysqli_fetch_assoc($qr_brand)) {
                                        ?>
                                        <option value="<?php echo $row['id_chucvu'] ?>"><?php echo $row['chucvu'] ?></option>
                                        <?php } ?> 
                                    </select>
                                </td>
                                <td>
                                    <button name="sbm" class="btn btn-info" type="submit">Thêm</button>
                                </td>
                            </tr>                                           
                        </tbody>
                    </table>
                </form>
                 
            </div>        
        </div>         
    </div>
</div>