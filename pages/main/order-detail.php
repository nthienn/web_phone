<?php
    $sql_xemchitiet = "SELECT * FROM tbl_order_detail,tbl_sanpham WHERE tbl_order_detail.id_sanpham=tbl_sanpham.id_sanpham AND tbl_order_detail.id_order='$_GET[idorder]' ORDER BY tbl_order_detail.id_order_detail DESC";
    $query_xemchitiet = mysqli_query($mysqli, $sql_xemchitiet);
?>

<div class="bill-detail">
    <h3>Chi Tiết Đơn Hàng:</h3>
    <table width="100%" style="border-collapse: collapse; text-align: center">
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
        </tr>
        <?php 
            $i = 0;
            while ($row = mysqli_fetch_array($query_xemchitiet)) {
                $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['tensanpham'] ?></td>
            <td><?php echo number_format($row['giasanpham'],0,',','.').' đ' ?></td>
            <td><?php echo $row['quantity'] ?></td>
        </tr>
        <?php
            }
        ?>
    </table>

    <div class="bill-detail-alert">
        <a href="index.php?quanly=lichsudonhang">Quay lại lịch sử đơn hàng?</a>
    </div>
</div>