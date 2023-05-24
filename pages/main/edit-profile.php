<?php
    $sql_taikhoan_canhan = "SELECT * FROM tbl_taikhoan WHERE id_taikhoan='$user[id_taikhoan]' LIMIT 1";
    $query_taikhoan_canhan = mysqli_query($mysqli, $sql_taikhoan_canhan);

    if (isset($_POST['suataikhoan'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $sql_update = "UPDATE tbl_taikhoan SET tenkhachhang='$name',dienthoai='$phone',email='$email',diachi='$address' WHERE id_taikhoan='$user[id_taikhoan]'";
        mysqli_query($mysqli,$sql_update);
        echo "<script> window.location.href='index.php?quanly=thongtincanhan' </script>";
    }
?>

<!-- Information -->
<div class="form-information">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="row">
            <div class="col l-3"></div>
            <div class="col l-6">
                <h3 class="information-heading">Thông tin cá nhân</h3>
                <?php 
                    while ($row = mysqli_fetch_array($query_taikhoan_canhan)) {
                ?>
                <div class="information-group">
                    <label for="name" class="information-label">Họ và tên</label>
                    <input id="name" type="text" value="<?php echo $row['tenkhachhang'] ?>" name="name" class="information-control">
                </div>

                <div class="information-group">
                    <label for="phone" class="information-label">Số điện thoại</label>
                    <input id="phone" type="text" value="<?php echo $row['dienthoai'] ?>" name="phone" class="information-control">
                </div>

                <div class="information-group">
                    <label for="email" class="information-label">Email</label>
                    <input id="email" type="text" value="<?php echo $row['email'] ?>" name="email" class="information-control">
                </div>

                <div class="information-group">
                    <label for="address" class="information-label">Địa chỉ</label>
                    <input id="address" type="text" value="<?php echo $row['diachi'] ?>" name="address" class="information-control">
                </div>

                <div class="information-action">
                    <button class="information-update" name="suataikhoan">Cập nhật thông tin</button>
                </div>
                <?php
                    }
                ?>
            </div>
            <div class="col l-3"></div>
        </div>
    </form>
</div>