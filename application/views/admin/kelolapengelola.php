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
                  <li class="breadcrumb-item active">Kelola User</li>
                  <li class="breadcrumb-item active">Pengelola</li>
                </ol>
              </div>
              <div class="col">
                <h2 style="float:left">Kelola User</h2>
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
                      <h4 class="mt-0 header-title">Data Admin SME-Branding</h4>
                      <p class="text-muted font-14">Berikut adalah data-data admin sme-branding
                      </p>
                      <a class="btn btn-raised btn-warning" href="" data-toggle="modal" data-target="#tambah">
                          <i class="mdi mdi-plus mr-2 text-white-400"></i>
                              Tambah Admin
                      </a>
                      <br>
                      <table id="datatable" class="table table-bordered" style="width:100%">
                          <thead>
                          <tr>
                              <th>No</th>
                              <th>Username</th>
                              <th>Nama Lengkap</th>
                              <th>Email</th>
                              <th>No.Whatsapp</th>
                              <th>Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            foreach ($datapengelola as $p): ?>
                            <tr>
                              <td><?=$no++?></td>
                              <td><?=$p->username?></td>
                              <td><?=$p->nama?></td>
                              <td><?=$p->email?></td>
                              <td><?=$p->no_wa?></td>
                              <td>
                                <a class="btn btn-raised btn-success" href="" data-toggle="modal" data-target="#edit<?=$p->id_user?>">
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
  <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title" id="ExampleModalLabel">Tambah Data Admin</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
         </div>
         <div class="modal-body">
           <?php echo validation_errors('<div class="error">'.'</div>'); ?>
           <form class="" action="<?=base_url()?>pengelola/User/inputAdmin" method="POST" enctype="multipart/form-data">
             <table width="100%">
               <div class="form-group bmd-form-group">
                 <label for="nama" class="bmd-label-floating">Nama Lengkap</label>
                 <input type="text" name="nama" class="form-control" id="nama" required>
               </div>

               <div class="form-group bmd-form-group">
                 <label for="email" class="bmd-label-floating">Email</label>
                 <input type="email" name="email" class="form-control" id="email" required>
               </div>

               <div class="form-group bmd-form-group">
                 <label for="no_wa" class="bmd-label-floating">No.Whatsapp</label>
                 <input type="tel" name="no_wa" class="form-control" id="no_wa" required>
               </div>

               <div class="form-group bmd-form-group">
                 <label for="username" class="bmd-label-floating">Username</label>
                 <input type="text" name="username" class="form-control" id="username" required>
               </div>

               <div class="form-group bmd-form-group d-flex align-items-baseline">
                 <label for="password" class="bmd-label-floating">Password</label>
                 <input type="password" name="password" class="form-control" id="password" autocomplete="off" required>

                 <button type="button" class="btn ml-2" id="pass-eye">
                   <i class="mdi mdi-eye-off" id="eye-icon"></i>
                 </button>
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

      <?php foreach ($datapengelola as $p): ?>
        <div class="modal fade" id="edit<?=$p->id_user?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
          <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h4 class="modal-title" id="ExampleModalLabel">Edit Data Admin</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
                 <?php echo validation_errors('<div class="error">'.'</div>'); ?>
                 <form class="" action="<?=base_url()?>pengelola/User/updateAdmin" method="POST" enctype="multipart/form-data">
                   <table width="100%">
                     <input type="hidden" name="id" value="<?=$p->id_user?>">
                     <div class="form-group bmd-form-group">
                       <label for="nama" class="bmd-label-floating">Nama Lengkap</label>
                       <input type="text" name="nama" class="form-control" id="nama" required value="<?=$p->nama?>">
                     </div>

                     <div class="form-group bmd-form-group">
                       <label for="email" class="bmd-label-floating">Email</label>
                       <input type="email" name="email" class="form-control" id="email" required value="<?=$p->email?>">
                     </div>

                     <div class="form-group bmd-form-group">
                       <label for="no_wa" class="bmd-label-floating">No.Whatsapp</label>
                       <input type="tel" name="no_wa" class="form-control" id="no_wa" required value="<?=$p->no_wa?>">
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
<?php $this->load->view('templates/dasbor/footer'); ?>
