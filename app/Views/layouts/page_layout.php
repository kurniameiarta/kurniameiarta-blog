<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>WSW Blog - <?php isset($title) ? print($title) : '' ?></title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/favicon.ico') ?>" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <?= $this->include('partials/navbar'); ?>
    <!-- Page Header-->
    <?php
    // Check the current route and include the corresponding header
    switch ($routeName) {
        case 'home':
            echo $this->include('partials/header_home');
            break;
        case 'about':
            echo $this->include('partials/header_about');
            break;
        case 'contact':
            echo $this->include('partials/header_contact');
            break;
        default:
            echo $this->include('partials/header');
    }
    ?>

    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                <?= $this->renderSection('content'); ?>

            </div>
        </div>
    </div>
    <!-- Footer-->
    <?= $this->include('partials/footer'); ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>