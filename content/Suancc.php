<?php 
    $id = $_GET['id'];

    $sql_up = "SELECT * FROM nhacungcap where id_nhacc='$id'";
    $query_up = mysqli_query($connect, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if(isset($_POST['sbm'])){
        $tenncc = $_POST['tenncc'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];

        $sql = "UPDATE nhacungcap SET tenncc = '$tenncc',sdt = '$sdt',diachi = '$diachi' where id_nhacc = '$id'";
        $query = mysqli_query($connect, $sql);
        header('location: QLncc.php?content=ncc');
    }
?>
<div class="row">
    <div class="content">         
        <h1>Sửa Nhà cung cấp</h1>
        <div class="panel-body">
            <div class="table-responsive">
                <form method="POST" >
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Tên nhà cung cấp</th>
                                <th>SĐT</th>
                                <th>Địa chỉ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 250px">
                                    <input name="tenncc" type="text" class="form-control" required value="<?php echo $row_up['tenncc'] ?>">
                                </td>
                                <td style="width: 150px">
                                    <input name="sdt" type="int" class="form-control" required value="<?php echo $row_up['sdt'] ?>">
                                </td>
                                <td style="width: 150px">
                                    <input name="diachi" type="int" class="form-control" required value="<?php echo $row_up['diachi'] ?>">
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