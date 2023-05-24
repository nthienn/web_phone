<?php
    if (isset($_GET['trang'])) {
        $page = $_GET['trang'];
    } else {
        $page = 1;
    }
    if ($page == '' || $page == 1) {
        $begin = 0;
    } else {
        $begin = ($page*15)-15;
    }
    $sql_pro = "SELECT * FROM tbl_sanpham ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,15";
    $query_pro = mysqli_query($mysqli, $sql_pro);
 ?>

<!-- Product -->
<div class="banner">
    <div class="banner-image">
        <span class="banner-control banner-prev">
            <i class="fa-solid fa-chevron-left"></i>
        </span>
        <span class="banner-control banner-next">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <img src="./assets/images/banner1.jpg" class="banner__img">
    </div>
    <div class="banner-list-img">
        <div>
            <img src="./assets/images/banner1.jpg">
        </div>
        <div>
            <img src="./assets/images/banner3.jpg">
        </div>
        <div>
            <img src="./assets/images/banner2.jpg">
        </div>
        <div>
            <img src="./assets/images/banner4.jpg">
        </div>
    </div>
</div>

<div class="home-product">
    <div class="row">
        <?php 
            while ($row = mysqli_fetch_array($query_pro)) {
        ?>
        <div class="col l-2-4">
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>" class="home-product-item">
                <img src="./seller/product/uploads/<?php echo $row['hinhanh'] ?>" class="home-product-item__img">
                <div class="home-product-info">
                    <h4 class="home-product-item__name"><?php echo $row['tensanpham'] ?></h4>
                    <div class="home-product-item__price">
                        <span><?php echo number_format($row['giasanpham'],0,',','.').' đ' ?></span>
                    </div>
                    <div class="home-product-item__origin">
                        <span><?php echo $row['diadiem'] ?></span>
                    </div>
                </div>
            </a>
        </div>
        <?php 
            } 
        ?>
    </div>
</div>

<?php
    $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham");
    $row_count = mysqli_num_rows($sql_trang);
    $trang = ceil($row_count/15);
?>

<!-- Pagination -->
<ul class="pagination home-product__pagination">
    <?php 
        for ($i=1; $i<=$trang; $i++) {
    ?>
    <li class="pagination-item">
        <a <?php if($i==$page){echo 'style="color: #fff;
        background-color: #ff641e"';} else {echo '';}  ?> href="index.php?trang=<?php echo $i ?>" class="pagination-item-link"><?php echo $i ?></a> 
    </li>
    <?php 
        } 
    ?>
</ul>

<script src="./js/banner.js"></script>