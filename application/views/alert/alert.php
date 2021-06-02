<?php foreach($alerts as $jenis => $pesan): ?>
  <?php if (empty($pesan)) continue; ?>
  <div class="row">
    <div class="col-12">
      <div class="alert alert-<?= $jenis; ?> alert-dismissible fade show  mb-0 mt-3" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <ul>
        <?php foreach($pesan as $p): ?>
          <li><?= $p; ?></li>
        <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
<?php endforeach; ?>
