<?php
    $sql_lietke_dh = "SELECT * FROM tbl_order,tbl_taikhoan WHERE tbl_order.id_taikhoan=tbl_taikhoan.id_taikhoan AND tbl_order.id_seller='$user[id_taikhoan]' ORDER BY tbl_order.id_order DESC";
    $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<div class="product-management">
    <h3>Quản lý đơn hàng</h3>
    <table width="100%" style="border-collapse: collapse; text-align: center">
        <tr>
            <th>ID</th>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Tổng tiền</th>
            <th>Ghi chú</th>
            <th>Tình trạng</th>
            <th>Quản lý</th>
        </tr>
        <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke_dh)) {
                $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['code_order'] ?></td>
            <td><?php echo $row['tenkhachhang'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['dienthoai'] ?></td>
            <td><?php echo $row['diachi'] ?></td>
            <td><?php echo number_format($row['total'],0,',','.').' đ' ?></td>
            <td><?php echo $row['note'] ?></td>
            <td>
                <?php 
                    if ($row['status']==0) { 
                        echo 'Chờ xác nhận';
                    } elseif ($row['status']==1) { 
                        echo 'Xác nhận';
                    } elseif ($row['status']==2) { 
                        echo 'Đang giao hàng';
                    } elseif ($row['status']==3) { 
                        echo 'Đã giao hàng';
                    } else {
                        echo 'Hủy đơn hàng';
                    } 
                ?>
            </td>
            <td>
                <a href="index.php?quanly=duyetdonhang&idorder=<?php echo $row['id_order'] ?>">Xem chi tiết</a>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</div>