<?php
    $err = [];
    if (isset($_POST['name'])) {
        $tenkhachhang = $_POST['name'];
        $dienthoai = $_POST['phone'];
        $email = $_POST['email'];
        $diachi = $_POST['address'];
        $matkhau = $_POST['password'];
        $rPassword = $_POST['password_confirmation'];
        if (empty($tenkhachhang)) {
            $err['name'] = "Bạn chưa nhập tên";
        }
        if (empty($dienthoai)) {
            $err['phone'] = "Bạn chưa nhập số điện thoại";
        }
        if (empty($email)) {
            $err['email'] = "Bạn chưa nhập email";
        }
        if (empty($diachi)) {
            $err['address'] = "Bạn chưa nhập địa chỉ";
        }
        if (empty($matkhau)) {
            $err['password'] = "Bạn chưa nhập mật khẩu";
        }
        if ($matkhau != $rPassword) {
            $err['password_confirmation'] = "Mật khẩu nhập lại không chính xác";
        }
        if (empty($err)) {
            $pass = password_hash($matkhau, PASSWORD_DEFAULT);
            $sql = "INSERT INTO tbl_taikhoan(tenkhachhang,dienthoai,email,diachi,matkhau) VALUES('$tenkhachhang','$dienthoai','$email','$diachi','$pass')";
            $query = mysqli_query($mysqli, $sql);
            if ($query) {
                $alert = "<script>alert('Đăng ký thành công')</script>";
                echo $alert;
                echo "<script> window.location.href='index.php?quanly=dangnhap' </script>";
            }
        }
    }
?>

<!-- Register -->
<div class="welcome">
    <div class="row">
        <div class="background l-6">
            <img src="./assets/images/welcome.png" alt="">
        </div>

        <form method="POST" class="form l-6" id="form">
            <h3 class="form-heading">Đăng ký</h3>
            <p class="form-desc">Chào mừng bạn ❤️</p>
        
            <div class="spacer"></div>

            <div class="form-group">
                <label for="name" class="form-label">Họ và tên</label>
                <input id="name" name="name" type="text" placeholder="Nhập họ và tên" class="form-control">
                <span class="form-message"><?php echo (isset($err['name']))?$err['name']:'' ?></span>
            </div>

            <div class="form-group">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input id="phone" name="phone" type="tel" placeholder="Nhập số điện thoại" class="form-control">
                <span class="form-message"><?php echo (isset($err['phone']))?$err['phone']:'' ?></span>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="text" placeholder="Nhập email của bạn" class="form-control">
                <span class="form-message"><?php echo (isset($err['email']))?$err['email']:'' ?></span>
            </div>

            <div class="form-group">
                <label for="address" class="form-label">Địa chỉ</label>
                <input id="address" name="address" type="text" placeholder="Nhập địa chỉ của bạn" class="form-control">
                <span class="form-message"><?php echo (isset($err['address']))?$err['address']:'' ?></span>
            </div>
        
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input id="password" name="password" type="password" placeholder="Nhập mật khẩu của bạn" class="form-control">
                <span class="form-message"><?php echo (isset($err['password']))?$err['password']:'' ?></span>
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
                <span class="form-message"><?php echo (isset($err['password_confirmation']))?$err['password_confirmation']:'' ?></span>
            </div>

            <button class="form-submit" name="dangky">Đăng ký</button>

            <div class="form-no">
                Bạn đã có tài khoản?
                <a href="index.php?quanly=dangnhap">Đăng nhập ngay</a>
            </div>
        </form>
    </div>
</div>

