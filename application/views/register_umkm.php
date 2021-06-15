<?php $this->load->view('templates/dasbor/header-form'); ?>

<!-- Isi Form Registrasi -->

<div class="px-3">
  <div class="mt-4">
    <?= validation_errors('<div class="error">', '</div>'); ?>
  </div>

  <?php $this->alert->tampilkan(); ?>

  <span class="text-muted">Daftar sebagai: </span>
  <div class="d-flex" id="container-pilihan-registrasi">
    <a href="<?=base_url()?>regUmkm" class="mr-2">
        <button class="btn waves-effect pilihan-registrasi">UMKM</button>
    </a>
    <a href="<?=base_url()?>regFreelancer">
        <button class=" text-muted btn waves-effect">Freelancer</button>
    </a>
  </div>

  <?= form_open('regUmkm', ['class' => 'form-horizontal']) ?>

    <div class="form-group bmd-form-group">
      <label for="nama" class="bmd-label-floating">Nama Lengkap</label>
      <input type="text" name="nama" class="form-control" id="nama" required>
    </div>

    <div class="form-group bmd-form-group">
      <label for="email" class="bmd-label-floating">Email</label>
      <input type="email" name="email" class="form-control" id="email" required>
    </div>

    <!-- <div class="form-group bmd-form-group">
      <label for="namaumkm" class="bmd-label-floating">Nama UMKM</label>
      <input type="text" name="namaumkm" class="form-control" id="no_wa" required>
    </div> -->

    <div class="form-group bmd-form-group">
      <label for="no_wa" class="bmd-label-floating">No. Whatsapp</label>
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

    <div class="form-group text-right row m-t-40">
      <div class="col-12">
        <button class="btn btn-warning btn-raised btn-block waves-effect waves-light" type="submit">Daftar</button>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-12 text-center">
        <a href="login" class="text-muted"><i class="mdi mdi-account-circle"></i> Sudah punya akun ?</a>
      </div>
    </div>

  <?= form_close(); ?>

</div>

<?php $this->load->view('templates/dasbor/footer-form'); ?>
