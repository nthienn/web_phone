<?php
    include('../../config/config.php');
    
    if (isset($_POST['suataikhoan'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $sql_update = "UPDATE tbl_admin SET name='$name',email='$email',phone='$phone',address='$address' WHERE id_admin='$_GET[idadmin]'";
        mysqli_query($mysqli,$sql_update);
        header('Location:../../index.php?action=quanlytaikhoancanhan&query=them');
    }

    if (isset($_POST['doimatkhau'])) {
        $password = md5($_POST['password']);
        $password_new = md5($_POST['password_new']);
        $password_confirmation = md5($_POST['password_confirmation']);
        $sql = "SELECT * FROM tbl_admin WHERE password='$password'";
        $query = mysqli_query($mysqli, $sql);
        $check = mysqli_num_rows($query);
        if ($check==1) {
            if ($password_new==$password_confirmation) {
                $sql_update = "UPDATE tbl_admin SET password='$password_new' WHERE id_admin='$_GET[idadmin]'";
                mysqli_query($mysqli,$sql_update);
                header('Location:../../index.php?action=quanlytaikhoancanhan&query=them');
            } else {
                echo '<h3 style="color:red">Mật khẩu nhập lại không chính xác</h3>';
            }
        } else {
            echo '<h3 style="color:red">Mật khẩu không chính xác</h3>';
        }
    }
?>