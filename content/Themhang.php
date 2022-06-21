<?php 
    if(isset($_POST['sbm'])){
        $tenhang = $_POST['tenhang'];
        $gia = $_POST['gia'];

        $sql = "INSERT INTO mathang(tenhang,gia) VALUES ('$tenhang','$gia')";
        mysqli_query($connect, $sql);
        header('location: QLmathang.php?content=hang');
    }
?>
<div class="row">
    <div class="content">         
        <h1>Thêm Mặt hàng</h1>
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
                                    <input name="tenhang" type="text" class="form-control" required>
                                </td>
                                <td style="width: 150px">
                                    <input name="gia" type="int" class="form-control" required>
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