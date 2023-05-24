<?php 
    $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
    if (isset($_GET['dangxuat']) && $_GET['dangxuat']==1) {
        unset($_SESSION['user']);
        header('Location:index.php');
    }
?>

<header class="header">
    <div class="grid wide">
        <!-- Header navbar -->
        <div class="header__navbar">
            <div class="header__logo">
                <a href="index.php" class="header__logo-link">
                    <img src="./assets/images/logo.png" alt="" class="header__logo-img">
                </a>
            </div>

            <ul class="header__navbar-list">
                <li class="header__navbar-item">
                    <a href="index.php" class="header__navbar-item-link">
                        <i class="fa-solid fa-house header__navbar-icon"></i>
                        Trang chủ
                    </a>
                </li>
                <li class="header__navbar-item">
                    <a href="index.php?quanly=giohang" class="header__navbar-item-link">
                        <i class="fa-solid fa-cart-shopping header__navbar-icon"></i>
                        Giỏ hàng
                    </a>
                </li>
                <?php
                    if (isset($user['tenkhachhang'])) {
                ?>
                <li class="header__navbar-item">
                    <a href="#" class="header__navbar-item-link">
                        <i class="fa-solid fa-user header__navbar-icon"></i>
                        <?php echo $user['tenkhachhang'] ?>
                    </a>
                    <ul class="header__navbar-subnav">
                        <li class="header__subnav-item">
                            <a href="index.php?quanly=thongtincanhan" class="header__subnav-item-link">
                            Thông tin cá nhân
                            </a>
                        </li>
                        <li class="header__subnav-item">
                            <a href="index.php?quanly=lietkesanpham" class="header__subnav-item-link">
                            Quản lý sản phẩm bán
                            </a>
                        </li>
                        <li class="header__subnav-item">
                            <a href="index.php?quanly=donhang" class="header__subnav-item-link">
                            Quản lý đơn hàng
                            </a>
                        </li>
                        <li class="header__subnav-item">
                            <a href="index.php?quanly=lichsudonhang" class="header__subnav-item-link">
                            Lịch sử đơn hàng
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="header__navbar-item">
                    <a href="index.php?dangxuat=1" class="header__navbar-item-link">
                        <i class="fa-solid fa-right-from-bracket header__navbar-icon"></i>
                        Đăng xuất
                    </a>
                </li>
                <?php 
                    } else {
                ?>
                <li class="header__navbar-item">
                    <a href="index.php?quanly=dangnhap" class="header__navbar-item-link">
                        <i class="fa-solid fa-right-to-bracket header__navbar-icon"></i>
                        Đăng nhập
                    </a>
                </li>
                <li class="header__navbar-item">
                    <a href="index.php?quanly=dangky" class="header__navbar-item-link">
                        <i class="fa-solid fa-pen-to-square header__navbar-icon"></i>
                        Đăng ký
                    </a>
                </li>
                <?php 
                    }
                ?>
            </ul>
        </div>

        <!-- Header with search -->
        <div class="header-with-search">
            <div class="header__search">
                <form method="POST" action="index.php?quanly=timkiem">
                    <input type="text" class="header__search-input" placeholder="Xin chào, hôm nay bạn cần tìm gì?" name="tukhoa">
                    <button class="header__search-btn" name="timkiem">
                        <img src="./assets/images/search.png" class="header__search-img">
                    </button>
                </form>
            </div>
            <?php
                if (isset($user['tenkhachhang'])) {
            ?>
            <div class="header__post">
                <a href="index.php?quanly=themsanpham">
                    <span>Đăng tin</span>
                    <img src="./assets/images/edit.png" alt="" class="header__post-img">
                </a>
            </div>
            <?php 
                } else {
            ?>
            <div class="header__post">
                <a href="index.php?quanly=dangnhap">
                    <span>Đăng tin</span>
                    <img src="./assets/images/edit.png" alt="" class="header__post-img">
                </a>
            </div>
            <?php 
                }
            ?>
        </div>
    </div>
</header>