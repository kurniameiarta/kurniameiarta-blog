<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WSW Blog Dashboard - <?php isset($title) ? print($title) : '' ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> -->
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('dashboard/dist/css/adminlte.min.css') ?>">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?= $this->include('dashboard/partials/navbar'); ?>

    <!-- Main Sidebar Container -->
    <?= $this->include('dashboard/partials/sidebar'); ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?= $this->include('dashboard/partials/header'); ?>

      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <!-- <div class="row"> -->
          <?= $this->renderSection('content'); ?>
          <!-- </div> -->
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?= $this->include('dashboard/partials/footer'); ?>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <!-- datatables -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <!-- jQuery -->
  <script src="<?= base_url('dashboard/plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap -->
  <script src="<?= base_url('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- AdminLTE -->
  <script src="<?= base_url('dashboard/dist/js/adminlte.js') ?>"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="<?= base_url('dashboard/plugins/chart.js/Chart.min.js') ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('dashboard/dist/js/demo.js') ?>"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="<?= base_url('dashboard/dist/js/pages/dashboard3.js') ?>"></script> -->
</body>

</html>