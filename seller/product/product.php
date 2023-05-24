<?php
    $sql_lietke_sp = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_taikhoan='$user[id_taikhoan]' ORDER BY id_sanpham ASC";
    $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
    $sql_lietke_dm = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_taikhoan='$user[id_taikhoan]'";
    $query_lietke_dm = mysqli_query($mysqli, $sql_lietke_dm);
?>
<div class="product-management">
    <h3>Liệt kê sản phẩm bán</h3>
    <table width="100%" style="border-collapse: collapse; text-align: center">
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá sản phẩm</th>
            <th>Số lượng</th>
            <th>Danh mục</th>
            <th>Địa điểm</th>
            <th>Nội dung</th>
            <th>Quản lý</th>
        </tr>
        <?php 
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke_sp)) {
                if ($row_dm = mysqli_fetch_array($query_lietke_dm)) {
                    $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['tensanpham'] ?></td>
            <td><img src="./seller/product/uploads/<?php echo $row['hinhanh'] ?>" width="100px"></td>
            <td><?php echo number_format($row['giasanpham'],0,',','.').' đ' ?></td>
            <td><?php echo $row['soluong'] ?></td>
            <td><?php echo $row_dm['tendanhmuc'] ?></td>
            <td><?php echo $row['diadiem'] ?></td>
            <td><?php echo $row['noidung'] ?></td>
            <td>
                <a href="index.php?quanly=suasanpham&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a> | <a href="./seller/product/handle.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xóa</a>
            </td>
        </tr>
        <?php
                }
            }
        ?>
    </table>
</div>