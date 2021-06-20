<?php $this->load->view('templates/dasbor/header'); ?>

<?php $this->load->view('freelancer/layouts/sidebar'); ?>

<!-- Start right Content here -->

<div class="content-page">
  <!-- Start content -->
  <div class="content">

    <?php $this->load->view('freelancer/layouts/navbar'); ?>

    <div class="page-content-wrapper dashborad-v">

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="page-title-box">
              <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                  <li class="breadcrumb-item"><a href="#">Freelancer</a></li>
                  <li class="breadcrumb-item active">Kelola Portofolio</li>
                </ol>
              </div>
              <div class="col">
                <h2 style="float:left">Kelola Portofolio</h2>
                <button type="button" class="btn btn-primary" name="button" style="background-color:#FE826E;color:white;margin-left:25px;margin-top:10px"><?=$user->nama?></button>
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
                      <h4 class="mt-0 header-title">Data Kelola Portofolio</h4>
                      <p class="text-muted font-14">Berikut adalah data-data portofolio diri Anda.
                      </p>
                      <a class="btn btn-raised btn-warning" href="" data-toggle="modal" data-target="#tambah">
                          <i class="mdi mdi-plus mr-2 text-white-400"></i>
                              Tambah Portofolio
                      </a>
                      <br><br><br>
                      <table id="datatable" class="table table-bordered" style="width:100%">
                          <thead>
                          <tr>
                              <th>No</th>
                              <th>Judul Portofolio</th>
                              <th>Bukti Portofolio</th>
                              <th>Detail Portofolio</th>
                              <th>Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            foreach ($dataportofolio as $p): ?>
                            <tr>
                              <td><?=$no++?></td>
                              <td><?=$p->judul?></td>
                              <td>
                                <a class="btn btn-raised btn-default" href="" data-toggle="modal" data-target="#lihat<?=$p->id_portofolio?>">
                                    <i class="mdi mdi-eye mr-2 text-white-400"></i>
                                        Lihat
                                </a>
                              </td>
                              <td><?=$p->detail_portofolio ?></td>
                              <td>
                                <a class="btn btn-raised btn-success" href="" data-toggle="modal" data-target="#edit<?=$p->id_portofolio?>">
                                    <i class="mdi mdi-grease-pencil mr-2 text-white-400"></i>
                                        Edit
                                </a>
                                <a class="btn btn-raised btn-danger" href="" data-toggle="modal" data-target="#hapus<?=$p->id_portofolio?>">
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
                 <h4 class="modal-title" id="ExampleModalLabel">Tambah Data Portofolio</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
                 </div>
                 <div class="modal-body">
                   <?php echo validation_errors('<div class="error">'.'</div>'); ?>
                   <form class="" action="<?=base_url()?>freelancer/Portofolio/InputPortofolio" method="POST" enctype="multipart/form-data">
                     <table width="100%">
                       <tr>
                         <td>Judul Portofolio</td>
                         <td>:</td>
                         <td colspan="3"><input type="text" class="form-control" name="judulportofolio"></td>
                       </tr>
                       <tr>
                         <td>Bukti Portofolio</td>
                         <td>:</td>
                         <td><input type="file" class="form-control" name="buktiportofolio"></td>
                         <td>atau</td>
                         <td><input type="text" class="form-control" name="urlportofolio"></td>
                       </tr>
                       <tr>
                         <td>Detail Portofolio</td>
                         <td>:</td>
                         <td colspan="3"><textarea class="form-control" name="detailportofolio" rows="8" cols="80"></textarea></td>
                       </tr>
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

              <?php foreach ($dataportofolio as $p): ?>
                <div class="modal fade" id="edit<?=$p->id_portofolio?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
                  <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h4 class="modal-title" id="ExampleModalLabel">Edit Data Portofolio</h4>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                       </div>
                       <div class="modal-body">
                         <?php echo validation_errors('<div class="error">'.'</div>'); ?>
                         <form class="" action="<?=base_url()?>freelancer/Portofolio/EditPortofolio" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="id" value="<?=$p->id_portofolio?>">
                           <table width="100%">
                             <tr>
                               <td>Judul Portofolio</td>
                               <td>:</td>
                               <td colspan="3"><input type="text" class="form-control" name="judulportofolio" value="<?=$p->judul?>"></td>
                             </tr>
                             <tr>
                               <td>Bukti Portofolio</td>
                               <td>:</td>
                               <td><input type="file" class="form-control" name="buktiportofolio"></td>
                               <td>atau</td>
                               <td><input type="text" class="form-control" name="urlportofolio"></td>
                             </tr>
                             <tr>
                               <td>Detail Portofolio</td>
                               <td>:</td>
                               <td colspan="3"><textarea class="form-control" name="detailportofolio" rows="8" cols="80"><?=$p->detail_portofolio?></textarea></td>
                             </tr>
                           </table>
                       </div>
                       <div class="modal-footer justify-content-between">
                         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                         <input type="submit" class="btn btn-danger" value="Submit">
                       </div>
                     </form>
                     </div>
                     <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                    </div>
              <?php endforeach; ?>

              <?php foreach ($dataportofolio as $p): ?>
                <div class="modal fade" id="hapus<?=$p->id_portofolio?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
                  <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h4 class="modal-title" id="ExampleModalLabel">Hapus Data Portofolio</h4>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                       </div>
                       <div class="modal-body">
                           Apakah Anda yakin akan menghapus data ini P000<?=$p->id_portofolio?>
                       </div>
                       <div class="modal-footer justify-content-between">
                         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                         <a href="<?=base_url()?>Portofolio/HapusPortofolio/<?=$p->id_portofolio?>" class="btn btn-danger">Hapus</a>
                       </div>
                     </div>
                     <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                    </div>
              <?php endforeach; ?>

              <?php foreach ($dataportofolio as $p): ?>
                <div class="modal fade" id="lihat<?=$p->id_portofolio?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
                  <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h4 class="modal-title" id="ExampleModalLabel">Lihat Data Portofolio</h4>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                       </div>
                       <div class="modal-body">
                         <center>
                         <img src="<?=base_url()?>uploads/foto_portofolio/<?=$p->bukti_portofolio?>" alt="Bukti Portofolio" width="450px">
                         <br>
                         <p>Jika gambar tidak muncul, klik disini ⬇⬇</p>
                         <a href="<?=$p->bukti_portofolio?>" target="_blank" class="btn btn-primary">Klik disini</a>
                       </center>
                       </div>
                       <div class="modal-footer justify-content-between">
                         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                       </div>
                     </div>
                     <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                    </div>
              <?php endforeach; ?>


<?php $this->load->view('templates/dasbor/footer'); ?>
