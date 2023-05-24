<?php
$sql_lietke_taikhoan = "SELECT * FROM tbl_taikhoan ORDER BY id_taikhoan ASC";
$query_lietke_taikhoan = mysqli_query($mysqli, $sql_lietke_taikhoan);
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Quản Lý Tài Khoản Người Dùng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Quản Lý Tài Khoản</li>
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
                            <th>Tên khách hàng</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Quản lý</th>
                        </tr>
                    </thead>
                    <?php
                    $i = 0;
                    while ($row = mysqli_fetch_array($query_lietke_taikhoan)) {
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['tenkhachhang'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['dienthoai'] ?></td>
                        <td><?php echo $row['diachi'] ?></td>
                        <td>
                            <a href="./modules/user/handle.php?idtaikhoan=<?php echo $row['id_taikhoan'] ?>">Hủy tài khoản</a>
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