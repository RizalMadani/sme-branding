<?php $this->load->view('templates/dasbor/header'); ?>

<?php $this->load->view('admin/layouts/sidebar'); ?>

<div class="content-page">
        <!-- Start content -->
  <div class="content">

    <!-- Top Bar Start -->
    <?php $this->load->view('admin/layouts/navbar') ?>
    <!-- Top Bar End -->

    <div class="page-content-wrapper dashborad-v">

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="page-title-box">
              <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                  <li class="breadcrumb-item"><a href="#">Kelola Order</a></li>
                  <li class="breadcrumb-item active">lihat pemesanan</li>
                </ol>
              </div>
              <h4 class="page-title">Kelola Pemesanan</h4>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
          <div class="col-12">
            <div class="card m-b-30">
              <div class="card-body">
                <h4 class="mt-0 header-title">Data Pemesanan</h4>
                <p class="text-muted font-14">
                  Lihat pemesanan dengan status lain
                </p>
                <div class="mb-4">
                  <a class="btn <?= $status === NULL ? 'btn-primary' : 'btn-secondary' ?>" href="<?=base_url()?>Pengelola/Pemesanan/lihatPemesanan">
                    Semua
                  </a>
                  <a class="btn <?= $status === 'pending' ? 'btn-primary' : 'btn-secondary' ?>" href="<?=base_url()?>Pengelola/Pemesanan/lihatPemesanan/pending">
                    Pending
                  </a>
                  <a class="btn <?= $status === 'mencari freelancer' ? 'btn-primary' : 'btn-secondary' ?>" href="<?=base_url()?>Pengelola/Pemesanan/lihatPemesanan/mencari-freelancer">
                    Mencari Freelancer
                  </a>
                  <a class="btn <?= $status === 'on going' ? 'btn-primary' : 'btn-secondary' ?>" href="<?=base_url()?>Pengelola/Pemesanan/lihatPemesanan/on-going">
                    On Going
                  </a>
                  <a class="btn <?= $status === 'review' ? 'btn-primary' : 'btn-secondary' ?>" href="<?=base_url()?>Pengelola/Pemesanan/lihatPemesanan/review">
                    Review
                  </a>
                  <a class="btn <?= $status === 'revisi' ? 'btn-primary' : 'btn-secondary' ?>" href="<?=base_url()?>Pengelola/Pemesanan/lihatPemesanan/revisi">
                    Revisi
                  </a>
                  <a class="btn <?= $status === 'approval' ? 'btn-primary' : 'btn-secondary' ?>" href="<?=base_url()?>Pengelola/Pemesanan/lihatPemesanan/approval">
                    Approval
                  </a>
                </div>

                <table id="datatable" class="mt-2 table table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Pesanan</th>
                    <th>Layanan</th>
                    <th>Pengelola</th>
                    <th>Freelancer</th>
                    <th>Tgl Mulai</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    foreach($pemesanan as $p):
                  ?>
                    <tr>
                      <td><?= $no++ ?></td>

                      <td>
                        <?= $p->nama_produk ?> <br>
                        <?= '('.$p->nama_umkm.')'; ?>
                      </td>

                      <td><?= ucwords($p->nama_layanan); ?></td>

                      <td>
                      <?php if ($p->pengelola): ?>
                        <?= $p->pengelola; ?>
                      <?php else: ?>
                        <i class="text-muted"> Belum ada yang mengelola </i>
                      <?php endif; ?>
                      </td>

                      <td>
                      <?php if ($p->freelancer): ?>
                        <?= $p->freelancer; ?>
                      <?php else: ?>
                        <i class="text-muted"> Belum ditentukan </i>
                      <?php endif; ?>
                      </td>

                      <td>
                      <?php if ($p->tgl_mulai): ?>
                        <?php 
                          $tgl_order  = $p->tgl_order;
                          $tgl_order  = strtotime($tgl_order);

                          echo date('d M Y', $tgl_order);
                        ?>
                      <?php else: ?>
                        <i class="text-muted"> Belum ditentukan </i>
                      <?php endif; ?>
                      </td>

                      <td><?= $p->status ?></td>

                      <td>
                        <a class="btn btn-primary mr-2" href="<?= base_url(); ?>Pengelola/Pemesanan/lihatDetail/<?= $p->id_pesan ?>">
                          <!-- <i class="mdi mdi-information mr-2 text-white-400"></i> -->
                          Detail
                        </a>
                          <!-- <a class="btn btn-secondary border-secondary" href="<?= base_url(); ?>Pengelola/Pemesanan/editPemesanan/<?= $p->id_pesan ?>"> -->
                        <a class="btn btn-primary mr-2" href="#">
                          <!-- <i class="mdi mdi-grease-pencil mr-2 text-white-400"></i> -->
                          Edit
                        </a>
                        <a class="btn btn btn-danger border-0" href="" data-toggle="modal" data-target="#hapus<?=$p->id_pesan?>">
                          <!-- <i class="mdi mdi-delete mr-2 text-white-400"></i> -->
                          Hapus
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>

              </div>
            </div>
          </div> <!-- end col -->
        </div> <!-- end row -->

      </div>
      <!-- container -->

    </div>
    <!-- Page content Wrapper -->
  </div>
  <!-- content -->

<?php $this->load->view('templates/dasbor/footer'); ?>
