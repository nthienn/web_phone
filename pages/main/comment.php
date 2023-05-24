<?php
    session_start();
    include('../../admin/config/config.php');

    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        if (isset($_POST['send'])) {
            $id_taikhoan = $user['id_taikhoan'];
            $id_sanpham = $_GET['idsanpham'];
            $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$id_sanpham' LIMIT 1";    
            $query = mysqli_query($mysqli, $sql);
            $comment = $_POST['comment'];
            $date = date('Y-m-d');
            mysqli_query($mysqli, "INSERT INTO tbl_danhgia(id_taikhoan,id_sanpham,noidung,ngaydg) VALUES ('$id_taikhoan','$id_sanpham','$comment','$date')");
            echo "<script> window.location.href='../../index.php?quanly=sanpham&id=$id_sanpham' </script>";
        } else {
            $id = $_GET['iddanhgia'];
            $sql = "SELECT * FROM tbl_danhgia WHERE id_danhgia='$id' LIMIT 1";
            $query = mysqli_query($mysqli, $sql);
            mysqli_query($mysqli,"DELETE FROM tbl_danhgia WHERE id_danhgia='$id'");
            echo "<script> window.location.href='../../index.php?quanly=sanpham&id=$_GET[idsp]' </script>";
        }
    }
?>