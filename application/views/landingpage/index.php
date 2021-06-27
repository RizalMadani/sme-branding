<?php $this->load->view('templates/landingpage/header'); ?>
<?php $this->load->view('templates/landingpage/nav'); ?>

<!-- Triangle Image -->
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    viewBox="0 0 600 480" style="enable-background:new 0 0 600 480;" xml:space="preserve" class="triangle-img triangle-img--align-right">
  <g>
    <path class="st0" d="M232.16,108.54,76.5,357.6C43.2,410.88,81.5,480,144.34,480H455.66c62.83,0,101.14-69.12,67.84-122.4L367.84,108.54C336.51,58.41,263.49,58.41,232.16,108.54Z" fill="url(#img1)" />
    <path class="st0" d="M232.16,108.54,76.5,357.6C43.2,410.88,81.5,480,144.34,480H455.66c62.83,0,101.14-69.12,67.84-122.4L367.84,108.54C336.51,58.41,263.49,58.41,232.16,108.54Z" fill="url(#triangle-gradient)" fill-opacity="0.7" />
  </g>
  <defs>
    <pattern id="img1" patternUnits="userSpaceOnUse" width="500" height="500">
      <image xlink:href="assets/lp/img/hero/hero.jpg" x="50" y="70" width="500" height="500"></image>
    </pattern>

    <linearGradient id="triangle-gradient" y2="100%" x2="0" y1="50%" gradientUnits="userSpaceOnUse" >
    <stop offset="0" stop-color="#4C86E7"/>
    <stop offset="1" stop-color="#B939E5"/>
    </linearGradient>
  </defs>
</svg>


