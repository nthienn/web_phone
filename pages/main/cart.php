<?php
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $seller) {
            $seller = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham,tbl_taikhoan WHERE tbl_sanpham.id_taikhoan=tbl_taikhoan.id_taikhoan AND tbl_sanpham.id_sanpham='$seller[id]'");
            $row_seller = mysqli_fetch_array($seller);
        }
?>

<!-- Cart -->
<div class="cart">
    <table width="100%" style="border-collapse: collapse; text-align: center">
        <tr>
            <th>STT</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Thao tác</th>
        </tr>
        <?php
            $i=0;
            $tongtien = 0;
            foreach ($_SESSION['cart'] as $cart_item) {
                $thanhtien = $cart_item['giasanpham']*$cart_item['quantity'];
                $tongtien += $thanhtien;
                $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><img src="./seller/product/uploads/<?php echo $cart_item['hinhanh'] ?>" width="100px"></td>
            <td><?php echo $cart_item['tensanpham'] ?></td>
            <td><?php echo number_format($cart_item['giasanpham'],0,',','.').' đ' ?></td>
            <td><?php echo $cart_item['quantity'] ?></td>
            <td><?php echo number_format($thanhtien,0,',','.').' đ' ?></td>
            <td>
                <a href="./pages/main/addtocart.php?xoa=<?php echo $cart_item['id'] ?>" class="cart-action">
                    <i class="fa-solid fa-trash cart-icon"></i>
                </a>
            </td>
        </tr>
        <?php
                }
        ?>
        <tr>
            <td>&nbsp;</td>
            <td colspan="4">Tổng tiền:</td>
            <td style="color:#ff641e;"><?php echo number_format($tongtien,0,',','.').' đ' ?></td>
            <td>
                <a href="./pages/main/addtocart.php?xoatatca=1" class="cart-delete-all">Xóa tất cả</a>
            </td>
        </tr>
    </table>

    <div class="cart-alert">
        <a href="index.php">Tiếp tục thêm sản phẩm vào giỏ?</a>
    </div>
</div>
<?php
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        if (isset($_POST['name'])) {
            $id_taikhoan = $user['id_taikhoan'];
            $id_seller = $row_seller['id_taikhoan'];
            $code_order = rand(0,9999);
            $note = $_POST['note'];
            $query = mysqli_query($mysqli,"INSERT INTO tbl_order(id_taikhoan,id_seller,code_order,total,note) VALUES('$id_taikhoan','$id_seller','$code_order','$tongtien','$note')");
            if ($query) {
                $id_order = mysqli_insert_id($mysqli);
                foreach ($_SESSION['cart'] as $value) {
                    mysqli_query($mysqli,"INSERT INTO tbl_order_detail(id_order,id_sanpham,price,quantity) VALUES('$id_order','$value[id]','$value[giasanpham]','$value[quantity]')");
                    $product = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham WHERE id_sanpham='$value[id]'");
                    while ($row = mysqli_fetch_array($product)) {
                        mysqli_query($mysqli,"UPDATE tbl_sanpham SET soluong = soluong - '$value[quantity]' WHERE id_sanpham='$value[id]'");
                    }
                }
            }
            unset($_SESSION['cart']);
            echo "<script> window.location.href='index.php?quanly=lichsudonhang' </script>";
        }
?>
<div class="order">
    <div class="row">
        <div class="col l-2"></div>
        <form method="POST" class="col l-8">
            <h3 class="order-heading">Thông tin đặt hàng</h3>
            <div class="order-group">
                <label for="name" class="order-label">Họ và tên</label>
                <input id="name" type="text" value="<?php echo $user['tenkhachhang'] ?>" name="name" class="order-control">
            </div>

            <div class="order-group">
                <label for="phone" class="order-label">Số điện thoại</label>
                <input id="phone" type="text" value="<?php echo $user['dienthoai'] ?>" name="phone" class="order-control">
            </div>

            <div class="order-group">
                <label for="email" class="order-label">Email</label>
                <input id="email" type="text" value="<?php echo $user['email'] ?>" name="email" class="order-control">
            </div>

            <div class="order-group">
                <label for="address" class="order-label">Địa chỉ</label>
                <input id="address" type="text" value="<?php echo $user['diachi'] ?>" name="address" class="order-control">
            </div>

            <div class="order-group">
                <label for="note" class="order-label">Ghi chú</label>
                <textarea id="note" cols="30" rows="10" name="note" class="order-note"></textarea>
            </div>

            <div class="order-action">
                <button class="order-btn" name="dathang">Đặt hàng</button>
            </div>
        </form>
        <div class="col l-2"></div>
    </div>
</div>
<?php
    } else {
?>
    <p class="order-alert">
        Vui lòng đăng nhập để đặt hàng
        <a href="index.php?quanly=dangnhap">Đăng nhập</a>
    </p>
<?php
    } 
?>
<?php
    } else {
?>
<div class="cart-no-cart-img">
    <img src="./assets/images/no_cart.webp">
</div>
<?php
    } 
?>