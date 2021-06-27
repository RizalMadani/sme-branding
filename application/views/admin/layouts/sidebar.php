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
        <li class="menu-title">Menu Admin</li>

        <li>
          <a href="<?=base_url()?>Dasbor" class="waves-effect">
            <i class="mdi mdi-view-dashboard"></i>
            <span> Dashboard
              <!-- <span class="badge badge-pill badge-primary float-right">7</span> -->
            </span>
          </a>
        </li>

        <li class="has_sub">
          <a href="javascript:void(0);" class="waves-effect">
            <i class="mdi mdi-account-multiple"></i>
            <span> Kelola User </span>
            <span class="float-right">
              <i class="mdi mdi-chevron-right"></i>
            </span>
          </a>
          <ul class="list-unstyled">
            <li>
              <a href="<?=base_url()?>Pengelola/User/kelolaPengelola">Kelola Admin</a>
            </li>
            <li>
              <a href="<?=base_url()?>Pengelola/User/kelolaFreelancer">Kelola Freelancer</a>
            </li>
            <li>
              <a href="<?=base_url()?>Pengelola/User/kelolaUMKM">Kelola UMKM</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="<?=base_url()?>Pengelola/Layanan" class="waves-effect">
            <i class="mdi mdi-animation"></i>
            <span> Kelola Layanan
            </span>
          </a>
        </li>

        <li>
          <a href="<?=base_url()?>Pengelola/Testimoni" class="waves-effect">
            <i class="mdi mdi-wechat"></i>
            <span> Kelola Testimoni
            </span>
          </a>
        </li>

        <li class="has_sub">
          <a href="javascript:void(0);" class="waves-effect">
            <i class="mdi mdi-shopping"></i>
            <span> Kelola Pemesanan </span>
            <span class="float-right">
              <i class="mdi mdi-chevron-right"></i>
            </span>
          </a>
          <ul class="list-unstyled">
            <li>
              <a href="<?= base_url(); ?>Pengelola/Pemesanan/lihatPemesanan">Semua Order</a>
            </li>
            <li>
              <a href="<?= base_url(); ?>Pengelola/Pemesanan/lihatPemesanan/pending">Order Pending</a>
            </li>
            <li>
              <a href="<?= base_url(); ?>Pengelola/Pemesanan/lihatPemesanan/on-going">Order On Going</a>
            </li>
          </ul>
        </li>

        <li class="has_sub">
          <a href="javascript:void(0);" class="waves-effect">
            <i class="mdi mdi-tag-multiple"></i>
            <span> Kelola Transaksi </span>
            <span class="float-right">
                <i class="mdi mdi-chevron-right"></i>
            </span>
          </a>
          <ul class="list-unstyled">
            <li>
              <a href="<?=base_url()?>Pengelola/Transaksi/validasiOrder">Validasi Order UMKM</a>
            </li>
            <li>
              <a href="<?=base_url()?>Pengelola/Transaksi">Kelola Transaksi Order</a>
            </li>
          </ul>
        </li>

        <!-- <li class="has_sub">
          <a href="javascript:void(0);" class="waves-effect">
            <i class="mdi mdi-library-plus"></i>
            <span> Kelola Gaji </span>
            <span class="float-right">
              <i class="mdi mdi-chevron-right"></i>
            </span>
          </a>
          <ul class="list-unstyled">
            <li>
              <a href="charts-morris.html">Kelola Gaji Admin</a>
            </li>
            <li>
              <a href="charts-chartist.html">Kelola Gaji Freelancer</a>
            </li>
          </ul>
        </li> -->

        <!-- <li class="menu-title">Riwayat Pemesanan</li>

        <li>
          <a href="index.html" class="waves-effect">
            <i class="mdi mdi-folder"></i>
            <span> Riwayat Pemesanan
            </span>
          </a>
        </li>

        <li>
          <a href="index.html" class="waves-effect">
            <i class="mdi mdi-folder-download"></i>
            <span> Riwayat Transaksi
            </span>
          </a>
        </li> -->

      </ul>
    </div>
    <div class="clearfix"></div>
  </div>
  <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->
