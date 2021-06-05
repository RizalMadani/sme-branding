<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Login - SME Branding</title>

    <link rel="shortcut icon" href="assets/admin/images/favicon.ico">

    <link href="<?=base_url()?>assets/admin/plugins/animate/animate.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/admin/css/bootstrap-material-design.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/admin/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/admin/css/style.css" rel="stylesheet" type="text/css">

  </head>
  <body>


  <div class="accountbg-custom"></div>

  <div class="container">

    <div class="row py-5" style="align-items: center;">

      <div class="col-md-6 col-lg-7 text-center" id="dekorasi">
        <img src="<?=base_url()?>assets/admin/images/logosme.jpg" alt="dekorasi" class="img-fluid" style="width: 100%;border-radius:40px;">
      </div>
      <div class="col-md-4 col-lg-4">
        <div class="card" id="card-form" style="width:450px">
          <div class="card-body">

            <div class="text-center">
              <img src="<?=base_url()?>assets/admin/images/logosme.jpg" alt="logo" style="max-width: 200px;"/>
            </div>
            <br><br>
            <div class="px-3">
              <div class="row">
                <center style="margin-left:25%">
                <a href="<?=base_url()?>Registrasi">
                    <button class="btn btn-warning btn-raised btn-block waves-effect waves-light">UMKM</button>
                </a>
                <a href="<?=base_url()?>Registrasi/regFreelancer">
                    <button class="btn btn-light btn-raised btn-block waves-effect" style="color:black">Freelancer</button>
                </a>
              </center>
              </div>

              <?= form_open(base_url('Auth/regFree'), ['name' => 'form-login', 'class' => 'form-horizontal']) ?>

                <div class="mt-4">
                  <?= validation_errors('<div class="error">', '</div>'); ?>
                </div>

                <?php $this->alert->tampilkan(); ?>

                <div class="form-group bmd-form-group">
                  <label for="nama" class="bmd-label-floating">Nama Lengkap</label>
                  <input type="text" name="nama" class="form-control" id="nama" required>
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

                <div class="form-group bmd-form-group">
                  <label for="email" class="bmd-label-floating">Email</label>
                  <input type="email" name="email" class="form-control" id="email" required>
                </div>
<!--
                <div class="form-group bmd-form-group">
                  <label for="keahlian" class="bmd-label-floating">Keahlian</label>
                  <select class="form-control" name="kategori">
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                  </select>
                </div> -->

                <div class="form-group bmd-form-group">
                  <label for="no_wa" class="bmd-label-floating">No.Whatsapp</label>
                  <input type="text" name="no_wa" class="form-control" id="no_wa" required>
                </div>

                <div class="form-group text-right row m-t-40">
                  <div class="col-12">
                    <button class="btn btn-warning btn-raised btn-block waves-effect waves-light" type="submit">Registrasi</button>
                  </div>
                </div>

                <div class="form-group row">
                  <!-- <div class="col-sm-6">
                    <a href="#" class="text-muted"><i class="mdi mdi-lock"></i> Lupa Password ?</a>
                  </div> -->
                  <div class="col-12 text-center">
                    <a href="<?= base_url(); ?>Auth/loghin" class="text-muted"><i class="mdi mdi-account-circle"></i> Sudah punya akun ?</a>
                  </div>
                </div>

              <?= form_close(); ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- jQuery  -->
  <script src="<?=base_url()?>assets/admin/js/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/admin/js/popper.min.js"></script>
  <script src="<?=base_url()?>assets/admin/js/bootstrap-material-design.js"></script>
  <script src="<?=base_url()?>assets/admin/js/modernizr.min.js"></script>
  <script src="<?=base_url()?>assets/admin/js/detect.js"></script>
  <script src="<?=base_url()?>assets/admin/js/fastclick.js"></script>
  <script src="<?=base_url()?>assets/admin/js/jquery.slimscroll.js"></script>
  <script src="<?=base_url()?>assets/admin/js/jquery.blockUI.js"></script>
  <script src="<?=base_url()?>assets/admin/js/waves.js"></script>
  <script src="<?=base_url()?>assets/admin/js/jquery.nicescroll.js"></script>
  <script src="<?=base_url()?>assets/admin/js/jquery.scrollTo.min.js"></script>

  <script src="<?=base_url()?>assets/admin/pages/login.js"></script>


  <!-- App js -->
  <script src="<?=base_url()?>assets/admin/js/app.js"></script>

  </body>
</html>
