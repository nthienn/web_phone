<?php
    $sql_taikhoan_canhan = "SELECT * FROM tbl_taikhoan WHERE id_taikhoan='$user[id_taikhoan]' LIMIT 1";
    $query_taikhoan_canhan = mysqli_query($mysqli, $sql_taikhoan_canhan);
?>

<!-- Information -->
<div class="form-information">
    <div class="row">
        <div class="col l-3"></div>
        <div class="col l-6">
            <h3 class="information-heading">Thông tin cá nhân</h3>
            <?php 
                while ($row = mysqli_fetch_array($query_taikhoan_canhan)) {
            ?>
            <div class="information-group">
                <label for="name" class="information-label">Họ và tên</label>
                <label for="name" class="information-personal"><?php echo $row['tenkhachhang'] ?></label>
            </div>

            <div class="information-group">
                <label for="phone" class="information-label">Số điện thoại</label>
                <label for="phone" class="information-personal"><?php echo $row['dienthoai'] ?></label>
            </div>

            <div class="information-group">
                <label for="email" class="information-label">Email</label>
                <label for="email" class="information-personal"><?php echo $row['email'] ?></label>
            </div>

            <div class="information-group">
                <label for="address" class="information-label">Địa chỉ</label>
                <label for="address" class="information-personal"><?php echo $row['diachi'] ?></label>
            </div>

            <div class="information-action">
                <button class="information-update">
                    <a href="index.php?quanly=suataikhoan">Cập nhật thông tin</a>
                </button>
                <button class="information-convert">
                    <a href="index.php?quanly=doimatkhau">Đổi mật khẩu</a>
                </button>
            </div>
            <?php
                }
            ?>
        </div>
        <div class="col l-3"></div>
    </div>
</div>