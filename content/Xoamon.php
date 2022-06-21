<?php 
    $id = $_GET['id'];
    $sql = "DELETE FROM mon where id_mon=$id";
    $query = mysqli_query($connect,$sql);
    header('location: QLmon.php?content=mon');
?>