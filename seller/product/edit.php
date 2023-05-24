<?php
    $sql_sua_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
    $query_sua_sanpham = mysqli_query($mysqli, $sql_sua_sanpham);
    $img_pro = mysqli_query($mysqli, "SELECT * FROM tbl_thuvienanh WHERE id_sanpham='$_GET[idsanpham]'");
?>
<div class="product-management">
    <h3>Sửa sản phẩm</h3>
    <table width="100%" style="border-collapse: collapse;">
        <form method="POST" action="./seller/product/handle.php?idsanpham=<?php echo $_GET['idsanpham'] ?>" enctype="multipart/form-data">
            <?php 
                while($row = mysqli_fetch_array($query_sua_sanpham)) {
            ?>
            <tr>
                <td>Tên sản phẩm</td>
                <td><input type="text" value="<?php echo $row['tensanpham'] ?>" name="tensanpham"></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td>
                    <img src="./seller/product/uploads/<?php echo $row['hinhanh'] ?>" width="100px">
                    <input type="file" name="hinhanh">
                </td>
            </tr>
            <tr>
                <td>Hình ảnh chi tiết (Tối đa 3 hình ảnh)</td>
                <td>
                    <?php
                        foreach ($img_pro as $key => $value) {
                    ?>
                    <img src="./seller/product/uploads/<?php echo $value['hinhanh'] ?>" width="100px">
                    <?php 
                        } 
                    ?>
                    <input type="file" name="images[]" multiple="multiple">
                </td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td><input type="text" value="<?php echo $row['giasanpham'] ?>" name="giasanpham"></td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td><input type="number" value="<?php echo $row['soluong'] ?>" name="soluong"></td>
            </tr>
            <tr>
                <td>Danh mục sản phẩm</td>
                <td>
                    <select name="danhmuc">
                        <?php 
                            $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc ASC";
                            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                                if ($row_danhmuc['id_danhmuc'] == $row['id_danhmuc']) {
                        ?>
                        <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                        <?php
                                } else {  
                        ?>
                        <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                        <?php 
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Địa điểm</td>
                <td><input type="text" value="<?php echo $row['diadiem'] ?>" name="diadiem"></td>
            </tr>
            <tr>
                <td>Nội dung</td>
                <td><textarea cols="30" rows="10" name="noidung" style="resize: none"><?php echo $row['noidung'] ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><button name="suasanpham">Cập Nhật Sản Phẩm</button></td>
            </tr>
            <?php
                }
            ?>
        </form>
    </table>
</div>