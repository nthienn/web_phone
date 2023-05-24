<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php
        if (isset($_GET['action']) && $_GET['query']) {
            $tam = $_GET['action'];
            $query = $_GET['query'];
        } else {
            $tam = '';
            $query = '';
        }
        if ($tam == 'quanlydanhmucsanpham' && $query == 'them') {
            include("./modules/category/add.php");
        } else if ($tam == 'quanlydanhmucsanpham' && $query == 'lietke') {
            include("./modules/category/category.php");
        } else if ($tam == 'quanlydanhmucsanpham' && $query == 'sua') {
            include("./modules/category/edit.php");
        } else if ($tam == 'quanlytaikhoan' && $query == 'lietke') {
            include("./modules/user/user.php");
        } else if ($tam == 'quanlytaikhoancanhan' && $query == 'them') {
            include("./modules/profile/profile.php");
        } else if ($tam == 'quanlytaikhoancanhan' && $query == 'sua') {
            include("./modules/profile/edit.php");
        } else if ($tam == 'quanlytaikhoancanhan' && $query == 'doimatkhau') {
            include("./modules/profile/changepass.php");
        } else {
            include("./modules/dashboard.php");
        }
    ?>
</div>