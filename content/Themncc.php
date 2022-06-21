<?php 
    if(isset($_POST['sbm'])){
        $tenncc = $_POST['tenncc'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];

        $sql = "INSERT INTO nhacungcap(tenncc,sdt,diachi) VALUES ('$tenncc','$sdt','$diachi')";
        mysqli_query($connect, $sql);
        header('location: QLncc.php?content=ncc');
    }
?>
<div class="row">
    <div class="content">         
        <h1>Thêm Nhà cung cấp</h1>
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
                                    <input name="tenncc" type="text" class="form-control" required>
                                </td>
                                <td style="width: 150px">
                                    <input name="sdt" type="int" class="form-control" required>
                                </td>
                                <td style="width: 150px">
                                    <input name="diachi" type="int" class="form-control" required>
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