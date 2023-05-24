<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Đổi Mật Khẩu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Đổi Mật Khẩu</li>
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
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPass1">Mật khẩu hiện tại</label>
                        <input type="password" class="form-control" id="exampleInputPass1" name="password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPass2">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="exampleInputPass2" name="password_new">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPass3">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" id="exampleInputPass3" name="password_confirmation">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="doimatkhau">Đổi mật khẩu</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- /.content -->