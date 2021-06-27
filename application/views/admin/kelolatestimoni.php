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
                  <li class="breadcrumb-item active">Kelola Testimoni</li>
                </ol>
              </div>
              <div class="col">
                <h2 style="float:left">Kelola Testimoni</h2>
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
                      <h4 class="mt-0 header-title">Data Testimoni SME-Branding</h4>
                      <p class="text-muted font-14">Berikut adalah data-data testimoni hasil sme-branding
                      </p>
                      <br>
                      <table id="datatable" class="table table-bordered" style="width:100%">
                          <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama UMKM</th>
                              <th>Detail Testimoni</th>
                              <th>Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            foreach ($datatestimoni as $p): ?>
                            <tr>
                              <td><?=$no++?></td>
                              <td><?=$p->nama_umkm?></td>
                              <td><?=$p->detail_testimoni?></td>
                              <td>
                                <a class="btn btn-raised btn-danger" href="" data-toggle="modal" data-target="#hapus<?=$p->id_testimoni?>">
                                    <i class="mdi mdi-eraser mr-2 text-white-400"></i>
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

      <?php foreach ($datatestimoni as $p): ?>
        <div class="modal fade" id="hapus<?=$p->id_testimoni?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
          <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h4 class="modal-title" id="ExampleModalLabel">Hapus Data Testimoni</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
                 <p>Apakah Anda ingin menghapus testimoni <span style="color:red"><?=$p->nama_umkm?></span> </p>
               </div>
               <div class="modal-footer justify-content-between">
                 <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                 <a href="<?=base_url()?>pengelola/Testimoni/hapusTestimoni/<?=$p->id_testimoni?>" class="btn btn-danger">Iya</a>
               </div>
             </form>
             </div>
             <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
            </div>
      <?php endforeach; ?>
<?php $this->load->view('templates/dasbor/footer'); ?>
