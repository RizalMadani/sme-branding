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
                  <li class="breadcrumb-item"><a href="#">Admin</a></li>
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
                      <h5 class="mt-0 round-inner"><?=$jumlah_user?></h5>
                      <p class="mb-0 ">Jumlah User</p>
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
                      <h5 class="mt-0 round-inner"><?=$jumlah_umkm ?></h5>
                      <p class="mb-0 ">Jumlah UMKM</p>
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
                      <h5 class="mt-0 round-inner"><?=$jumlah_freelancer->hasil?></h5>
                      <p class="mb-0 ">Jumlah Freelancer</p>
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
                      <h5 class="mt-0 round-inner"><?=$jumlah_admin->hasil?></h5>
                      <p class="mb-0 ">Jumlah Admin</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Column -->
        </div>

        <div class="row">
          <div class="col-md-12 col-xl-6">
            <div class="card m-b-30">
              <div class="card-body">
                <h5 class="header-title mb-3 mt-0">Pemesanan</h5>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th class="border-top-0 w-60">No</th>
                        <th class="border-top-0">IDPesan</th>
                        <th class="border-top-0">IDLayanan</th>
                        <th class="border-top-0">Tgl Mulai</th>
                        <th class="border-top-0">Tgl Akhir</th>
                        <th class="border-top-0">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($datapesanan as $d): ?>
                        <tr>
                          <td><?=$no++?></td>
                          <td>P000<?=$d->id_pesan?></td>
                          <td>L000<?=$d->id_layanan?></td>
                          <td><?=$d->tgl_mulai?></td>
                          <td><?=$d->tgl_akhir?></td>
                          <td><span class="badge badge-boxed  badge-success"><?=$d->status?></span></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-xl-6">
            <div class="card m-b-30">
              <div class="card-body new-user">
                <h5 class="header-title mb-3 mt-0">UMKM</h5>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th class="border-top-0 w-60">No</th>
                        <th class="border-top-0">Nama UMKM</th>
                        <th class="border-top-0">Nama Pemilik</th>
                        <th class="border-top-0">Status</th>
                        <th class="border-top-0">No.Telp</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($dataumkm as $d): ?>
                      <tr>
                          <td><?=$no++?></td>
                          <td><?=$d->nama_umkm?></td>
                          <td><?=$d->nama?></td>
                          <td><?php if ($d->status == 0){ ?>
                              <p>Tidak Aktif</p>
                          <?php }else{ ?>
                            <p>Aktif</p>
                          <?php } ?>
                        </td>
                        <td><?=$d->no_wa?></td>
                      </tr>
                    <?php endforeach; ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- container -->

    </div>
    <!-- Page content Wrapper -->
  </div>
  <!-- content -->

<?php $this->load->view('templates/dasbor/footer'); ?>
