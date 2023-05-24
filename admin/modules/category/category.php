<?php
$sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc ASC";
$query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp);
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Liệt Kê Danh Mục Sản Phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Liệt Kê Danh Mục</li>
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
                            <th>Tên danh mục</th>
                            <th>Hình ảnh</th>
                            <th>Quản lý</th>
                        </tr>
                    </thead>
                    <?php
                    $i = 0;
                    while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['tendanhmuc'] ?></td>
                        <td><img src="./modules/category/uploads/<?php echo $row['hinhanh'] ?>" width="60px"></td>
                        <td>
                            <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a> | <a href="./modules/category/handle.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xóa</a>
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