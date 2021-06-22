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
              <h4 class="page-title">Edit Keterangan Produk</h4>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
          <div class="col-md-12 col-xl-12">
            <div class="card m-b-30">
              <div class="card-body">

                <?= form_open_multipart('umkm/edit-pesanan/'.$pesanan->id_pesan, ['class' => 'mb-0']); ?>
                  <div class="form-group">
                    <label for="nama-produk" class="bmd-label-floating">Nama Produk</label>
                    <input type="text" name="nama-produk" class="form-control" id="nama-produk" value="<?= $pesanan->nama_produk ?? set_value('nama-produk'); ?>" required>
                    <!-- TODO: tampilkan error satu per satu sesuai field -->
                  </div>

                  <div class="form-group">
                    <label for="keterangan-produk" class="bmd-label-floating">Keterangan tentang produk Anda</label>
                    <textarea name="keterangan-produk" class="form-control" id="keterangan-produk" required><?= $pesanan->keterangan ?? set_value('keterangan-produk'); ?></textarea>
                  </div>

                  <div class="form-group bmd-form-group">
                    <label for="foto">Foto Produk</label>
                    <input type="file" name="foto[]" class="form-control-file" id="foto" multiple="mutiple">
                  </div>

                  <?php $preview_foto_display = empty($gambar->foto_produk) ? 'display: none;' : ''; ?>

                  <div class="position-relative" id="preview-wrapper-foto" style="<?= $preview_foto_display; ?>">
                    <div id="preview-foto" class="d-inline">
                    <?php foreach($gambar->foto_produk as $img): ?>
                      <img src="<?= base_url()."uploads/foto_produk/".$img->foto; ?>" alt="foto produk" class="img-thumbnail m-2 foto" style="max-height: 160px;">
                    <?php endforeach; ?>
                    </div>
                    <button type="button" class="btn btn-secondary position-absolute ml-2" id="hapus-foto" aria-label="Close" style="background-color: #fff">
                      Hapus Semua foto
                    </button>
                  </div>

                  <!-- TODO: buat otomatis saja ketika user memilih layanan desain logo -->
                  <div class="form-group bmd-form-group">
                    <label for="logo">Logo Produk</label>
                    <input type="file" name="logo[]" class="form-control-file" id="logo" multiple="multiple">
                    <small class="text-muted">Tambahkan logo produk jika ada</small>
                  </div>

                  <?php $preview_logo_display = empty($gambar->logo_produk) ? 'display: none;' : ''; ?>

                  <div class="position-relative" id="preview-wrapper-logo" style="<?= $preview_logo_display; ?>">
                    <div id="preview-logo" class="d-inline">
                    <?php foreach($gambar->logo_produk as $img): ?>
                      <img src="<?= base_url()."uploads/logo_produk/".$img->logo_produk; ?>" alt="logo produk" class="img-thumbnail m-2 logo" style="max-height: 160px;">
                    <?php endforeach; ?>
                    </div>
                    <button type="button" class="btn btn-secondary position-absolute ml-2" id="hapus-logo" aria-label="Close" style="background-color: #fff">
                      Hapus Semua logo
                    </button>
                  </div>

                  <div class="form-group bmd-form-group">
                    <label for="kemasan">Kemasan Produk</label>
                    <input type="file" name="foto_kemasan[]" class="form-control-file" id="kemasan" multiple="multiple">
                    <small class="text-muted">Tambahkan gambar kemasan yang sekarang dimiliki</small>
                  </div>

                  <?php $preview_kemasan_display = empty($gambar->kemasan_produk) ? 'display: none;' : ''; ?>

                  <div class="position-relative" id="preview-wrapper-kemasan" style="<?= $preview_kemasan_display; ?>">
                    <div id="preview-kemasan" class="d-inline">
                    <?php foreach($gambar->kemasan_produk as $img): ?>
                      <img src="<?= base_url()."uploads/kemasan_produk/".$img->foto_kemasan; ?>" alt="kemasan produk" class="img-thumbnail m-2 kemasan" style="max-height: 160px;">
                    <?php endforeach; ?>
                    </div>
                    <button type="button" class="btn btn-secondary position-absolute ml-2" id="hapus-kemasan" aria-label="Close" style="background-color: #fff">
                      Hapus Semua Kemasan
                    </button>
                  </div>

                  <div class="form-group bmd-form-group d-flex justify-content-end">
                    <a href="<?=base_url();?>umkm/lihat-pesanan" class="btn btn-secondary mr-2"><i class="mdi mdi-close mr-2"></i>Batal</a>
                    <button type="submit" class="btn btn-primary btn-raised"><i class="mdi mdi-send mr-2"></i>Kirim Perubahan</button>
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
