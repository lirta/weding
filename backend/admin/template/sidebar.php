<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Samudra Wedding</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../assets/admin/<?php echo"$_SESSION[foto]"; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo "$_SESSION[name]";?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="profile.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <?php 
              if ($_SESSION['rules'] == "super") { ?>
                
                <li class="nav-item">
                  <a href="admin.php" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                      Admin
                    </p>
                  </a>
                </li>
             <?php }
          ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Paket
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="paket.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paket</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="paket-item.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Item Paket</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                pesanan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pesanan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pesanan Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pesanan-proses.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pesanan Proses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pesanan-selesai.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pesanan Selesai</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pelanggan.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Pelanggan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../logout.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      </div>
    <!-- /.sidebar -->
  </aside>