<?php 
    $id = $_GET['id'];
    $sql = "DELETE FROM nhanvien where id_NV=$id";
    $query = mysqli_query($connect,$sql);
    header('location: QLnhanvien.php?content=nhanvien');
?>