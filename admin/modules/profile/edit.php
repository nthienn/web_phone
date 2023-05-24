<?php
$sql_sua_tkcanhan = "SELECT * FROM tbl_admin WHERE id_admin='$_GET[idadmin]' LIMIT 1";
$query_sua_tkcanhan = mysqli_query($mysqli, $sql_sua_tkcanhan);
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Sửa Thông Tin Cá Nhân</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Sửa Thông Tin</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <form method="POST" action="./modules/profile/handle.php?idadmin=<?php echo $_GET['idadmin'] ?>" enctype="multipart/form-data">
                <?php
                while ($row = mysqli_fetch_array($query_sua_tkcanhan)) {
                ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Họ và tên</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" value="<?php echo $row['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail" name="email" value="<?php echo $row['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhone">Số điện thoại</label>
                        <input type="tel" class="form-control" id="exampleInputPhone" name="phone" value="<?php echo $row['phone'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress">Địa chỉ</label>
                        <input type="text" class="form-control" id="exampleInputAddress" name="address" value="<?php echo $row['address'] ?>">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="suataikhoan">Cập nhật</button>
                </div>
                <?php
                }
                ?>
            </form>
        </div>
    </div>
</section>
<!-- /.content -->