<!-- Category -->
<div class="category">
    <ul class="category-list">
        <?php
            $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc ASC";
            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
            while ($row = mysqli_fetch_array($query_danhmuc)) {
        ?>
        <li class="category-item">
            <a href="index.php?quanly=danhmuc&id=<?php echo $row['id_danhmuc'] ?>" class="category-link">
                <img src="./admin/modules/category/uploads/<?php echo $row['hinhanh'] ?>" class="category-img">
                <span class="category-name"><?php echo $row['tendanhmuc'] ?></span>
            </a>
        </li>
        <?php
            }
        ?>
    </ul>
</div>
                
