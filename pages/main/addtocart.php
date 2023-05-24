<?php
    session_start();
    include('../../admin/config/config.php');
    
    if (isset($_POST['themgiohang'])) {
        $id = $_GET['idsanpham'];
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$id' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            $product = mysqli_fetch_assoc($query);
            $item = ['id'=>$id,'tensanpham'=>$product['tensanpham'],'hinhanh'=>$product['hinhanh'],'giasanpham'=>$product['giasanpham'],'quantity'=>1];
        }
        if (isset($_SESSION['cart'][$id])) {
            if ($_SESSION['cart'][$id]['quantity'] >= $product['soluong']) {
                $_SESSION['cart'][$id]['quantity'] = $product['soluong'];
            } else {
                $_SESSION['cart'][$id]['quantity'] += 1;
            }
        } else {
            $_SESSION['cart'][$id] = $item;
        }
        header('Location:../../index.php?quanly=giohang');
    }
    if (isset($_SESSION['cart']) && $_GET['xoa']) {
        $id = $_GET['xoa'];
        foreach ($_SESSION['cart'] as $cart_item) {
            if ($cart_item['id']!=$id) {
                $product [] = array('id'=>$cart_item['id'],'tensanpham'=>$cart_item['tensanpham'],'hinhanh'=>$cart_item['hinhanh'],'giasanpham'=>$cart_item['giasanpham'],'quantity'=>$cart_item['quantity']);
            }
            $_SESSION['cart'] = $product;
            header('Location:../../index.php?quanly=giohang');
        }
    }
    if (isset($_GET['xoatatca']) && $_GET['xoatatca']==1) {
        unset($_SESSION['cart']);
        header('Location:../../index.php?quanly=giohang');
    }
?>