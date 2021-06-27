<!-- Top Bar Start -->
<div class="topbar">

<nav class="navbar-custom">
  <div class="dropdown notification-list nav-pro-img">

    <div class="list-inline-item hide-phone app-search">

    </div>
  </div>

  <ul class="list-inline float-right mb-0 mr-3">
    <!-- language-->
    <li class="list-inline-item dropdown notification-list">
      <!-- <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
        aria-expanded="false">
        <i class="mdi mdi-bell noti-icon"></i>
        <span class="badge badge-success a-animate-blink noti-icon-badge">3</span>
      </a> -->
      <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
        <!-- item-->
        <div class="dropdown-item noti-title">
          <h5>
            <span class="badge badge-danger float-right">87</span>Notification</h5>
        </div>

        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item notify-item">
          <div class="notify-icon bg-primary">
            <i class="mdi mdi-cart-outline"></i>
          </div>
          <p class="notify-details">
            <b>Your order is placed</b>
            <small class="text-muted">Dummy text of the printing and typesetting industry.</small>
          </p>
        </a>

        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item notify-item">
          <div class="notify-icon bg-success">
            <i class="mdi mdi-message"></i>
          </div>
          <p class="notify-details">
            <b>New Message received</b>
            <small class="text-muted">You have 87 unread messages</small>
          </p>
        </a>

        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item notify-item">
          <div class="notify-icon bg-warning">
            <i class="mdi mdi-martini"></i>
          </div>
          <p class="notify-details">
            <b>Your item is shipped</b>
            <small class="text-muted">It is a long established fact that a reader will</small>
          </p>
        </a>

        <!-- All-->
        <a href="javascript:void(0);" class="dropdown-item notify-item">
          View All
        </a>

      </div>
    </li>

    <li class="list-inline-item dropdown notification-list">
      <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
        aria-expanded="false">
        <!-- Sementara pakai ini, ganti dg yg di bawah jika sdh ada db -->
        <?php if ($this->session->foto_user){ ?>
          <img src="<?= base_url(); ?>uploads/foto_user/<?=$this->session->foto_user; ?>" alt="foto profil" class="rounded-circle img-thumbnail">
        <?php }else{ ?>
        <img src="<?= base_url(); ?>uploads/foto_user/admin.png" alt="user" class="rounded-circle img-thumbnail">
      <?php } ?>
      </a>
      <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
        <!-- item-->
        <div class="dropdown-item noti-title">
          <h5>Welcome</h5>
        </div>
        <a class="dropdown-item" href="<?=base_url()?>pengelola/Profil">
          <i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
        <a class="dropdown-item" href="<?= base_url(); ?>logout">
          <i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
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
