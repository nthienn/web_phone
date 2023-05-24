<?php
    if (isset($_GET['trang'])) {
        $page = $_GET['trang'];
    } else {
        $page = 1;
    }
    if ($page == '' || $page == 1) {
        $begin = 0;
    } else {
        $begin = ($page*50)-50;
    }
    
    if (isset($_POST['timkiem'])) {
        $tukhoa = $_POST['tukhoa'];
    } else {
        $tukhoa = '';
    }
    $sql_product = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.tensanpham LIKE '%$tukhoa%' ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,50";
    $query_product = mysqli_query($mysqli, $sql_product);
 ?>

<!-- Product -->
<div class="home-product">
    <h3>Từ khóa tìm kiếm: <?php echo $_POST['tukhoa'] ?></h3>
    <div class="row">
        <?php 
            while ($row_product = mysqli_fetch_array($query_product)) {
        ?>
        <div class="col l-2-4">
            <a href="index.php?quanly=sanpham&id=<?php echo $row_product['id_sanpham'] ?>" class="home-product-item">
                <img src="./seller/product/uploads/<?php echo $row_product['hinhanh'] ?>" class="home-product-item__img">
                <div class="home-product-info">
                    <h4 class="home-product-item__name"><?php echo $row_product['tensanpham'] ?></h4>
                    <div class="home-product-item__price">
                        <span><?php echo number_format($row_product['giasanpham'],0,',','.').' đ' ?></span>
                    </div>
                    <div class="home-product-item__origin">
                        <span><?php echo $row_product['diadiem'] ?></span>
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
    $trang = ceil($row_count/50);
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