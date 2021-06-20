<?php $this->load->view('templates/dasbor/header'); ?>

<?php $this->load->view('admin/layouts/sidebar'); ?>

<!-- Start right Content here -->

<div class="content-page">
  <!-- Start content -->
  <div class="content">

    <?php $this->load->view('admin/layouts/navbar'); ?>

    <div class="page-content-wrapper dashborad-v">

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="page-title-box">
              <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                  <li class="breadcrumb-item"><a href="#">Pengelola</a></li>
                  <li class="breadcrumb-item active">Kelola User</li>
                  <li class="breadcrumb-item active">UMKM</li>
                </ol>
              </div>
              <div class="col">
                <h2 style="float:left">Kelola User</h2>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>

        <!-- end page title end breadcrumb -->
        <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                      <h4 class="mt-0 header-title">Data Riwayat Pekerjaan</h4>
                      <p class="text-muted font-14">Berikut adalah riwayat pekerjaan Anda <code>(dengan lunas)</code>.
                      </p>
                      <br>
                      <table id="datatable" class="table table-bordered" style="width:100%">
                          <thead>
                          <tr>
                              <th>No</th>
                              <th>Judul Portofolio</th>
                              <th>Bukti Portofolio</th>
                              <th>Detail Portofolio</th>
                              <th>Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php
                            // $no = 1;
                            // foreach ($dataportofolio as $p): ?>
                            <tr>

                            </tr>
                          <?php //endforeach; ?>
                          </tbody>
                      </table>

                  </div>
              </div>
          </div> <!-- end col -->
        </div>
      <!-- container -->

    </div>
    <!-- Page content Wrapper -->
  </div>
  <!-- content -->

<?php $this->load->view('templates/dasbor/footer'); ?>
