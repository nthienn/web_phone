<?php
    $sql_chitiet = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_sanpham='$_GET[id]'";
    $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
    $img_pro = mysqli_query($mysqli,"SELECT * FROM tbl_thuvienanh WHERE id_sanpham='$_GET[id]'");
    $sql_seller = "SELECT * FROM tbl_sanpham,tbl_taikhoan WHERE tbl_sanpham.id_taikhoan=tbl_taikhoan.id_taikhoan AND tbl_sanpham.id_sanpham='$_GET[id]'";
    $query_seller = mysqli_query($mysqli, $sql_seller);
    while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>

<!-- Product details -->
<div class="product-detail">
    <div class="row">
        <div class="col l-5">
            <div class="product-detail-image">
                <span class="control prev">
                    <i class="fa-solid fa-chevron-left"></i>
                </span>
                <span class="control next">
                    <i class="fa-solid fa-chevron-right"></i>
                </span>
                <img src="" class="product-detail__img">
            </div>
            <div class="list-img">
                <div>
                    <img src="./seller/product/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
                </div>
                <?php
                    foreach ($img_pro as $key => $value) {
                ?>
                <div>
                    <img src="./seller/product/uploads/<?php echo $value['hinhanh'] ?>">
                </div>
                <?php 
                    } 
                ?>
            </div>
        </div>

        <div class="col l-7 product-detail-desc">
            <form method="POST" action="./pages/main/addtocart.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
                <div class="product-detail-info">
                    <h3 class="product-detail__name"><?php echo $row_chitiet['tensanpham'] ?></h3>
                    <div class="product-detail__price">
                        <span><?php echo number_format($row_chitiet['giasanpham'],0,',','.').' đ' ?></span>
                    </div>
                    <div class="product-detail__origin">
                        <i class="fa-solid fa-location-dot product-detail__icon"></i>
                        <span><?php echo $row_chitiet['diadiem'] ?></span>
                    </div>
                </div>

                <div class="product-detail-content">
                    <h3>Mô tả sản phẩm</h3>
                    <p><?php echo $row_chitiet['noidung'] ?></p>
                </div>
                
                <div class="product-detail-action">
                    <?php
                        if ($row_chitiet['soluong']>0) {
                    ?>
                    <button class="product-detail-add" name="themgiohang">
                        <i class="fa-solid fa-cart-plus"></i>
                        <span>Thêm Vào Giỏ Hàng</span>
                    </button>
                    <div class="product-detail__quantity">
                        <strong><?php echo $row_chitiet['soluong'] ?></strong>
                        <span>sản phẩm có sẵn</span>
                    </div>
                    <?php 
                        } else {
                    ?>
                    <div class="product-detail__quantity">
                        <span>Sản phẩm đã được bán</span>
                    </div>
                    <?php 
                        } 
                    ?>
                </div>
            </form>
            
            <?php
                if ($row_seller = mysqli_fetch_array($query_seller)) {
            ?>
            <div class="information-seller">
                <h4>Liên hệ với người bán</h4>
                <div class="information-seller-name">
                    <img src="./assets/images/avatar.png" alt="">
                    <p>
                        <span><?php echo $row_seller['tenkhachhang'] ?></span>
                        <!-- <a href="#">Xem trang cá nhân</a> -->
                    </p>
                </div>
                <div class="information-seller-phone">
                    <button class="information-seller-call">
                        <i class="fa-solid fa-phone"></i>
                        <span><?php echo $row_seller['dienthoai'] ?></span>
                    </button>
                </div>
            </div>
            <?php 
                } 
            ?>
        </div>
    </div>
    
    <div class="comments">
        <h2>Đánh giá</h2>
        <ul>
            <?php
                $sql_comment = "SELECT * FROM tbl_danhgia,tbl_taikhoan WHERE tbl_danhgia.id_taikhoan=tbl_taikhoan.id_taikhoan AND tbl_danhgia.id_sanpham='$_GET[id]' ORDER BY tbl_danhgia.id_danhgia DESC";
                $query_comment = mysqli_query($mysqli, $sql_comment);
                while ($row_comment = mysqli_fetch_array($query_comment)) {
            ?>
            <li class="comment">
                <div class="comment-user">
                    <img src="./assets/images/avatar.png" alt="">
                    <p>
                        <strong><?php echo $row_comment['tenkhachhang'] ?></strong>
                        <span><?php echo $row_comment['ngaydg'] ?></span>
                    </p>
                </div>
                <div class="comment-text">
                    <p><?php echo $row_comment['noidung'] ?></p>
                    <?php
                        if (isset($_SESSION['user'])) {
                            $user = $_SESSION['user'];
                            if ($row_comment['id_taikhoan']==$user['id_taikhoan']) {
                    ?>
                    <a href="./pages/main/comment.php?iddanhgia=<?php echo $row_comment['id_danhgia'] ?>&idsp=<?php echo $row_comment['id_sanpham'] ?>">Xóa</a>
                    <?php 
                            }
                        }
                    ?>
                </div>
            </li>
            <?php 
                } 
            ?>
        </ul>
        <?php
            if (isset($_SESSION['user'])) {
        ?>
        <form method="POST" action="./pages/main/comment.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>" class="comment-send">
            <input type="text" placeholder="Để lại bình luận của bạn" name="comment">
            <button name="send">Gửi đánh giá</button>
        </form>
        <?php 
            } else {
        ?>
        <p class="comment-alert">
            Vui lòng đăng nhập để gửi đánh giá
            <a href="index.php?quanly=dangnhap">Đăng nhập</a>
        </p>
        <?php 
            } 
        ?>
    </div>
</div>
<?php 
    } 
?>

<script src="./js/images.js"></script>