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
                  <li class="breadcrumb-item active">Kelola Transaksi</li>
                </ol>
              </div>
              <div class="col">
                <h2 style="float:left">Kelola Transaksi</h2>
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
                      <h4 class="mt-0 header-title">Data Transaksi SME-Branding</h4>
                      <p class="text-muted font-14">Berikut adalah data-data validasi transaksi sme-branding
                      </p>
                      <br>
                      <table id="datatable" class="table table-bordered" style="width:100%">
                          <thead>
                          <tr>
                              <th>No</th>
                              <th>Pesanan</th>
                              <th>Nama UMKM</th>
                              <th>Harga</th>
                              <th>Status</th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            foreach ($datatransaksi as $p): ?>
                            <tr>
                              <td><?=$no++?></td>
                              <td>
                                <a href="<?=base_url(); ?>Pengelola/Pemesanan/lihatDetail/<?= $p->id_pesan ?>">Pesanan</a>
                              </td>
                              <td><?=$p->nama_umkm?></td>
                              <td>Rp <?=number_format($p->harga,0,',','.')?></td>

                                <?php if ($p->statuss == 'pending'){ ?>
                                <td>  <p style="color:gray">Pending</p> </td>
                              <?php }else if($p->statuss == 'belum lunas'){ ?>
                                <td>  <p style="color:red">Belum Lunas</p> </td>
                              <?php }else if($p->statuss == 'lunas'){ ?>
                                  <td>  <p style="color:blue">Lunas</p> </td>
                                <?php }else if($p->statuss == 'ditolak'){ ?>
                                <td>  <p style="color:green">Ditolak</p> </td>
                                <?php } ?>

                            </tr>
                          <?php endforeach; ?>
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
