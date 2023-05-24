<div class="product-management">
    <h3>Đăng Tin Sản Phẩm</h3>
    <table width="100%" style="border-collapse: collapse;">
        <form method="POST" action="./seller/product/handle.php" enctype="multipart/form-data">
            <tr>
                <td>Tên sản phẩm</td>
                <td><input type="text" name="tensanpham"></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="hinhanh"></td>
            </tr>
            <tr>
                <td>Hình ảnh chi tiết (Tối đa 3 hình ảnh)</td>
                <td><input type="file" name="images[]" multiple="multiple"></td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td><input type="text" name="giasanpham"></td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td><input type="number" name="soluong"></td>
            </tr>
            <tr>
                <td>Danh mục sản phẩm</td>
                <td>
                    <select name="danhmuc">
                        <?php 
                            $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc ASC";
                            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                        ?>
                        <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Địa điểm</td>
                <td><input type="text" name="diadiem"></td>
            </tr>
            <tr>
                <td>Nội dung</td>
                <td><textarea rows="10" cols="30" name="noidung"></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><button name="themsanpham">Thêm Sản Phẩm</button></td>
            </tr>
        </form>
    </table>
</div>