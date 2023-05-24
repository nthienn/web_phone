<?php
    session_start();
    include('../../admin/config/config.php');
    
    $tensanpham = $_POST['tensanpham'];
    $giasanpham = $_POST['giasanpham'];
    $soluong = $_POST['soluong'];
    $diadiem = $_POST['diadiem'];
    $noidung = $_POST['noidung'];
    $danhmuc = $_POST['danhmuc'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh_time = time().'_'.$hinhanh;

    if (isset($_FILES['images'])) {
        $files = $_FILES['images'];
        $file_names = $files['name'];
        foreach ($file_names as $key => $value) {
            move_uploaded_file($files['tmp_name'][$key],'uploads/'.$value);
        }
    }
    
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $id_taikhoan = $user['id_taikhoan'];
        if (isset($_POST['themsanpham'])) {
            $sql_them = "INSERT INTO tbl_sanpham(tensanpham,hinhanh,giasanpham,soluong,diadiem,noidung,id_danhmuc,id_taikhoan) VALUES('$tensanpham','$hinhanh_time','$giasanpham','$soluong','$diadiem','$noidung','$danhmuc','$id_taikhoan')";
            mysqli_query($mysqli,$sql_them);
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh_time);
            $id_pro = mysqli_insert_id($mysqli);
            foreach ($file_names as $key => $value) {
                mysqli_query($mysqli,"INSERT INTO tbl_thuvienanh(id_sanpham,hinhanh) VALUES('$id_pro','$value')");
            }
            header('Location:../../index.php?quanly=lietkesanpham');
        } else if (isset($_POST['suasanpham'])) {
            if ($hinhanh!='') {
                move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh_time);
                $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";    
                $query = mysqli_query($mysqli, $sql);
                while ($row = mysqli_fetch_array($query)) {
                    unlink('./uploads/'.$row['hinhanh']);
                }
                $sql_update = "UPDATE tbl_sanpham SET tensanpham='$tensanpham', hinhanh='$hinhanh_time', giasanpham='$giasanpham', soluong='$soluong', diadiem='$diadiem', noidung='$noidung', id_danhmuc='$danhmuc', id_taikhoan='$id_taikhoan' WHERE id_sanpham='$_GET[idsanpham]'";
            } else {
                $sql_update = "UPDATE tbl_sanpham SET tensanpham='$tensanpham', giasanpham='$giasanpham', soluong='$soluong', diadiem='$diadiem', noidung='$noidung', id_danhmuc='$danhmuc', id_taikhoan='$id_taikhoan' WHERE id_sanpham='$_GET[idsanpham]'";
            }
            mysqli_query($mysqli,$sql_update);
            if (!empty($file_names[0])) {
                $img_pro = mysqli_query($mysqli,"SELECT * FROM tbl_thuvienanh WHERE id_sanpham='$_GET[idsanpham]'");
                while ($row_img = mysqli_fetch_array($img_pro)) {
                    unlink('./uploads/'.$row_img['hinhanh']);
                }
                mysqli_query($mysqli,"DELETE FROM tbl_thuvienanh WHERE id_sanpham='$_GET[idsanpham]'");
                foreach ($file_names as $key => $value) {
                    move_uploaded_file($files['tmp_name'][$key],'uploads/'.$value);
                }
                foreach ($file_names as $key => $value) {
                    mysqli_query($mysqli,"INSERT INTO tbl_thuvienanh(id_sanpham,hinhanh) VALUES('$_GET[idsanpham]','$value')");
                }
            }
            header('Location:../../index.php?quanly=lietkesanpham');
        } else {
            $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";    
            $query = mysqli_query($mysqli, $sql);
            while ($row = mysqli_fetch_array($query)) {
                unlink('./uploads/'.$row['hinhanh']);
            }
            $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]'";
            mysqli_query($mysqli,$sql_xoa);
            $img_pro = mysqli_query($mysqli,"SELECT * FROM tbl_thuvienanh WHERE id_sanpham='$_GET[idsanpham]'");
            while ($row_img = mysqli_fetch_array($img_pro)) {
                unlink('./uploads/'.$row_img['hinhanh']);
            }
            mysqli_query($mysqli,"DELETE FROM tbl_thuvienanh WHERE id_sanpham='$_GET[idsanpham]'");
            header('Location:../../index.php?quanly=lietkesanpham');
        }
    }
?>