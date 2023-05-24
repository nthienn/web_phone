<?php
    $sql_xemchitiet = "SELECT * FROM tbl_order_detail,tbl_sanpham WHERE tbl_order_detail.id_sanpham=tbl_sanpham.id_sanpham AND tbl_order_detail.id_order='$_GET[idorder]' ORDER BY tbl_order_detail.id_order_detail ASC";
    $query_xemchitiet = mysqli_query($mysqli, $sql_xemchitiet);
    $query_status = mysqli_query($mysqli, "SELECT * FROM tbl_order WHERE tbl_order.id_order='$_GET[idorder]'");
    $row_status = mysqli_fetch_array($query_status);
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
        mysqli_query($mysqli, "UPDATE tbl_order SET status='$status' WHERE id_order='$_GET[idorder]'");
        echo "<script> window.location.href='index.php?quanly=donhang' </script>";
    }
?>
<div class="product-management">
    <h3>Chi Tiết Đơn Hàng</h3>
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
        <form action="" method="POST">
        <tr>
            <td>&nbsp;</td>
            <td colspan="3">
                Tình trạng
                <select name="status">
                    <?php 
                        if ($row_status['status']==0) {
                    ?>
                    <option value="0" selected>Chờ xác nhận</option>
                    <option value="1">Xác nhận</option>
                    <option value="2">Đang giao hàng</option>
                    <option value="3">Đã giao hàng</option>
                    <option value="4">Hủy đơn hàng</option>
                    <?php
                        } elseif ($row_status['status']==1) {
                    ?>
                    <option value="0">Chờ xác nhận</option>
                    <option value="1" selected>Xác nhận</option>
                    <option value="2">Đang giao hàng</option>
                    <option value="3">Đã giao hàng</option>
                    <option value="4">Hủy đơn hàng</option>
                    <?php
                        } elseif ($row_status['status']==2) {
                    ?>
                    <option value="0">Chờ xác nhận</option>
                    <option value="1">Xác nhận</option>
                    <option value="2" selected>Đang giao hàng</option>
                    <option value="3">Đã giao hàng</option>
                    <option value="4">Hủy đơn hàng</option>
                    <?php
                        } elseif ($row_status['status']==3) {
                    ?>
                    <option value="0">Chờ xác nhận</option>
                    <option value="1">Xác nhận</option>
                    <option value="2">Đang giao hàng</option>
                    <option value="3" selected>Đã giao hàng</option>
                    <option value="4">Hủy đơn hàng</option>
                    <?php
                        } else {
                    ?>
                    <option value="0">Chờ xác nhận</option>
                    <option value="1">Xác nhận</option>
                    <option value="2">Đang giao hàng</option>
                    <option value="3">Đã giao hàng</option>
                    <option value="4" selected>Hủy đơn hàng</option>
                    <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="5"><button>Cập nhật</button></td>
        </tr>
        </form>
    </table>
</div>