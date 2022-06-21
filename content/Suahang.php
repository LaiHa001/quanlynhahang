<?php 
    $id = $_GET['id'];

    $sql_up = "SELECT * FROM mathang where id_hang='$id'";
    $query_up = mysqli_query($connect, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if(isset($_POST['sbm'])){
        $tenhang = $_POST['tenhang'];
        $gia = $_POST['gia'];

        $sql = "UPDATE mathang SET tenhang = '$tenhang',gia = '$gia' where id_hang = '$id'";
        $query = mysqli_query($connect, $sql);
        header('location: QLmathang.php?content=hang');
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
                                <th>Tên mặt hàng</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 250px">
                                    <input name="tenhang" type="text" class="form-control" required value="<?php echo $row_up['tenhang'] ?>">
                                </td>
                                <td style="width: 150px">
                                    <input name="gia" type="int" class="form-control" required value="<?php echo $row_up['gia'] ?>">
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