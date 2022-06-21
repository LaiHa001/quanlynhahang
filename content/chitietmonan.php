<?php
    $id_mon = $_GET['id'];
    $sql = "SELECT * FROM mon WHERE id_mon='$id_mon'";
    $qr = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($qr)
    
?>


<div class="row">
    <div class="content">         
        <h1>Chọn số lượng</h1>
        <div class="panel-body">
            <div class="table-responsive">
                <form action="index.php?content=Taohoadon&action=add" method="POST" >
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Tên món</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 250px"> <?php echo $row['tenmon'] ?> </td>
                                <td style="width: 250px"> <?= number_format($row['gia'], 0,",",".") ?> vnđ</td>
                                <td style="width: 150px">
                                    <input type="text" value="1" name="quantity[<?php echo $row['id_mon'] ?>]">
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