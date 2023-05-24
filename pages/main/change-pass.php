<?php
    $err = [];
    if (isset($_POST['doimatkhau'])) {
        $password = $_POST['password'];
        $password_new = $_POST['password_new'];
        $password_confirmation = $_POST['password_confirmation'];
        $sql = "SELECT * FROM tbl_taikhoan WHERE id_taikhoan='$user[id_taikhoan]' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        $data = mysqli_fetch_assoc($query);
        $checkPass = password_verify($password, $data['matkhau']);
        if ($checkPass) {
            if ($password_new==$password_confirmation) {
                $pass_new = password_hash($password_new, PASSWORD_DEFAULT);
                $sql_update = "UPDATE tbl_taikhoan SET matkhau='$pass_new' WHERE id_taikhoan='$user[id_taikhoan]'";
                mysqli_query($mysqli,$sql_update);
                echo "<script> window.location.href='index.php?quanly=thongtincanhan' </script>";
            } else {
                $err['password_confirmation'] = "Mật khẩu nhập lại không chính xác";
            }
        } else {
            $err['password'] = "Mật khẩu không chính xác";
        }
    }
?>

<!-- Information -->
<div class="form-information">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="row">
            <div class="col l-3"></div>
            <div class="col l-6">
                <h3 class="information-heading">Đổi mật khẩu</h3>
                <div class="information-group">
                    <label for="password" class="information-label">Mật khẩu hiện tại</label>
                    <input id="password" type="password" name="password" class="information-control-pass">
                    <span class="information-message"><?php echo (isset($err['password']))?$err['password']:'' ?></span>
                </div>

                <div class="information-group">
                    <label for="password_new" class="information-label">Mật khẩu mới</label>
                    <input id="password_new" type="password" name="password_new" class="information-control-pass">
                </div>

                <div class="information-group">
                    <label for="password_confirmation" class="information-label">Nhập lại mật khẩu</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="information-control-pass">
                    <span class="information-message"><?php echo (isset($err['password_confirmation']))?$err['password_confirmation']:'' ?></span>
                </div>

                <div class="information-action">
                    <button class="information-convert" name="doimatkhau">Đổi mật khẩu</button>
                </div>
            </div>
            <div class="col l-3"></div>
        </div>
    </form>
</div>