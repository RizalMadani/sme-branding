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

        <div class="row">
          <div class="col-sm-12">
            <div class="page-title-box">
              <h4 class="page-title">Lihat Pesanan Saya</h4>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
          <div class="col-12">
              <?php if(empty($daftar_pesanan)): ?>
              <p>Belum ada pesanan yang dibuat.</p>
              <a class="btn btn-raised btn-primary" href="<?= base_url(); ?>umkm/pesan-layanan">
                <i class="mdi mdi-plus"></i>
                Buat Pesanan Baru
              </a>
              <?php else: ?>

              <div class="card mb-4">
                <div class="card-body">
                  <div class="row mb-4">
                    <div class="col-md-8">
                      <h4 class="mt-0 header-title">Tabel Pesanan</h4>
                      <p class="text-muted font-14">Lihat pesanan layanan yang telah Anda buat.</p>
                    </div>

                    <div class="col-md-4 text-center">
                      <div>
                        <a href="https://api.whatsapp.com/send?phone=6281548646248&text=Hai,%20Admin%0A%0ASaya%20dari%20UMKM%20<?= $this->session->nama_umkm; ?>%20telah%20memesan%20layanan%20baru.%20Mohon%20bantuannya" target="blank" class="d-block btn btn-success btn-raised" noopener noreferer>
                          <i class="mdi mdi-whatsapp"></i>
                          Chat Pengelola
                        </a>
                      </div>
                      <i class="text-muted font-14">Chat pengelola mengenai pesanan baru Anda</i>
                    </div>
                  </div>

                  <table id="datatable" class="table table-striped table-bordered no-wrap w-100">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Produk</th>
                        <th>Layanan yang dipesan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                          $no = 1;
                          foreach ($daftar_pesanan as $pesanan):
                      ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pesanan->nama_produk; ?></td>
                        <td><?= ucwords($pesanan->nama_layanan); ?></td>
                        <td><?= $pesanan->status; ?></td>
                        <td>

                          <a class="btn btn-raised btn-primary mr-2" href="<?= base_url(); ?>umkm/lihat-pesanan/<?= $pesanan->id_pesan; ?>">Lihat Detil</a>

                        <?php if($pesanan->status !== 'revisi' && $pesanan->status !== 'approval'): ?>
                          <a class="btn btn-secondary border-secondary" href="<?= base_url(); ?>umkm/edit-pesanan/<?= $pesanan->id_pesan; ?>">Edit</a>
                        <?php endif; ?>

                        <?php if($pesanan->status === 'pending' || $pesanan->status === 'mencari freelancer'): ?>
                          <button class="btn btn-danger border-0" data-toggle="modal" data-target="#konfirmasi-hapus-<?= $pesanan->id_pesan; ?>">Hapus</button>
                          <!-- Modal -->
                          <div class="modal fade" id="konfirmasi-hapus-<?= $pesanan->id_pesan ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-body">
                                  <p>Apakah Anda yakin ingin menghapus pesanan ini?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-raised btn-primary" data-dismiss="modal">Tidak</button>
                                  <a class="btn btn-raised btn-danger ml-2" href="<?= base_url(); ?>umkm/hapus-pesanan/<?= $pesanan->id_pesan; ?>">Iya, Saya yakin</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php endif; ?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <?php endif; ?>
          </div> <!-- end col -->
        </div> <!-- end row -->

      </div><!-- container -->

    </div> <!-- Page content Wrapper -->

  </div> <!-- content -->

<?php $this->load->view('templates/dasbor/footer'); ?>
