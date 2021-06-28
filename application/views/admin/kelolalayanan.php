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
                  <li class="breadcrumb-item active">Kelola Layanan</li>
                </ol>
              </div>
              <div class="col">
                <h2 style="float:left">Kelola Layanan</h2>
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
                      <h4 class="mt-0 header-title">Data Layanan SME-Branding</h4>
                      <p class="text-muted font-14">Berikut adalah data-data layanan sme-branding
                      </p>
                      <a class="btn btn-raised btn-warning" href="" data-toggle="modal" data-target="#tambah">
                          <i class="mdi mdi-plus mr-2 text-white-400"></i>
                              Tambah Layanan
                      </a>
                      <br>
                      <table id="datatable" class="table table-bordered" style="width:100%">
                          <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama Layanan</th>
                              <th>Harga</th>
                              <th>Detail Layanan</th>
                              <th>Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            foreach ($datalayanan as $p): ?>
                            <tr>
                              <td><?=$no++?></td>
                              <td><?= ucwords($p->nama_layanan); ?></td>
                              <td>Rp <?=number_format($p->harga,0,',','.')?></td>
                              <td><?=$p->detail_layanan?></td>
                              <td>
                                <a class="btn btn-raised btn-success" href="" data-toggle="modal" data-target="#edit<?=$p->id_layanan?>">
                                    <i class="mdi mdi-grease-pencil mr-2 text-white-400"></i>
                                        Edit
                                </a>
                                <a class="btn btn-raised btn-danger" href="" data-toggle="modal" data-target="#hapus<?=$p->id_layanan?>">
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
         <h4 class="modal-title" id="ExampleModalLabel">Tambah Data Layanan</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
         </div>
         <div class="modal-body">
           <?php echo validation_errors('<div class="error">'.'</div>'); ?>
           <form class="" action="<?=base_url()?>pengelola/Layanan/inputLayanan" method="POST" enctype="multipart/form-data">
             <table width="100%">
               <div class="form-group bmd-form-group">
                 <label for="nama" class="bmd-label-floating">Nama Layanan</label>
                 <input type="text" name="namalayanan" class="form-control" id="nama" required>
               </div>

               <div class="form-group bmd-form-group">
                 <label for="nama" class="bmd-label-floating">Harga Layanan</label>
                 <input type="number" name="harga" class="form-control" required >
               </div>

               <div class="form-group bmd-form-group">
                 <label for="nama" class="bmd-label-floating">Detail Layanan</label>
                 <textarea name="detail" rows="8" cols="80" class="form-control" required></textarea>
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

      <?php foreach ($datalayanan as $p): ?>
        <div class="modal fade" id="edit<?=$p->id_layanan?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
          <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h4 class="modal-title" id="ExampleModalLabel">Edit Data Layanan</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
                 <?php echo validation_errors('<div class="error">'.'</div>'); ?>
                 <form class="" action="<?=base_url()?>pengelola/Layanan/updateLayanan" method="POST" enctype="multipart/form-data">
                   <table width="100%">
                     <input type="hidden" name="id" value="<?=$p->id_layanan?>">
                     <div class="form-group bmd-form-group">
                       <label for="nama" class="bmd-label-floating">Nama Layanan</label>
                       <input type="text" name="namalayanan" class="form-control" id="nama" required value="<?=$p->nama_layanan?>">
                     </div>

                     <div class="form-group bmd-form-group">
                       <label for="nama" class="bmd-label-floating">Harga Layanan</label>
                       <input type="number" name="harga" class="form-control" required value="<?=$p->harga?>" >
                     </div>

                     <div class="form-group bmd-form-group">
                       <label for="nama" class="bmd-label-floating">Detail Layanan</label>
                       <textarea name="detail" rows="8" cols="80" class="form-control" required><?=$p->detail_layanan?></textarea>
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

      <?php foreach ($datalayanan as $p): ?>
        <div class="modal fade" id="hapus<?=$p->id_layanan?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
          <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h4 class="modal-title" id="ExampleModalLabel">Hapus Data Layanan</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
                 <p>Apakah Anda ingin menghapus layanan <span style="color:red"><?=$p->nama_layanan?></span> </p>
               </div>
               <div class="modal-footer justify-content-between">
                 <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                 <a href="<?=base_url()?>pengelola/Layanan/hapusLayanan/<?=$p->id_layanan?>" class="btn btn-danger">Iya</a>
               </div>
             </form>
             </div>
             <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
            </div>
      <?php endforeach; ?>
<?php $this->load->view('templates/dasbor/footer'); ?>
