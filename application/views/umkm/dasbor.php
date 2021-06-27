<?php $this->load->view('templates/dasbor/header'); ?>

<?php $this->load->view('umkm/layouts/sidebar'); ?>

<!-- Start right Content here -->

<div class="content-page">
  <!-- Start content -->
  <div class="content">

    <?php $this->load->view('umkm/layouts/navbar'); ?>

    <div class="page-content-wrapper dashborad-v">

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="page-title-box">
              <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                  <li class="breadcrumb-item active"><?= date('d M Y'); ?></li>
                </ol>
              </div>
              <h4 class="page-title">Dasbor</h4>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>

        <!-- end page title end breadcrumb -->
        <div class="row mb-4">
          <div class="col-12">
            <span class="h2">
              Selamat Datang
            </span>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 col-xl-6">
            <div class="card m-b-30">
              <div class="card-body">
                <h5 class="header-title mt-0 pb-3">Pesanan yang Anda Buat</h5>
                
                <?php if(empty($pesanan)): ?>
                  <p>Anda belum memesan layanan di SME Branding</p>
                  <a href="<?=base_url();?>umkm/pesan-layanan" class="btn btn-primary">Pesan Layanan Sekarang</a>
                <?php else: 
                  foreach($pesanan as $psn): ?>
                  <a href="<?=base_url();?>umkm/lihat-pesanan/<?= $psn->id_pesan; ?>" class="d-block list-order mb-2">
                    <div class="card" style="box-shadow:unset;border:1px solid #e5e5e5;">
                      <div class="card-body">
                        <strong><?= character_limiter($psn->nama_produk, 37); ?></strong>

                        <div class="mt-2">
                        <?php
                          $tgl_order  = $psn->tgl_order;
                          $tgl_order  = strtotime($tgl_order);
                        ?>
                          <span class="text-muted"><?= date('d M', $tgl_order); ?></span>
                          <span class="float-right"><?= $psn->status; ?></span>                                                                
                        </div>
                      </div>
                    </div>
                  </a>
                  <?php endforeach;
                endif; ?>
              </div>
            </div>
          </div>

          <div class="col-md-12 col-xl-6">
            <div class="card m-b-30">
              <div class="card-body">
                <h5 class="header-title mt-0 pb-3">Produk Anda</h5>

                <?php if (empty($produk)): ?>
                  <p>Belum ada produk yang dijadikan pesanan.</p>
                  <p>Anda akan melihat daftar produk jika Anda pernah membuat pesanan.</p>
                  <a class="btn btn-raised btn-primary" href="<?=base_url();?>umkm/pesan-layanan">Pesan Layanan Sekarang</a>
                <?php else: 
                  foreach($produk as $prd): ?>

                  <!-- <div>
                    <div class="mr-2">
                      <img src="" alt="">
                    </div>
                    <div>
                      <strong class="d-block"><?= character_limiter($prd->nama_produk, 15); ?></strong>
                      <p><?= character_limiter($prd->keterangan, 37); ?></p>
                    </div>
                  </div> -->

                    <div class="card mb-2" style="box-shadow:unset;border:1px solid #e5e5e5;">
                      <div class="card-body">
                        <strong class="d-block"><?= character_limiter($prd->nama_produk, 13); ?></strong>
                        <p class="mb-0"><?= character_limiter($prd->keterangan, 37); ?></p>
                      </div>
                    </div>
                  <?php endforeach;
                endif; ?>
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
