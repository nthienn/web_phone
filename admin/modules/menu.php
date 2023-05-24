<?php 
    if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
        unset($_SESSION['dangnhap']);
        header("Location:login.php");
    }
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Quản Lý Danh Mục
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?action=quanlydanhmucsanpham&query=them" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Danh Mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?action=quanlydanhmucsanpham&query=lietke" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liệt Kê Danh Mục</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="index.php?action=quanlytaikhoan&query=lietke" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản Lý Tài Khoản
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?action=quanlytaikhoancanhan&query=them" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Thông Tin Cá Nhân
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?dangxuat=1" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Đăng Xuất
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>