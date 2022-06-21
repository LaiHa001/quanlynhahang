
<?php
    $sql = "SELECT * FROM mon ";
    $qr = mysqli_query($connect, $sql);
    
?>


<div class="row">
    <div class="content">
        <h1>Chọn món</h1>         
        <div class="panel-body">
            <div class="toolbar">
                <?php while($row = mysqli_fetch_assoc($qr)) {?>
                    <div class="btn btn-info t">
                        <a href="index.php?content=soluong&id=<?php echo $row['id_mon'];?>"><?php echo $row['tenmon'] ?></a>
                    </div>                                                                             
                <?php } ?>
            </div>        
        </div>         
    </div>
</div>
