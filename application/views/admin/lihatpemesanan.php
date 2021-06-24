<?php $this->load->view('templates/dasbor/header'); ?>

<?php $this->load->view('admin/layouts/sidebar'); ?>

<!-- Start right Content here -->

<div class="content-page">
  <!-- Start content -->
  <div class="content">

    <!-- Top Bar Start -->
    <?php $this->load->view('admin/layouts/navbar'); ?>
    <!-- Top Bar End -->

    <div class="page-content-wrapper ">

      <div class="container-fluid">

        <?php $this->alert->tampilkan(); ?>

        <div class="row align-items-stretch mt-4">
          <div class="col-lg-6 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <strong class="d-block">Nama Produk</strong>
                <p><?= $pemesanan->nama_produk; ?></p>

                <strong class="d-block">Deskripsi Produk</strong>
                <p><?= $pemesanan->keterangan; ?></p>

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

              <?php $status = $pemesanan->status; ?>

              <?php if($status !== 'revisi' && $status !== 'approval'): ?>
              <div class="card-footer">
                <a class="btn btn-secondary border-secondary float-right" href="<?= base_url(); ?>umkm/edit-pesanan/<?= $pemesanan->id_pesan; ?>">Edit Keterangan Produk</a>
              </div>
              <?php endif; ?>
            </div>
          </div> <!-- end col -->

          <div class="col-lg-6 mb-4">
            <div class="card h-100">
              <div class="card-body">

                <strong class="d-block">Pengelola</strong>
                <p>
                <?php if ($pemesanan->nama_pengelola): ?>
                  <?= $pemesanan->nama_pengelola; ?>
                <?php else: ?>
                  <i class="text-muted"> Belum ditentukan </i>
                <?php endif; ?>
                </p>

                <strong class="d-block">Freelancer</strong>
                <p>
                <?php if ($pemesanan->nama_pengelola): ?>
                  <?= $pemesanan->nama_freelancer; ?>
                <?php else: ?>
                  <i class="text-muted"> Belum ditentukan </i>
                <?php endif; ?>
                </p>

                <hr class="m-4">

                <strong class="d-block">Tanggal Memesan</strong>
                <p>
                  <?php
                    $tgl_order  = $pemesanan->tgl_order;
                    $tgl_order  = strtotime($tgl_order);

                    echo date('d M Y', $tgl_order);
                  ?>
                </p>

                <strong class="d-block">Layanan yang dipesan</strong>
                <p>
                <?= ucwords($pemesanan->nama_layanan); ?>
                </p>

                <strong class="d-block">Status</strong>
                <p>
                <?= ucfirst($status); ?>
                </p>

                <strong class="d-block">Jumlah</strong>
                <p>
                <?php if ($pemesanan->jumlah): ?>
                  <?= $pemesanan->jumlah; ?>
                <?php else: ?>
                  <i class="text-muted"> Belum ditentukan </i>
                <?php endif; ?>
                </p>

                <strong class="d-block">Harga</strong>
                <p>
                <?php if (empty($pemesanan->jumlah)): ?>
                  <i class="text-muted">Belum ditentukan</i>
                <?php else: ?>
                  <?= 'Rp'.number_format($pemesanan->harga * $pemesanan->jumlah, 0, ',', '.'); ?>
                <?php endif; ?>
                </p>

                <strong class="d-block">Keterangan Pesanan</strong>
                <div id="keterangan-pesanan" class="p-relative">
                  <p id="p-ket">
                  <?php if (empty($pemesanan->keterangan_order)): ?>
                    <i class="text-muted">Tidak Ada Keterangan</i>
                  <?php else: ?>
                    <?= $pemesanan->keterangan_order; ?>
                  <?php endif; ?>
                  </p>

                  <?php if($status !== 'revisi' && $status !== 'approval'): ?>
                  <form action="<?= base_url(); ?>umkm/edit-keterangan-pesanan/<?= $pemesanan->id_pesan; ?>" method="post" id="form-edit" class="d-none m-0">
                    <textarea id="field-edit" name="keterangan-pesanan" class="w-100" rows="4"><?= $pemesanan->keterangan_order; ?></textarea>
                  </form>
                  <?php endif; ?>
                </div>
            </div>
          </div>
        </div> <!-- end row -->

      </div><!-- container -->

    </div> <!-- Page content Wrapper -->

  </div> <!-- content -->

<?php $this->load->view('templates/dasbor/footer'); ?>
