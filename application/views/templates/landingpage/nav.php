<!-- Navigation -->
<header class="nav">
  <div class="nav__holder nav--sticky">
    <div class="container-fluid container-semi-fluid nav__container">
      <div class="flex-parent">

        <div class="nav__header">
          <!-- Logo -->
          <a href="<?= base_url(); ?>" class="logo-container flex-child">
            <img class="logo" src="assets/logos/logo-horizontal.png" style="height: 48px;">
          </a>

          <!-- Mobile toggle -->
          <button type="button" class="nav__icon-toggle" id="nav__icon-toggle" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="nav__icon-toggle-bar"></span>
            <span class="nav__icon-toggle-bar"></span>
            <span class="nav__icon-toggle-bar"></span>
          </button> 
        </div>                      

        <!-- Navbar -->
        <nav id="navbar-collapse" class="nav__wrap collapse navbar-collapse">
          <ul class="nav__menu">
            <li>
              <a href="<?= base_url(); ?>">Beranda</a>
            </li>
            <li>
              <a href="layanan">Layanan</a>
            </li>
            <li>
              <a href="tentang">Tentang</a>
            </li>
            <li>
              <a href="kontak">Kontak</a>
            </li>
            <!-- <li class="nav__dropdown">
              <a href="blog.html">Mendaftar</a>
              <i class="ui-arrow-down nav__dropdown-trigger"></i>
              <ul class="nav__dropdown-menu">
                <li><a href="blog.html">Sebagai UMKM</a></li>
                <li><a href="single-post.html">Sebagai Freelancer</a></li>
              </ul>
            </li> -->
            <li>
              <a href="login">Login</a>
            </li>
          </ul> <!-- end menu -->
        </nav> <!-- end nav-wrap -->

        <div class="nav__btn-holder nav--align-right">
          <a href="<?= base_url(); ?>#daftar" class="btn nav__btn">
            <span class="nav__btn-text">Daftar Sekarang</span>
          </a>
          <!-- <div class="nav__btn-dropdown">
            <button class="btn nav__btn">Daftar Sekarang</button>
            <ul class="nav__dropdown-menu">
              <li><a href="blog.html">Sebagai UMKM</a></li>
              <li><a href="single-post.html">Sebagai Freelance</a></li>
            </ul>
          </div> -->
        </div>
    
      </div> <!-- end flex-parent -->
    </div> <!-- end container -->

  </div>
</header> <!-- end navigation -->