<div class="content-wrapper oh">

  <!-- Hero -->
  <section class="hero">

    <div class="container">
      <div class="row">
        <div class="col-lg-5 offset-lg-1">
          <div class="hero__text-holder">
            <h1 class="hero__title hero__title--boxed">SME Branding</h1>
            <p class="hero__subtitle">SME Branding adalah Layanan untuk memfasilitasi para UMKM untuk mengembangkan bidang branding, packaging, bisnis dan lain-lain yang sedang berjalan saat ini.</p>
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-10">
          <!-- Optin Form -->
          <div class="row justify-content-between align-items-center optin py-4">
            <h3 class="col-md-9 col-sm-12 optin__title m-0">Daftar sekarang atau lihat layanan dari kami terlebih dahulu</h3>
            <div class="col-md-3 col-sm-12">
              <a href="#layanan">
                <button class="btn btn--md btn--color btn--button">Lihat Layanan</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> <!-- end hero -->

  <!-- Service Boxes -->
  <section class="section-wrap pb-72 pb-lg-40" id="layanan">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <div class="title-row">
            <h2 class="section-title text-center">
              Apakah Anda ingin mengembangkan usaha UMKM Anda dan <span class="highlight">menambah pendapatan</span>? Kami tahu solusinya.
            </h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="feature box-shadow hover-up hover-line">
            <svg class="feature__icon"><use xlink:href="assets/lp/img/icons/orion-svg-sprite.svg#shipping-box-1"></use></svg>
            <h4 class="feature__title" title="Desain Ulang Kemasan atau Logo"><i lang="en">Redesign</i> Kemasan/Logo</h4>
            <p class="feature__text">Buat produk Anda lebih menarik dan mudah dikenali konsumen Anda.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="feature box-shadow hover-up hover-line">
            <svg class="feature__icon"><use xlink:href="assets/lp/img/icons/orion-svg-sprite.svg#business-report-1"></use></svg>
            <h4 class="feature__title">Konsultasi Bisnis</h4>
            <p class="feature__text">Butuh panduan untuk mengembangkan usaha Anda?</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="feature box-shadow hover-up hover-line">
            <svg class="feature__icon"><use xlink:href="assets/lp/img/icons/orion-svg-sprite.svg#add-1"></use></svg>
            <h4 class="feature__title">Lain-lain</h4>
            <p class="feature__text">Lihat lebih banyak <a href="<?= base_url(); ?>layanan">layanan dari kami</a> sesuai kebutuhan Anda.</p>
          </div>
        </div>
      </div>
    </div>
  </section> <!-- end service boxes -->

  <!-- Promo Section -->
  <section class="section-wrap promo-section promo-section--pb-large pt-lg-40">

    <!-- Triangle Image -->
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        viewBox="0 0 600 480" style="enable-background:new 0 0 600 480;" xml:space="preserve" class="triangle-img triangle-img--align-left">
      <g>
        <path class="st0" d="M232.16,108.54,76.5,357.6C43.2,410.88,81.5,480,144.34,480H455.66c62.83,0,101.14-69.12,67.84-122.4L367.84,108.54C336.51,58.41,263.49,58.41,232.16,108.54Z" fill="url(#img2)" />
      </g>
      <defs>
        <pattern id="img2" patternUnits="userSpaceOnUse" width="600" height="600">
          <image xlink:href="assets/lp/img/promo/promo_img_1.jpg" width="600" height="600"></image>
        </pattern>
      </defs>
    </svg>

    <div class="container">
      <div class="row justify-content-end">
        <div class="col-lg-6">
          <h2 class="promo-section__title promo-section__title--boxed">Freelancer</h2>
          <p class="promo-section__text lead">Halo! Buat kamu para freelancer atau yang ke bingung mencari pekerjaan. Nah kami dari SMEsPedia menyediakan layanan SME Branding untuk para UMKM yang nanti nya akan di kerjakan oleh para freelancer yang bergabung di SMEsPedia. Jadi tunggu apalagi yukk buruan daftar...</p>
          <a href="regFreelancer" class="btn btn--lg btn--color btn--icon">
            <span>Daftar</span>
            <i class="ui-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </section> <!-- end promo section -->

  <?php if ( ! empty($testimoni)): ?>
  <!-- Testimonials -->
  <section class="section-wrap bg-color">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="title-row">
            <h2 class="section-title">Testimoni</h2>
            <p class="subtitle">Apa kata mereka tentang SME Branding.</p>
          </div>

          <div id="owl-testimonials" class="owl-carousel owl-theme owl-carousel--arrows-outside">

            <?php foreach($testimoni as $t): ?>
            <div class="testimonial clearfix">
              <div class="testimonial__info">
                <span class="testimonial__author"><?= $t->nama; ?></span>
                <span class="testimonial__company"><?= $t->nama_umkm; ?></span>
              </div>
              <div class="testimonial__body">
                <p class="testimonial__text"><?= $t->detail_testimoni; ?></p>
                <div class="testimonial__rating">
                  <i class="ui-star"></i>
                  <i class="ui-star"></i>
                  <i class="ui-star"></i>
                  <i class="ui-star"></i>
                  <i class="ui-star-empty"></i>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
            
          </div> <!-- end owl-carousel -->
        </div>
      </div>
    </div>
  </section> <!-- end testimonials -->
  <?php endif; ?>

  <!-- From Blog -->
  <section class="section-wrap">
    <div class="container">
      <div class="title-row title-row--boxed text-center">
        <h2 class="section-title">Hasil Desain</h2>
        <p class="subtitle">Contoh desain yang dibuat oleh desainer dari kami.</p>
      </div>
      <div class="row">

        <div class="col-lg-4">
          <div class="entry box-shadow hover-up">
            <div class="entry__img-holder card__img-holder">
              <img src="assets/lp/img/hasil_desain/hasil_desain 1.jpeg" class="entry__img" alt="Contoh desain rebranding">
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="entry box-shadow hover-up">
            <div class="entry__img-holder card__img-holder">
              <img src="assets/lp/img/hasil_desain/hasil_desain 6.jpg" class="entry__img" alt="Contoh desain rebranding">
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="entry box-shadow hover-up">
            <div class="entry__img-holder card__img-holder">
              <img src="assets/lp/img/hasil_desain/hasil_desain 2.jpeg" class="entry__img" alt="Contoh desain rebranding">
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="entry box-shadow hover-up">
            <div class="entry__img-holder card__img-holder">
              <img src="assets/lp/img/hasil_desain/hasil_desain 5.jpg" class="entry__img" alt="Contoh desain rebranding">
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="entry box-shadow hover-up">
            <div class="entry__img-holder card__img-holder">
              <img src="assets/lp/img/hasil_desain/hasil_desain 4.png" class="entry__img" alt="Contoh desain rebranding">
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="entry box-shadow hover-up">
            <div class="entry__img-holder card__img-holder">
              <img src="assets/lp/img/hasil_desain/hasil_desain 8.jpg" class="entry__img" alt="Contoh desain rebranding">
            </div>
          </div>
        </div>

      </div>
    </div>
  </section> <!-- end from blog -->

  <!-- Partners -->
  <section class="section-wrap section-wrap--pb-large bg-gradient" style="background-image: url(assets/lp/img/partners/map.png);">
    <div class="container">
      <div class="title-row title-row--boxed text-center">
        <h2 class="section-title">Ikut bersama yang lainnya yang telah bergabung ke SME Branding</h2>
        <p class="subtitle">A platform to start your best decision.</p>
      </div>
      <div class="row justify-content-center text-center">
        <div class="col-lg-10">
          <div class="row pb-48">
            <div class="col-md col-sm-6">
              <div class="statistik-wrapper">
                <span class="angka-statistik">80</span>
                <span class="ket-statistik">UMKM</span>
              </div>
            </div>
            <div class="col-md col-sm-6">
              <div class="statistik-wrapper">
                <span class="angka-statistik">20+</span>
                <span class="ket-statistik">Desainer</span>
              </div>
            </div>
            <div class="col-md col-sm-6">
              <div class="statistik-wrapper">
                <span class="angka-statistik">120</span>
                <span class="ket-statistik">Pesanan Dilayani</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> <!-- end partners -->

  <!-- CTA -->
  <div class="container offset-top-152 pt-sm-48" id="daftar">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="call-to-action box-shadow-large text-center">
          <div class="call-to-action__container">
            <h3 class="call-to-action__title">
              Mari mulai mengambil langkah yang terbaik
            </h3>
            <a href="regUmkm" class="btn btn--lg btn--color m-2">
              <span>Daftar UMKM</span>
            </a>

            <a href="regFreelancer" class="btn btn--lg btn--color m-2">
              <span>Daftar Freelance</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- end cta -->

<?php $this->load->view('templates/landingpage/footer'); ?>
