<?php
    include('../../config/config.php');
    $id = $_GET['idtaikhoan'];
    $sql_xoa = "DELETE FROM tbl_taikhoan WHERE id_taikhoan='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=quanlytaikhoan&query=lietke');
?>