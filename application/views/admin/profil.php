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
                  <li class="breadcrumb-item"><a href="#">Admin</a></li>
                  <li class="breadcrumb-item active">Kelola Profil</li>
                </ol>
              </div>
              <div class="col">
                <h2 style="float:left">Kelola Profil</h2>
                <button type="button" class="btn btn-primary" name="button" style="background-color:#FE826E;color:white;margin-left:25px;margin-top:10px"><?=$user->nama?></button>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>

        <!-- end page title end breadcrumb -->
        <div class="row">
          <div class="col-md-12 col-xl-12">
              <div class="card m-b-30">
                  <div class="card-body">
                      <h4 class="mt-0 header-title">Kelola Profil</h4>
                      <p class="text-muted font-14">Lengkapi profil Anda dengan baik dan <code>benar</code>.</p>
                      <div class="general-label">
                          <form action="<?=base_url()?>pengelola/Profil/updateProfil" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <img src="<?=base_url()?>uploads/foto_user/<?=$user->foto?>" alt=""  class="rounded-circle" width="150px">
                              <input type="file" class="form-control" name="foto">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNama1" class="bmd-label-floating ">Nama Lengkap</label>
                                <input type="text" class="form-control" required id="exampleInputNama1" value="<?=$user->nama?>" name="nama">
                            </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1" class="bmd-label-floating ">Email</label>
                                  <input type="email" class="form-control" required id="exampleInputEmail1" value="<?=$user->email?>" name="email">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputUsername1" class="bmd-label-floating ">Username</label>
                                  <input type="text" class="form-control" required id="exampleInputUsername1" value="<?=$user->username?>" name="username">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1" class="bmd-label-floating">Password</label>
                                  <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputNoWatsap1" class="bmd-label-floating ">No. Whatsapp</label>
                                  <input type="text" class="form-control" required id="exampleInputNoWatsap1" value="<?=$user->no_wa?>" name="no_wa">
                              </div>

                              <input type="submit" class="btn btn-primary btn-raised mb-0" value="Submit">
                          </form>
                      </div>
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
