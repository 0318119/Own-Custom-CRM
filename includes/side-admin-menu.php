  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <!-- <span class="brand-text font-weight-light">AdminLTE 3</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <?php
        include '../includes/config.php';
        if(isset($_SESSION['unique_id']))
        {
          $sql = "SELECT username,img,status FROM adminlogin WHERE unique_id = {$_SESSION['unique_id']}";
          $sql_run = mysqli_query($con, $sql);
          if(mysqli_num_rows($sql_run)>0){
          $row = mysqli_fetch_assoc($sql_run);
          ($row['status'] == "Login" || "SignUp") ? $offline = "<i class='fas fa-circle online'></i>" : $offline = "<i class='fas fa-circle offline'></i>";
            
        }
      }
        ?>
        <div class="image">
          <img src="../signup-data/adminimg/<?php echo $row['img'];?>" class="img-fluid elevation-2">
        </div>
        <div class="info">
          <span><?php echo $offline; ?></span>
          <a href="#" class="d-block"><?php echo $row['username'];?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Customers</p>
                </a>
              </li>
              <li class="nav-item">
                    <a href="./index.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contacts</p>
                    </a>
              </li>
              <li class="nav-item">
                <a href="./index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trash</p>
                </a>
              </li>
            </ul>
        </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Mail Box
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sent</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Drafts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trash</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="./index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Chart Box</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="./index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Timeline</p>
            </a>
          </li>
          
          <!-- <li class="nav-header">EXAMPLES</li> -->
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>

          <?php 
            if(isset($_SESSION['unique_id'])){
              $sql = "SELECT unique_id FROM adminlogin WHERE unique_id = {$_SESSION['unique_id']}";
              $sql_run = mysqli_query($con, $sql);
              if(mysqli_num_rows($sql_run)>0){
              $row = mysqli_fetch_assoc($sql_run);          
              }
            }
          ?>

          <li class="nav-item">
            <a href="logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              Logout
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>