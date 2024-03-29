<?php $this->load->view('templates/landingpage/header'); ?>
<?php $this->load->view('templates/landingpage/nav'); ?>

<div class="content-wrapper oh">

  <!-- Page Title -->
  <section class="page-title text-center">
    <div class="container">
      <div class="page-title__holder">
        <h1 class="page-title__title">Kontak Kami</h1>
        <p class="page-title__subtitle">Senang Anda bisa menghubungi kami.</p>
      </div>
    </div>
  </section> <!-- end page title -->

  <!-- Contact -->
  <section class="section-wrap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="contact box-shadow-large offset-top-171">
            <ul class="contact__items">
              <!-- <li class="contact__item">
                <address>Melbourne's GPO 350 Bourke St. Melbourne VIC 3000, Australia</address>
              </li> -->
              <li class="contact__item">
                <span clas="contat__item-label">Telepon: </span>
                <a href="tel:+62-822-5640-6910">+62-822-5640-6910</a>
              </li>
              <li class="contact__item">
                <span class="contact__item-label">Email: </span>
                <a href="mailto:umkmppkm@gmail.com">umkmppkm@gmail.com</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section> <!-- end contact -->


  <!-- Google Map -->
  <!-- <div id="google-map" class="gmap" data-address="V Tytana St, Manila, Philippines"></div> -->


<?php $this->load->view('templates/landingpage/footer'); ?>
