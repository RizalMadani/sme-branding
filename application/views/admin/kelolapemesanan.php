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
                    <th>Diskusi</th>
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
                      <td>
                        <a href="https://wa.me/<?=$p->no_wa?>" target="_blank">
                         <img src="<?=base_url()?>assets/favicons/whatsapp.png" width="50px"></a>
                       </td>
                      <td><?= $p->status ?></td>

                      <td>
                        <a class="btn btn-primary mr-2" href="<?= base_url(); ?>Pengelola/Pemesanan/lihatDetail/<?= $p->id_pesan ?>">
                          <i class="mdi mdi-information mr-2 text-white-400"></i>
                          Detail
                        </a>
                        <a class="btn btn-raised btn-success" href="" data-toggle="modal" data-target="#edit<?=$p->id_pesan?>">
                            <i class="mdi mdi-grease-pencil mr-2 text-white-400"></i>
                                Edit
                        </a>
                        <a class="btn btn btn-danger border-0" href="" data-toggle="modal" data-target="#hapus<?=$p->id_pesan?>">
                          <i class="mdi mdi-delete mr-2 text-white-400"></i>
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

  <?php foreach ($pemesanan as $p): ?>
    <div class="modal fade" id="edit<?=$p->id_pesan?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
      <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="ExampleModalLabel">Edit Data Pemesanan</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
           </div>
           <div class="modal-body">
             <?php echo validation_errors('<div class="error">'.'</div>'); ?>
             <form class="" action="<?=base_url()?>pengelola/Pemesanan/editPemesanan" method="POST" enctype="multipart/form-data">
               <table width="100%">
                 <input type="hidden" name="id" value="<?=$p->id_pesan?>">
                 <div class="form-group bmd-form-group">
                   <label for="nama" class="bmd-label-floating">Nama UMKM</label>
                   <input type="text" name="namalayanan" class="form-control" id="nama" required value="<?=$p->nama_umkm?>">
                 </div>

                 <div class="form-group bmd-form-group">
                   <label for="nama" class="bmd-label-floating">Layanan</label>
                  <select class="form-control" name="layanan">
                    <?php foreach ($layanan as $l): ?>
                      <option value="<?=$l->id_layanan?>"><?=$l->nama_layanan?></option>
                    <?php endforeach; ?>
                  </select>
                 </div>

                 <?php if ($status == 'mencari freelancer' || $status == 'pending'){ ?>
                   <div class="form-group bmd-form-group">
                     <label for="nama" class="bmd-label-floating">Nama Freelancer</label>
                    <select class="form-control" name="freelancer">
                        <option value="">-- Pilih Freelancer --</option>
                      <?php foreach ($freelancer as $f): ?>
                        <option value="<?=$f->id_user?>"><?=$f->nama?> - <?=$f->kategori_keahlian?></option>
                      <?php endforeach; ?>
                    </select>
                   </div>
                 <?php }else{ ?>
                   <input type="hidden" name="freelancer" value="<?=$p->id_freelancer?>">
                 <?php } ?>

                 <div class="form-group bmd-form-group">
                   <label for="nama" >Tanggal Mulai</label>
                   <input type="date" name="tglmulai" value="<?=$p->tgl_mulai?>" class="form-control">
                 </div>

                 <div class="form-group bmd-form-group">
                   <label for="nama" >Tanggal Akhir</label>
                   <input type="date" name="tglakhir" value="<?=$p->tgl_akhir?>" class="form-control">
                 </div>

                 <div class="form-group bmd-form-group">
                   <label for="nama" class="bmd-label-floating">Jumlah</label>
                   <input type="number" name="jumlah" class="form-control" id="nama" required value="<?=$p->jumlah?>">
                 </div>

                 <?php if ($p->status == 'review' || $p->status == 'revisi' || $p->status == 'approval'){ ?>
                   <div class="form-group bmd-form-group">
                     <label for="nama" class="bmd-label-floating">Detail Revisi</label>
                     <textarea name="detailrevisi" rows="8" cols="80" class="form-control"><?=$p->detail_revisi?></textarea>
                   </div>
                 <?php }else{ ?>
                 <div class="form-group bmd-form-group">
                   <label for="nama" class="bmd-label-floating">Keterangan Order</label>
                   <textarea name="keterangan" rows="8" cols="80" class="form-control"><?=$p->keterangan_order?></textarea>
                 </div>
               <?php } ?>

               <div class="form-group bmd-form-group">
                 <label for="nama" class="bmd-label-floating">Status</label>
                <select class="form-control" name="status">
                    <option value="<?=$p->status?>"><?=$p->status?></option>
                    <option value="pending">Pending</option>
                    <option value="mencari freelancer">Mencari Freelancer</option>
                    <option value="on going">On Going</option>
                    <option value="review">Review</option>
                    <option value="revisi">Revisi</option>
                    <option value="approval">Approval</option>
                </select>
               </div>

               </table>
           </div>
           <div class="modal-footer justify-content-between">
             <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
             <input type="submit" class="btn btn-danger" value="Edit">
           </div>
         </form>
         </div>
         <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        </div>
  <?php endforeach; ?>

  <?php foreach ($pemesanan as $p): ?>
    <div class="modal fade" id="hapus<?=$p->id_pesan?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
      <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="ExampleModalLabel">Hapus Data Pemesanan</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
           </div>
           <div class="modal-body">
             <p>Apakah Anda yakin ingin menghapus pemesanan ID P000<?=$p->id_pesan?></p>
           </div>
           <div class="modal-footer justify-content-between">
             <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
             <a href="<?=base_url()?>pengelola/Pemesanan/hapusPemesanan/<?=$p->id_pesan?>" class="form-control" ></a>
           </div>
         </div>
         <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        </div>
  <?php endforeach; ?>

<?php $this->load->view('templates/dasbor/footer'); ?>
