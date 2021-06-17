<?php $this->load->view('templates/dasbor/header'); ?>

<?php $this->load->view('umkm/layouts/sidebar'); ?>

<!-- Start right Content here -->

<div class="content-page">
  <!-- Start content -->
  <div class="content">

    <!-- Top Bar Start -->
    <?php $this->load->view('umkm/layouts/navbar'); ?>
    <!-- Top Bar End -->

    <div class="page-content-wrapper ">

      <div class="container-fluid">

        <div class="row align-items-stretch mt-4">
          <div class="col-lg-6 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <strong class="d-block">Nama Produk</strong>
                <p><?= $pesanan->nama_produk; ?></p>

                <strong class="d-block">Deskripsi Produk</strong>
                <p><?= $pesanan->keterangan; ?></p>

                <strong class="d-block">Foto Produk</strong>
                <?php if(empty($gambar->foto_produk)): ?>
                <p><i class="text-muted">Tidak ada foto produk</i></p>
                <?php else: ?>
                <div class="mb-4">
                  <?php foreach($gambar->foto_produk as $img): ?>
                    <img src="<?= base_url()."uploads/foto_produk/".$img->foto; ?>" alt="foto produk" class="img-thumbnail mr-1" style="max-height: 160px;">
                  <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <strong class="d-block">Logo Produk</strong>
                <?php if(empty($gambar->logo_produk)): ?>
                <p><i class="text-muted">Tidak ada logo produk</i></p>
                <?php else: ?>
                <div class="mb-4">
                  <?php foreach($gambar->logo_produk as $img): ?>
                    <img src="<?= base_url()."uploads/logo_produk/".$img->logo; ?>" alt="logo produk" class="img-thumbnail mr-1" style="max-height: 160px;">
                  <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <strong class="d-block">Kemasan Produk</strong>
                <?php if(empty($gambar->kemasan_produk)): ?>
                <p><i class="text-muted">Tidak ada foto kemasan produk</i></p>
                <?php else: ?>
                <div class="mb-4">
                  <?php foreach($gambar->kemasan_produk as $img): ?>
                    <img src="<?= base_url()."uploads/kemasan_produk/".$img->foto_kemasan; ?>" alt="kemasan produk" class="img-thumbnail mr-1" style="max-height: 160px;">
                  <?php endforeach; ?>
                </div>
                <?php endif; ?>
              </div>

              <?php if($pesanan->status !== 'revisi' && $pesanan->status !== 'approval'): ?>
              <div class="card-footer">
                <a class="btn btn-secondary border-secondary float-right" href="<?= base_url(); ?>umkm/edit-pesanan/<?= $pesanan->id_pesan; ?>">Edit Keterangan Produk</a>
              </div>
              <?php endif; ?>
            </div>
          </div> <!-- end col -->

          <div class="col-lg-6 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <strong class="d-block">Tanggal Memesan</strong>
                <p>
                  <?php
                    $tgl_order  = $pesanan->tgl_order;
                    $tgl_order  = strtotime($tgl_order);

                    echo date('d M Y', $tgl_order);
                  ?>
                </p>

                <strong class="d-block">Layanan yang dipesan</strong>
                <p>
                <?= ucwords($pesanan->nama_layanan); ?>
                </p>

                <strong class="d-block">Status</strong>
                <p>
                <?= ucfirst($pesanan->status); ?>
                </p>
                
                <strong class="d-block">Pengelola</strong>
                <p>
                <?php if ($pesanan->nama_pengelola): ?>
                  <?= $pesanan->nama_pengelola; ?>
                <?php else: ?>
                  <i class="text-muted"> Belum ditentukan </i>
                <?php endif; ?>
                </p>

                <strong class="d-block">Harga</strong>
                <p>
                <?php if (empty($pesanan->jumlah)): ?>
                  <i class="text-muted">Belum ditentukan</i>
                <?php else: ?>
                  <?= $pesanan->harga * $pesanan->jumlah; ?>
                <?php endif; ?>
                </p>

                <strong class="d-block">Keterangan Pesanan</strong>
                <p>
                <?php
                  $ket = $pesanan->keterangan_order;
                  echo empty($ket) ? '<i class="text-muted">Tidak Ada Keterangan</i>' : $ket;
                ?>
                </p>

            </div>
            <?php if($pesanan->status !== 'revisi' && $pesanan->status !== 'approval'): ?>
            <div class="card-footer">
              <a class="btn btn-secondary border-secondary float-right" href="<?= base_url(); ?>umkm/edit-pesanan/<?= $pesanan->id_pesan; ?>">Edit Keterangan Pesanan</a>
            </div>
            <?php endif; ?>
          </div>
        </div> <!-- end row -->

      </div><!-- container -->

    </div> <!-- Page content Wrapper -->

  </div> <!-- content -->

<?php $this->load->view('templates/dasbor/footer'); ?>
