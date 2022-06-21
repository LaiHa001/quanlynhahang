<?php 
    $id = $_GET['id'];
    $sql = "DELETE FROM nhacungcap where id_nhacc=$id";
    $query = mysqli_query($connect,$sql);
    header('location: QLncc.php?content=ncc');
?>