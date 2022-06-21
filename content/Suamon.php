<?php 
    $id = $_GET['id'];

    $sql_up = "SELECT * FROM mon where id_mon='$id'";
    $query_up = mysqli_query($connect, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if(isset($_POST['sbm'])){
        $tenmon = $_POST['tenmon'];
        $gia = $_POST['gia'];

        $sql = "UPDATE mon SET tenmon = '$tenmon',gia = '$gia' where id_mon = '$id'";
        $query = mysqli_query($connect, $sql);
        header('location: QLmon.php?content=mon');
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
                                <th>Tên món ăn</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 250px">
                                    <input name="tenmon" type="text" class="form-control" required value="<?php echo $row_up['tenmon'] ?>">
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