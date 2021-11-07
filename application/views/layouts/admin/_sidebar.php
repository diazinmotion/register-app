<div class="nav-left-sidebar sidebar-dark">
  <div class="menu-list">
    <div class="pl-4 pr-4 pt-4">
      <b class="clearfix"><?php echo get_account_info('full_name') ?></b>
      <small>EMAIL: <?php echo get_account_info('email') ?></small>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="d-xl-none d-lg-none" href="#">Beranda</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav flex-column">
          <li class="nav-divider">
            Main Menu
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>"><i class="fa fa-fw fa-home"></i>Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('pengguna') ?>"><i class="fa fa-fw fa-users"></i>Pengguna Terdaftar</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10"><i class="fas fa-f fa-folder"></i>Menu Level</a>
            <div id="submenu-10" class="collapse submenu" style="">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link" href="#">Level 1</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11" aria-controls="submenu-11">Level 2</a>
                  <div id="submenu-11" class="collapse submenu" style="">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link" href="#">Level 1</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Level 2</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Level 3</a>
                </li>
              </ul>
            </div>
          </li> -->
        </ul>
      </div>
    </nav>
  </div>
</div>