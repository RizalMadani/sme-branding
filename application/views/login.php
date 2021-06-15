<?php $this->load->view('templates/dasbor/header-form'); ?>

<!-- Isi Form Login -->
<div class="px-3">
  <div class="error">
    <?= validation_errors(); ?>

    <?php foreach($this->alert->getAlerts('danger') as $p): ?>
      <p><?= $p ?></p>
    <?php endforeach; ?>
  </div>

  <?= form_open('login', ['class' => 'form-horizontal']) ?>
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

    <div class="bmd-form-group is-filled">
      <div class="checkbox mb-2">
        <label>
            <input type="checkbox" name="remember-me" value="1" id="remember-check" checked>
            <span class="checkbox-decorator">
              <span class="check"></span>
            </span> Biarkan Saya tetap masuk
        </label>
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
        <a href="<?= base_url(); ?>#daftar" class="text-muted"><i class="mdi mdi-account-circle"></i> Belum punya akun ?</a>
      </div>
    </div>

  <?= form_close(); ?>

</div>

<?php $this->load->view('templates/dasbor/footer-form'); ?>
