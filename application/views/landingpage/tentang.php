<?php $this->load->view('templates/landingpage/header'); ?>
<?php $this->load->view('templates/landingpage/nav'); ?>

<div class="content-wrapper oh">

  <!-- Page Title -->
  <section class="page-title text-center">
    <div class="container">
      <div class="page-title__holder">
        <h1 class="page-title__title">Tentang Kami</h1>
        <p class="page-title__subtitle">Kami hadir untuk membangun UMKM Anda lebih maju dalam branding produk.</p>
      </div>
    </div>
  </section> <!-- end page title -->

  <!-- Benefits -->
  <section class="section-wrap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="benefits box-shadow-large offset-top-171">
            <h2 class="benefits__title">Keuntungan di SME Branding</h2>
            <div class="row">
              <div class="col-lg-6 mt-4">
                <h3 class="benefits__subtitle">UMKM</h3>
                <ul class="benefits__list">
                  <li class="benefits__item">
                    <i class="ui-check benefits__item-icon"></i>
                    <span class="benefits__item-title"><i lang="en" title="Memesan">Request</i> kemasan sesuai dengan keinginan</span>
                  </li>
                  <li class="benefits__item">
                    <i class="ui-check benefits__item-icon"></i>
                    <span class="benefits__item-title">Meningkatkan pendapatan dengan branding yang tepat</span>
                  </li>
                  <li class="benefits__item">
                    <i class="ui-check benefits__item-icon"></i>
                    <span class="benefits__item-title">Dapat dicetak dengan vendor termurah</span>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6 mt-4">
                <h3 class="benefits__subtitle">Freelancer</h3>
                <ul class="benefits__list">
                  <li class="benefits__item">
                    <i class="ui-check benefits__item-icon"></i>
                    <span class="benefits__item-title">Mendapatkan penghasilan tambahan</span>
                  </li>
                  <li class="benefits__item">
                    <i class="ui-check benefits__item-icon"></i>
                    <span class="benefits__item-title">Menambah portofolio dan pengalaman</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> <!-- end benefits -->

  <!-- Statistic -->
  <section class="section-wrap bg-color-overlay" style="background-image: url(assets/lp/  img/statistic/statistic.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="statistic">
            <span class="statistic__number">80</span>
            <h5 class="statistic__title">UMKM dilayani</h5>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="statistic">
            <span class="statistic__number">20+</span>
            <h5 class="statistic__title">Desainer dan Konsultan</h5>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="statistic">
            <span class="statistic__number">120</span>
            <h5 class="statistic__title">Pesanan diselesaikan</h5>
          </div>
        </div>
      </div>
    </div>
  </section> <!-- end statistic -->

  <!-- CTA -->
  <div class="call-to-action text-center">
    <div class="call-to-action__container">
      <h2 class="call-to-action__title">
        Mari bergabung dengan SME Branding
      </h2>
      <a href="#" class="btn btn--lg btn--color m-2">
        <span>Daftar UMKM</span>
      </a>

      <a href="#" class="btn btn--lg btn--color m-2">
        <span>Daftar Freelance</span>
      </a>
    </div>
  </div> <!-- end cta -->

<?php $this->load->view('templates/landingpage/footer'); ?>
