<?php $this->load->view('templates/dasbor/header'); ?>

<?php $this->load->view('freelancer/layouts/sidebar'); ?>

<!-- Start right Content here -->

<div class="content-page">
  <!-- Start content -->
  <div class="content">

    <?php $this->load->view('freelancer/layouts/navbar'); ?>

    <div class="page-content-wrapper dashborad-v">

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="page-title-box">
              <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                  <li class="breadcrumb-item"><a href="#">Freelancer</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div>
              <h4 class="page-title">Dashboard</h4>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>

        <!-- end page title end breadcrumb -->
        <div class="row">
          <!-- Column -->
          <div class="col-sm-12 col-md-6 col-xl-3">
            <div class="card bg-danger m-b-30">
              <div class="card-body">
                <div class="d-flex row">
                  <div class="col-3 align-self-center">
                    <div class="round">
                      <i class="mdi mdi-google-physical-web"></i>
                    </div>
                  </div>
                  <div class="col-8 ml-auto align-self-center text-center">
                    <div class="m-l-10 text-white float-right">
                      <h5 class="mt-0 round-inner"><?=$jumlah_pesanan->hasil?></h5>
                      <p class="mb-0 ">Jumlah Pesanan</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Column -->
          <!-- Column -->
          <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-info m-b-30">
              <div class="card-body">
                <div class="d-flex row">
                  <div class="col-3 align-self-center">
                    <div class="round">
                      <i class="mdi mdi-account-multiple-plus"></i>
                    </div>
                  </div>
                  <div class="col-8 text-center ml-auto align-self-center">
                    <div class="m-l-10 text-white float-right">
                      <h5 class="mt-0 round-inner"><?=$ongoing->hasil ?></h5>
                      <p class="mb-0 ">Pesanan On Going</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Column -->
          <!-- Column -->
          <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-success m-b-30">
              <div class="card-body">
                <div class="d-flex row">
                  <div class="col-3 align-self-center">
                    <div class="round ">
                      <i class="mdi mdi-basket"></i>
                    </div>
                  </div>
                  <div class="col-8 ml-auto align-self-center text-center">
                    <div class="m-l-10 text-white float-right">
                      <h5 class="mt-0 round-inner"><?=$review->hasil ?></h5>
                      <p class="mb-0 ">Pesanan Status <br> Review UMKM</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Column -->
          <!-- Column -->
          <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-primary m-b-30">
              <div class="card-body">
                <div class="d-flex row">
                  <div class="col-3 align-self-center">
                    <div class="round">
                      <i class="mdi mdi-calculator"></i>
                    </div>
                  </div>
                  <div class="col-8 ml-auto align-self-center text-center">
                    <div class="m-l-10 text-white float-right">
                      <h5 class="mt-0 round-inner"><?=$approval->hasil ?></h5>
                      <p class="mb-0 ">Pesanan Status Selesai</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Column -->
        </div>

      </div>
      <!-- container -->

    </div>
    <!-- Page content Wrapper -->
  </div>
  <!-- content -->

<?php $this->load->view('templates/dasbor/footer'); ?>
