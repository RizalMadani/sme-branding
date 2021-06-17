<!-- Top Bar Start -->
<div class="topbar">

<nav class="navbar-custom">

  <ul class="list-inline float-right mb-0 mr-3">

    <li class="list-inline-item dropdown notification-list">
      <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
        aria-expanded="false">
        <!-- Sementara pakai ini, ganti dg yg di bawah jika sdh ada db -->
        <?php if ($this->session->foto_user){ ?>
          <img src="<?= base_url(); ?>uploads/foto_user/<?=$this->session->foto_user; ?>" alt="user" class="rounded-circle img-thumbnail">
        <?php }else{ ?>
        <img src="<?= base_url(); ?>uploads/foto_user/umkm.png" alt="user" class="rounded-circle img-thumbnail">
      <?php } ?>
      </a>
      <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
        <!-- item-->
        <div class="dropdown-item noti-title">
          <h5>Welcome</h5>
        </div>
        <a class="dropdown-item" href="#">
          <i class="mdi mdi-account-circle m-r-5 text-muted"></i>Profil</a>
        <a class="dropdown-item" href="<?= base_url(); ?>logout">
          <i class="mdi mdi-logout m-r-5 text-muted"></i>Logout</a>
      </div>
    </li>
  </ul>

  <ul class="list-inline menu-left mb-0">
    <li class="float-left">
      <button class="button-menu-mobile open-left waves-light waves-effect">
        <i class="mdi mdi-menu"></i>
      </button>
    </li>
  </ul>

  <div class="clearfix"></div>

</nav>

</div>
<!-- Top Bar End -->
