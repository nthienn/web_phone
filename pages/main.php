<div class="container">
    <div class="grid wide">
        <?php
        include("./pages/sidebar/sidebar.php");
        ?>

        <?php
            if (isset($_GET['quanly'])) {
                $tam = $_GET['quanly'];
            } else {
                $tam = '';
            }
            if ($tam == 'danhmuc') {
                include("./pages/main/category.php");
            } else if ($tam == 'giohang') {
                include("./pages/main/cart.php");
            } else if ($tam == 'dangnhap') {
                include("./pages/main/login.php");
            } else if ($tam == 'dangky') {
                include("./pages/main/register.php");
            } else if ($tam == 'sanpham') {
                include("./pages/main/product-detail.php");
            } else if ($tam == 'timkiem') {
                include("./pages/main/search.php");
            } else if ($tam == 'thongtincanhan') {
                include("./pages/main/profile.php");
            } else if ($tam == 'suataikhoan') {
                include("./pages/main/edit-profile.php");
            } else if ($tam == 'doimatkhau') {
                include("./pages/main/change-pass.php");
            } else if ($tam == 'lichsudonhang') {
                include("./pages/main/order-history.php");
            } else if ($tam == 'chitietdonhang') {
                include("./pages/main/order-detail.php");
            } else if ($tam == 'themsanpham') {
                include("./seller/product/add.php");
            } else if ($tam == 'lietkesanpham') {
                include("./seller/product/product.php");
            } else if ($tam == 'suasanpham') {
                include("./seller/product/edit.php");
            } else if ($tam == 'donhang') {
                include("./seller/order/order.php");
            } else if ($tam == 'duyetdonhang') {
                include("./seller/order/order-detail.php");
            } else {
                include("./pages/main/index.php");
            }
        ?>
    </div>
</div>