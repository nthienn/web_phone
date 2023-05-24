<?php
    include('../../config/config.php');
    $tendanhmuc = $_POST['tendanhmuc'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh_time = time().'_'.$hinhanh;
    
    if (isset($_POST['themdanhmuc'])) {
        $sql_them = "INSERT INTO tbl_danhmuc(tendanhmuc,hinhanh) VALUES('".$tendanhmuc."','".$hinhanh_time."')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh_time);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=lietke');
    } else if (isset($_POST['suadanhmuc'])) {
        if ($hinhanh!='') {
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh_time);
            $sql = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc = '$_GET[iddanhmuc]' LIMIT 1";    
            $query = mysqli_query($mysqli, $sql);
            while ($row = mysqli_fetch_array($query)) {
                unlink('./uploads/'.$row['hinhanh']);
            }
            $sql_update = "UPDATE tbl_danhmuc SET tendanhmuc='".$tendanhmuc."', hinhanh='".$hinhanh_time."' WHERE id_danhmuc='$_GET[iddanhmuc]'";
        } else {
            $sql_update = "UPDATE tbl_danhmuc SET tendanhmuc='".$tendanhmuc."' WHERE id_danhmuc='$_GET[iddanhmuc]'";
        }
        mysqli_query($mysqli,$sql_update);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=lietke');
    } else {
        $id = $_GET['iddanhmuc'];
        $sql = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$id' LIMIT 1";    
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('./uploads/'.$row['hinhanh']);
        }
        $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc='".$id."'";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=lietke');
    }
?>