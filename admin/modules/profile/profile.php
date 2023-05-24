<?php
$sql_taikhoan_canhan = "SELECT * FROM tbl_admin";
$query_taikhoan_canhan = mysqli_query($mysqli, $sql_taikhoan_canhan);
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Quản Lý Thông Tin Cá Nhân</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Thông Tin Cá Nhân</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Quản lý</th>
                        </tr>
                    </thead>
                    <?php
                    $i = 0;
                    while ($row = mysqli_fetch_array($query_taikhoan_canhan)) {
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td>
                            <a href="?action=quanlytaikhoancanhan&query=sua&idadmin=<?php echo $row['id_admin'] ?>">Cập nhật thông tin</a> |
                            <a href="?action=quanlytaikhoancanhan&query=doimatkhau&idadmin=<?php echo $row['id_admin'] ?>">Đổi mật khẩu</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->