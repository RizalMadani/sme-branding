<!DOCTYPE html>
<html lang="id">
<head>
  <title>SME Branding</title>

  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="Platform Layanan Re-branding untuk UMKM">
  <meta name="theme-color" content="#ffffff">
  
  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700' rel='stylesheet'>

  <!-- Css -->
  <link rel="stylesheet" href="assets/lp/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/lp/css/font-icons.css" />
  <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" /> -->
  <link rel="stylesheet" href="assets/lp/css/style.css" />

  <!-- Favicons -->
  <link rel="shortcut icon" href="assets/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="assets/favicons/android-icon-192x192.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/favicons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/favicons/apple-icon-180x180.png">
  <link rel="manifest" href="assets/manifest.json">

</head>

<body>

  <!-- Preloader -->
  <div class="loader-mask">
    <div class="loader">
      "Loading..."
    </div>
  </div>

  <main class="main-wrapper">

    <!-- Navigation -->
    <header class="nav">
      <div class="nav__holder nav--sticky">
        <div class="container-fluid container-semi-fluid nav__container">
          <div class="flex-parent">

            <div class="nav__header">
              <!-- Logo -->
              <a href="index.html" class="logo-container flex-child">
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
