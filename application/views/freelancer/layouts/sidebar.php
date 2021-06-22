<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
  <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
    <i class="mdi mdi-close"></i>
  </button>

  <!-- LOGO -->
  <div class="topbar-left">
    <div class="text-center">
      <a href="index.html" class="logo">
        <img src="<?= base_url(); ?>assets/logos/logo-horizontal.png" alt="logo SME Branding" class="logo-large">
      </a>
    </div>
  </div>

  <div class="sidebar-inner slimscrollleft" id="sidebar-main">

    <div id="sidebar-menu">
      <ul>
        <li class="menu-title">Menu Freelancer</li>

        <li>
          <a href="<?=base_url()?>Dasbor" class="waves-effect">
            <i class="mdi mdi-view-dashboard"></i>
            <span> Dashboard
              <span class="badge badge-pill badge-primary float-right">7</span>
            </span>
          </a>
        </li>

        <li>
          <a href="<?=base_url()?>freelancer/Portofolio" class="waves-effect">
            <i class="mdi mdi-file-document"></i>
            <span> Portofolio
            </span>
          </a>
        </li>

        <li class="has_sub">
          <a href="javascript:void(0);" class="waves-effect">
            <i class="mdi mdi-clipboard"></i>
            <span> Kelola Pekerjaan </span>
            <span class="float-right">
              <i class="mdi mdi-chevron-right"></i>
            </span>
          </a>
          <ul class="list-unstyled">
            <li>
              <a href="<?=base_url()?>freelancer/Pekerjaan/OnGoing">Pekerjaan On Going</a>
            </li>
            <li>
              <a href="<?=base_url()?>freelancer/Pekerjaan/History">Riwayat Pekerjaan</a>
            </li>
          </ul>
        </li>

      </ul>
    </div>
    <div class="clearfix"></div>
  </div>
  <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->
