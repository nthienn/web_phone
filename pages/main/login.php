<?php
    $err = [];
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM tbl_taikhoan WHERE email='$email'";
        $query = mysqli_query($mysqli, $sql);
        $data = mysqli_fetch_assoc($query);
        $checkEmail = mysqli_num_rows($query);
        if ($checkEmail==1) {
            $checkPass = password_verify($password, $data['matkhau']);
            if ($checkPass) {
                $_SESSION['user'] = $data;
                echo "<script> window.location.href='index.php' </script>";
            } else {
                $err['password'] = "Mật khẩu không chính xác";
            }
        } else {
            $err['email'] = "Email không tồn tại";
        }
    }
?>

<!-- Login -->
<div class="welcome">
    <div class="row">
        <div class="background l-6">
            <img src="./assets/images/welcome.png" alt="">
        </div>

        <form method="POST" class="form l-6" id="form">
            <h3 class="form-heading">Đăng nhập</h3>
            <p class="form-desc">Chào mừng bạn ❤️</p>
        
            <div class="spacer"></div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="text" placeholder="Nhập email của bạn" class="form-control">
                <span class="form-message"><?php echo (isset($err['email']))?$err['email']:'' ?></span>
            </div>
        
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input id="password" name="password" type="password" placeholder="Nhập mật khẩu của bạn" class="form-control">
                <span class="form-message"><?php echo (isset($err['password']))?$err['password']:'' ?></span>
            </div>

            <button class="form-submit" name="dangnhap">Đăng nhập</button>

            <div class="form-no">
                Bạn chưa có tài khoản?
                <a href="index.php?quanly=dangky">Đăng ký ngay</a>
            </div>
        </form>
    </div>
</div>
