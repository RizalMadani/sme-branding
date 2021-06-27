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
                  <li class="breadcrumb-item active">Kelola Pekerjaan</li>
                  <li class="breadcrumb-item active">On Going</li>
                </ol>
              </div>
              <div class="col">
                <h2 style="float:left">Kelola Pekerjaan</h2>
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
                      <h4 class="mt-0 header-title">Data Kelola Pekerjaan</h4>
                      <p class="text-muted font-14">Berikut adalah kelola pekerjaan Anda
                      </p>
                      <a class="btn btn-raised btn-warning" href="" data-toggle="modal" data-target="#input">
                          <i class="mdi mdi-plus mr-2 text-white-400"></i>
                              Tambah Hasil Pemesanan
                      </a>
                      <br>
                      <table id="datatable" class="table table-bordered" style="width:100%">
                          <thead>
                          <tr>
                              <th>No</th>
                              <th>Pesanan</th>
                              <th>Layanan</th>
                              <th>UMKM</th>
                              <th>Tgl Mulai</th>
                              <th>Tgl Akhir</th>
                              <th>Jumlah</th>
                              <th>Status</th>
                              <th>Hasil Pemesanan</th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            foreach ($datapesanan as $p): ?>
                            <tr>
                              <td><?=$no++?></td>
                              <td>P000<?=$p->id_pesan?></td>
                              <td><?=$p->nama_layanan?></td>
                              <td><?=$p->nama_umkm?></td>
                              <td><?=$p->tgl_mulai?></td>
                              <td><?=$p->tgl_akhir?></td>
                              <td><?=$p->jumlah?></td>
                              <td><?=$p->status?></td>
                              <td>
                                <a class="btn btn-raised btn-info" href="" data-toggle="modal" data-target="#lihat<?=$p->id_pesan?>">
                                    <i class="mdi mdi-eye mr-2 text-white-400"></i>
                                        Detail
                                </a>
                                <a class="btn btn-raised btn-success" href="" data-toggle="modal" data-target="#edit<?=$p->id_pesan?>">
                                    <i class="mdi mdi-grease-pencil mr-2 text-white-400"></i>
                                        Edit
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
  <?php foreach ($datapesanan as $p): ?>
    <div class="modal fade" id="lihat<?=$p->id_pesan?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
      <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="ExampleModalLabel">Lihat Data Pesanan</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
           </div>
           <div class="modal-body">
             <center>
             <img src="<?=base_url()?>uploads/hasil_pemesanan/<?=$p->hasil_foto?>" alt="Bukti Portofolio" width="450px">
             <br>
             <p>Jika gambar tidak muncul, klik disini ⬇⬇</p>
             <a href="<?=$p->link?>" target="_blank" class="btn btn-primary">Klik disini</a>
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

  <?php foreach ($datapesanan as $p): ?>
    <div class="modal fade" id="edit<?=$p->id_pesan?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
      <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="ExampleModalLabel">Edit Data Hasil Pesanan</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
           </div>
           <div class="modal-body">
             <?php echo validation_errors('<div class="error">'.'</div>'); ?>
             <form class="" action="<?=base_url()?>freelancer/Pekerjaan/updatePekerjaan" method="POST" enctype="multipart/form-data">
               <input type="hidden" name="id" value="<?=$p->id_hasil_pemesanan?>">
               <input type="hidden" name="idpesan" value="<?=$p->id_pesan?>">
               <table width="100%">
                 <tr>
                   <td>Link Hasil</td>
                   <td>:</td>
                   <td ><input type="text" class="form-control" name="link" value="<?=$p->link?>"></td>
                 </tr>
                 <tr>
                   <td>Bukti Foto</td>
                   <td>:</td>
                   <td><input type="file" class="form-control" name="foto"></td>
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

    <div class="modal fade" id="input" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
      <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="ExampleModalLabel">Tambah Data Hasil Pesanan</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
           </div>
           <div class="modal-body">
             <?php echo validation_errors('<div class="error">'.'</div>'); ?>
             <form class="" action="<?=base_url()?>freelancer/Pekerjaan/inputHasil" method="POST" enctype="multipart/form-data">
               <table width="100%">
                 <tr>
                   <tr>
                     <td>Pesanan</td>
                     <td>:</td>
                     <td>
                      <select class="form-control" name="idpesan">
                        <option value="">-- Pilih IDPesan --</option>
                        <?php foreach ($pesan as $p): ?>
                            <option value="<?=$p->id_pesan?>"><?=$p->id_pesan?> - <?=$p->nama_umkm?></option>
                        <?php endforeach; ?>
                      </select>
                     </td>
                   </tr>
                 </tr>
                 <tr>
                   <td>Link Hasil</td>
                   <td>:</td>
                   <td ><input type="text" class="form-control" name="link"></td>
                 </tr>
                 <tr>
                   <td>Bukti Foto</td>
                   <td>:</td>
                   <td><input type="file" class="form-control" name="foto"></td>
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

<?php $this->load->view('templates/dasbor/footer'); ?>
