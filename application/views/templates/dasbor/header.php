<!DOCTYPE html>
<html lang="id">

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?= ucfirst($title ?? $this->session->level).' - SME Branding'  ?></title>

    <link rel="shortcut icon" href="assets/favicons/favicon-32x32.png">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/plugins/fullcalendar/vanillaCalendar.css"/>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/plugins/jvectormap/jquery-jvectormap-2.0.2.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/plugins/morris/morris.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/plugins/metro/MetroJs.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/plugins/carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/plugins/carousel/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/plugins/animate/animate.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/bootstrap-material-design.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/icons.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/style.css" type="text/css">

  </head>

  <body class="fixed-left">

    <!-- Loader -->
    <!-- TODO: gunakan ini saat production saja -->
    <!-- <div id="preloader">
      <div id="status">
        <div class="spinner"></div>
      </div>
    </div> -->

    <!-- Begin page -->
    <div id="wrapper">
