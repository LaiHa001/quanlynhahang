
<?php
    $sql = "SELECT * FROM mathang ";
    $qr = mysqli_query($connect, $sql);
    
?>


<div class="row">
    <div class="content">
        <h1>Chọn mặt hàng</h1>         
        <div class="panel-body">
            <div class="toolbar1">
                <?php while($row = mysqli_fetch_assoc($qr)) {?>
                    <div class="btn btn-info t">
                        <a href="QLphieunhap.php?content=soluong&id=<?php echo $row['id_hang'];?>"><?php echo $row['tenhang'] ?></a>
                    </div>                                                                             
                <?php } ?>
            </div>        
        </div>         
    </div>
</div>
