<?php $this->load->view('templates/landingpage/header'); ?>
<!-- background by SVGBackgrounds.com -->
<div class="custom-bg"></div>

  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">

      <!-- Form 1 -->
      <div class="card--form p-4">
          <div class="text-center mb-4">
            <a href="<?= base_url(); ?>" class="logo-container">
              <img class="logo--form" src="assets/logos/logo-vertikal.png">
            </a>
          </div>

          <div class="text-center mb-4">
            <span class="form-title">Login Form 1</span>
          </div>

    <link href="<?=base_url()?>assets/admin/plugins/animate/animate.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/admin/css/bootstrap-material-design.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/admin/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/admin/css/style.css" rel="stylesheet" type="text/css">

            <?php foreach($this->alert->getAlerts('danger') as $p): ?>
              <p><?= $p ?></p>
            <?php endforeach; ?>
          </div>

          <?= form_open('/login', ['class' => 'mt-4']); ?>

            <div class="form-group">
              <label for="password">Username</label>
              <input name="username" id="username" type="text" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>

              <div class="d-flex align-items-center">
                <input name="password" id="password" type="password" class="m-0" required>
                <button type="button" class="btn ml-2 hide-pass" id="pass-eye">
                  <svg><use xlink:href="assets/lp/img/icons/orion-svg-sprite.svg#visible-1"></use></svg>
                </button>
              </div>

      <div class="col-md-6 col-lg-7 text-center" id="dekorasi">
        <img src="<?=base_url()?>assets/admin/images/logosme.jpg" alt="dekorasi" class="img-fluid" style="width: 100%;border-radius:40px;">
      </div>
      <div class="col-md-4 col-lg-4">
        <div class="card" id="card-form" style="width:450px">
          <div class="card-body">

            <div class="text-center">
              <img src="<?=base_url()?>assets/admin/images/logosme.jpg" alt="logo" style="max-width: 200px;"/>
            </div>

            <div class="px-3">
              <?= form_open(base_url('login'), ['name' => 'form-login', 'class' => 'form-horizontal']) ?>

                <div class="mt-4">
                  <?= validation_errors('<div class="error">', '</div>'); ?>
                </div>

                <?php $this->alert->tampilkan(); ?>

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

                <div class="form-group mt-4">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember-me" value="1" class="custom-control-input" id="remember-check">
                    <label class="custom-control-label" for="remember-check">Biarkan Saya tetap masuk</label>
                  </div>
                </div>

                <div class="form-group text-right row m-t-40">
                  <div class="col-12">
                    <button class="btn btn-warning btn-raised btn-block waves-effect waves-light" type="submit">Masuk</button>
                  </div>
                </div>

                <div class="form-group row">
                  <!-- <div class="col-sm-6">
                    <a href="#" class="text-muted"><i class="mdi mdi-lock"></i> Lupa Password ?</a>
                  </div> -->
                  <div class="col-12 text-center">
                    <a href="<?=base_url()?>Registrasi" class="text-muted"><i class="mdi mdi-account-circle"></i> Belum punya akun ?</a>
                  </div>
                </div>

              <?= form_close(); ?>

            <div class="text-center">
              <a href="<?= base_url(); ?>register" style="font-weight: bold;">
                Belum mendaftar?
              </a>
            </div>

          <?= form_close(); ?>
        </div>

        <div class="m-4">&emsp;</div>

        <!-- Form 2 -->
        <div class="card--form-glass p-4">
          <div class="text-center mb-4">
            <a href="<?= base_url(); ?>" class="logo-container">
              <img class="logo--form" src="assets/logos/logo-vertikal.png">
            </a>
          </div>

          <div class="text-center mb-4">
            <span class="form-title">Login Form 2</span>
          </div>

          <div class="error">
            <?= validation_errors(); ?>

            <?php foreach($this->alert->getAlerts('danger') as $p): ?>
              <p><?= $p ?></p>
            <?php endforeach; ?>
          </div>

          <?= form_open('/login', ['class' => 'mt-4']); ?>

            <div class="form-group">
              <label for="password">Username</label>
              <input name="username" id="username" type="text" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>

              <div class="d-flex align-items-center">
                <input name="password" id="password" type="password" class="m-0" required>
                <button type="button" class="btn ml-2 hide-pass" id="pass-eye">
                  <svg><use xlink:href="assets/lp/img/icons/orion-svg-sprite.svg#visible-1"></use></svg>
                </button>
              </div>

            </div>

            <div class="mt-4">
              <input type="checkbox" class="checkbox-input" name="remember-me" id="remember-me" value="1" checked="checked">
              <label for="remember-me">Biarkan Saya tetap masuk</label>
            </div>

            <div class="mt-48">
              <input type="submit" class="btn btn--md btn--color" value="Login">
            </div>

            <div class="text-center">
              <a href="<?= base_url(); ?>register" style="font-weight: bold;">
                Belum mendaftar?
              </a>
            </div>

          <?= form_close(); ?>
        </div>

      </div>
    </div>
  </div>

      <div id="back-to-top">
        <a href="#top"><i class="ui-arrow-up"></i></a>
      </div>

  </main> <!-- end main wrapper -->

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

  <script src="assets/lp/js/login.js"></script>

  <!-- App js -->
  <script src="<?=base_url()?>assets/admin/js/app.js"></script>

</body>
</html>
