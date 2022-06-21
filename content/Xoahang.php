<?php 
    $id = $_GET['id'];
    $sql = "DELETE FROM mathang where id_hang=$id";
    $query = mysqli_query($connect,$sql);
    header('location: QLmathang.php?content=hang');
?>