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

          <div class="text-center">
            <span class="form-title">Login Form 1</span>
          </div>

          <?= form_open('/login', ['class' => 'mt-4']); ?>

            <div class="form-group">
              <label for="password">Username</label>
              <input name="username" id="username" type="text">
            </div>

            <div class="form-group">
              <label for="password">Password</label>

              <div class="d-flex align-items-center">
                <input name="password" id="password" type="password" class="m-0">
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

        <div class="m-4">&emsp;</div>

        <!-- Form 2 -->
        <div class="card--form-glass p-4">
          <div class="text-center mb-4">
            <a href="<?= base_url(); ?>" class="logo-container">
              <img class="logo--form" src="assets/logos/logo-vertikal.png">
            </a>
          </div>

          <div class="text-center">
            <span class="form-title">Login Form 2</span>
          </div>

          <?= form_open('/login', ['class' => 'mt-4']); ?>

            <div class="form-group">
              <label for="password">Username</label>
              <input name="username" id="username" type="text">
            </div>

            <div class="form-group">
              <label for="password">Password</label>

              <div class="d-flex align-items-center">
                <input name="password" id="password" type="password" class="m-0">
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


  <!-- jQuery Scripts -->
  <script src="assets/lp/js/jquery.min.js"></script>
  <script src="assets/lp/js/bootstrap.min.js"></script>
  <script src="assets/lp/js/plugins.js"></script>
  <script src="assets/lp/js/scripts.js"></script>

  <script>
    let pass_eye = document.getElementById('pass-eye');

    pass_eye.addEventListener('click', function(){
      pass_eye.classList.toggle('hide-pass');

      let input_pass = document.getElementById('password');
      let pass_type = input_pass.type;

      if (pass_type === 'password') {
          input_pass.type = 'text';
      } else {
          input_pass.type = 'password';
      }
    });
  </script>

  <!-- Cookies -->
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
  <script src="js/cookies.js"></script> -->

</body>
</html>
