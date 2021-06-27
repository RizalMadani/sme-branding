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
                      <a class="btn btn-raised btn-warning" href="" data-toggle="modal" data-target="#tambah">
                          <i class="mdi mdi-plus mr-2 text-white-400"></i>
                              Tambah Transaksi
                      </a>
                      <br>
                      <table id="datatable" class="table table-bordered" style="width:100%">
                          <thead>
                          <tr>
                              <th>No</th>
                              <th>Pesanan</th>
                              <th>Harga</th>
                              <th>Status</th>
                              <th>Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            foreach ($datavalid as $p): ?>
                            <tr>
                              <td><?=$no++?></td>
                              <td>
                                <a href="<?=base_url(); ?>Pengelola/Pemesanan/lihatDetail/<?= $p->id_pesan ?>">Pesanan</a>
                              </td>
                              <td>Rp <?=number_format($p->harga,0,',','.')?></td>

                                <?php if ($p->status == 'pending'){ ?>
                                <td>  <p style="color:gray">Pending</p> </td>
                                <td>
                                  <a class="btn btn-raised btn-success" href="" data-toggle="modal" data-target="#lunas<?=$p->id_transaksi?>">
                                      <i class="mdi mdi-check mr-2 text-white-400"></i>
                                        Lunas
                                  </a>
                                  <a class="btn btn-raised btn-dark" href="" data-toggle="modal" data-target="#ditolak<?=$p->id_transaksi?>">
                                      <i class="mdi mdi-bookmark-remove mr-2 text-white-400"></i>
                                        Ditolak
                                  </a>
                                <?php }else if($p->status == 'belum lunas'){ ?>
                                <td>  <p style="color:red">Belum Lunas</p> </td>
                                <td>
                                  <a class="btn btn-raised btn-success" href="" data-toggle="modal" data-target="#lunas<?=$p->id_transaksi?>">
                                      <i class="mdi mdi-check mr-2 text-white-400"></i>
                                        Lunas
                                  </a>
                                  <a class="btn btn-raised btn-dark" href="" data-toggle="modal" data-target="#ditolak<?=$p->id_transaksi?>">
                                      <i class="mdi mdi-bookmark-remove mr-2 text-white-400"></i>
                                        Ditolak
                                  </a>
                                <?php }else if($p->status == 'ditolak'){ ?>
                                <td>  <p style="color:green">Ditolak</p>
                                  <td>
                                <?php } ?>

                                <a class="btn btn-raised btn-danger" href="" data-toggle="modal" data-target="#hapus<?=$p->id_transaksi?>">
                                    <i class="mdi mdi-eraser mr-2 text-white-400"></i>
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
        </div>
      <!-- container -->

    </div>
    <!-- Page content Wrapper -->
  </div>
  <!-- content -->
  <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title" id="ExampleModalLabel">Tambah Data Transaksi</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
         </div>
         <div class="modal-body">
           <?php echo validation_errors('<div class="error">'.'</div>'); ?>
           <form class="" action="<?=base_url()?>pengelola/Transaksi/inputTransaksi" method="POST" enctype="multipart/form-data">
             <table width="100%">
               <div class="form-group bmd-form-group">
                 <label for="nama" class="bmd-label-floating">Pemesanan</label>
                 <select class="form-control" name="id_pesan">
                   <option value="">-- Pilih Pesanan --</option>
                   <?php
                   $no = 1;
                   foreach ($pemesanan as $p): ?>
                      <option value="<?=$p->id_pesan?>">P000<?=$p->id_pesan?> - <?=$p->nama_umkm?></option>
                   <?php endforeach; ?>
                 </select>
               </div>

               <div class="form-group bmd-form-group">
                 <label for="nama" class="bmd-label-floating">Harga Layanan</label>
                 <input type="number" name="harga" class="form-control" required >
               </div>
             </table>
         </div>
         <div class="modal-footer justify-content-between">
           <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
           <input type="submit" class="btn btn-danger" value="Tambah">
         </div>
       </form>
       </div>
       <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
      </div>

      <?php foreach ($datavalid as $p): ?>
        <div class="modal fade" id="hapus<?=$p->id_transaksi?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
          <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h4 class="modal-title" id="ExampleModalLabel">Hapus Data Transaksin</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
                 <p>Apakah Anda ingin menghapus transaksi TR000<span style="color:red"><?=$p->id_transaksi?></span> </p>
               </div>
               <div class="modal-footer justify-content-between">
                 <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                 <a href="<?=base_url()?>Pengelola/Transaksi/hapusTransaksi/<?=$p->id_transaksi?>" class="btn btn-danger">Iya</a>
               </div>
             </form>
             </div>
             <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
            </div>
      <?php endforeach; ?>

      <?php foreach ($datavalid as $p): ?>
        <div class="modal fade" id="lunas<?=$p->id_transaksi?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
          <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h4 class="modal-title" id="ExampleModalLabel">Ubah Data Transaksin</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
                 <p>Apakah Anda ingin melakukan lunas transaksi TR000<span style="color:red"><?=$p->id_transaksi?></span> </p>
               </div>
               <div class="modal-footer justify-content-between">
                 <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                 <a href="<?=base_url()?>Pengelola/Transaksi/updateLunas/<?=$p->id_transaksi?>" class="btn btn-danger">Iya</a>
               </div>
             </form>
             </div>
             <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
            </div>
      <?php endforeach; ?>

      <?php foreach ($datavalid as $p): ?>
        <div class="modal fade" id="ditolak<?=$p->id_transaksi?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
          <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h4 class="modal-title" id="ExampleModalLabel">Ubah Data Transaksin</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
                 <p>Apakah Anda ingin melakukan tolak transaksi TR000<span style="color:red"><?=$p->id_transaksi?></span> </p>
               </div>
               <div class="modal-footer justify-content-between">
                 <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                 <a href="<?=base_url()?>Pengelola/Transaksi/updateTolak/<?=$p->id_transaksi?>" class="btn btn-danger">Iya</a>
               </div>
             </form>
             </div>
             <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
            </div>
      <?php endforeach; ?>
<?php $this->load->view('templates/dasbor/footer'); ?>
