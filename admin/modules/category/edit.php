<?php
$sql_sua_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
$query_sua_danhmucsp = mysqli_query($mysqli, $sql_sua_danhmucsp);
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Sửa Danh Mục Sản Phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Sửa Danh Mục</li>
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
            <form method="POST" action="./modules/category/handle.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>" enctype="multipart/form-data">
                <?php
                while ($row = mysqli_fetch_array($query_sua_danhmucsp)) {
                ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputCategory">Tên danh mục</label>
                            <input type="text" class="form-control" id="exampleInputCategory" name="tendanhmuc" value="<?php echo $row['tendanhmuc'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="hinhanh">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            <img src="./modules/category/uploads/<?php echo $row['hinhanh'] ?>" width="100px">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="suadanhmuc">Sửa Danh Mục</button>
                    </div>
                <?php
                }
                ?>
            </form>
        </div>
        </table>
    </div>
</section>
<!-- /.content -->