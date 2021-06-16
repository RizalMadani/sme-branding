<?php $this->load->view('templates/dasbor/header'); ?>

<?php $this->load->view('umkm/layouts/sidebar'); ?>

<!-- Start right Content here -->

<div class="content-page">
  <!-- Start content -->
  <div class="content">

    <!-- Top Bar Start -->
    <?php $this->load->view('umkm/layouts/navbar') ?>
    <!-- Top Bar End -->

    <div class="page-content-wrapper ">

      <div class="container-fluid">
        <?php $this->alert->tampilkan(); ?>

        <?php $validasi_error = validation_errors('<li>', '</li>'); ?>
        <?php if (! empty($validasi_error)): ?>
          <div class="row">
            <div class="col-12">
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                  <?= $validasi_error; ?>
                </ul>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <!-- end alert -->
        <div class="row">
          <div class="col-sm-12">
            <div class="page-title-box">
              <h4 class="page-title">Pesan Layanan Baru</h4>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
          <div class="col-md-12 col-xl-12">
            <div class="card m-b-30">
              <div class="card-body">

                <?= form_open_multipart('umkm/pesan-layanan', ['class' => 'mb-0']); ?>
                  <div class="form-group">
                    <label for="nama-produk" class="bmd-label-floating">Nama Produk</label>
                    <input type="text" name="nama-produk" class="form-control" id="nama-produk" value="<?= set_value('nama-produk'); ?>" required>
                    <!-- TODO: tampilkan error satu per satu sesuai field -->
                  </div>

                  <div class="form-group">
                    <label for="keterangan-produk" class="bmd-label-floating">Keterangan singkat mengenai produk Anda</label>
                    <textarea name="keterangan-produk" class="form-control" id="keterangan-produk" <?= set_value('keterangan-produk'); ?> required></textarea>
                  </div>

                  <div class="form-group mt-4">
                    <span class="text-secondary d-block">Jenis layanan</span>

                    <?php foreach($layanan as $lyn): ?>

                    <span class="bmd-form-group mt-3">
                      <div class="checkbox">
                          <label class="text-dark">
                              <input type="checkbox" name="jenis-redesign[]" value="<?= $lyn->id_layanan ?>" <?= set_checkbox('jenis-redesign[]', $lyn->id_layanan) ?> >
                              <span class="checkbox-decorator"><span class="check"></span><div class="ripple-container"></div></span> <?= ucwords($lyn->nama_layanan); ?>
                          </label>
                      </div>
                    </span>
                    
                    <?php endforeach; ?>
                  </div>

                  <div class="form-group bmd-form-group">
                    <label for="foto">Foto Produk</label>
                    <input type="file" name="foto[]" class="form-control-file" id="foto" multiple="mutiple">
                  </div>

                  <div class="position-relative" id="preview-wrapper-foto" style="display: none; height: 0;">
                    <img src="" alt="foto yang akan di upload" class="img-thumbnail" id="preview-foto" style="max-height: 120px">
                    <button type="button" class="btn btn-secondary position-absolute ml-2" id="hapus-foto" aria-label="Close" style="background-color: #fff">
                      Hapus Foto
                    </button>
                  </div>

                  <!-- TODO: buat otomatis saja ketika user memilih layanan desain logo -->
                  <div class="form-group bmd-form-group">
                    <label for="logo">Logo Produk</label>
                    <input type="file" name="logo[]" class="form-control-file" id="logo" multiple="multiple">
                    <small class="text-muted">Tambahkan logo produk jika ada</small>
                  </div>

                  <div class="position-relative" id="preview-wrapper-logo" style="display: none; height: 0;">
                    <img src="" alt="foto yang akan di upload" class="img-thumbnail" id="preview-logo" style="max-height: 120px">
                    <button type="button" class="btn btn-secondary position-absolute ml-2" id="hapus-logo" aria-label="Close" style="background-color: #fff">
                      Hapus Logo
                    </button>
                  </div>

                  <div class="form-group bmd-form-group">
                    <label for="kemasan">Kemasan Produk</label>
                    <input type="file" name="foto_kemasan[]" class="form-control-file" id="kemasan" multiple="multiple">
                    <small class="text-muted">Tambahkan gambar kemasan yang sekarang dimiliki</small>
                  </div>

                  <div id="preview-wrapper-kemasan" style="display: none; height: 0;">
                    <button type="button" class="btn btn-secondary ml-2" id="hapus-kemasan" aria-label="Close" style="background-color: #fff">
                      Hapus Semua Kemasan
                    </button>
                    <div id="preview-kemasan"></div>
                  </div>

                  <!-- TODO: tanyakan ini atau buat otomatis -->
                  <!-- <div class="form-group">
                    <label for="keterangan-desain" class="bmd-label-floating">Keterangan mengenai desain yang diinginkan</label>
                    <textarea name="keterangan-desain" class="form-control" id="keterangan-produk" required></textarea>
                  </div> -->

                  <div class="form-group bmd-form-group d-flex justify-content-end">
                    <a href="<?=base_url();?>umkm/dasbor" class="btn btn-secondary border-0 mr-2"><i class="mdi mdi-close mr-2"></i>Batal</a>
                    <button type="submit" class="btn btn-primary btn-raised"><i class="mdi mdi-send mr-2"></i>Kirim</button>
                  </div>
                <?=form_close();?>

              </div>
            </div>
          </div> <!-- end col -->

        </div> <!-- end row -->

      </div><!-- container -->

    </div> <!-- Page content Wrapper -->

  </div> <!-- content -->

<?php $this->load->view('templates/dasbor/footer'); ?>
