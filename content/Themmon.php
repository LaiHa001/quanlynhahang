<?php 
    if(isset($_POST['sbm'])){
        $tenmon = $_POST['tenmon'];
        $gia = $_POST['gia'];

        $sql = "INSERT INTO mon(tenmon,gia) VALUES ('$tenmon','$gia')";
        mysqli_query($connect, $sql);
        header('location: QLmon.php?content=mon');
    }
?>
<div class="row">
    <div class="content">         
        <h1>Thêm Món Ăn</h1>
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
                                    <input name="tenmon" type="text" class="form-control" required>
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