<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>WebManager - <?= $this->e($title) ?></title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= $this->url() ?>vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="<?= $this->url() ?>css/orionicons.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= $this->url() ?>css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= $this->url() ?>css/custom.css">

    <link rel="shortcut icon" href="<?= $this->url() ?>img/favicon.png?3">

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<!-- navbar-->
<header class="header">
    <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
        <a href="<?= $this->url() ?>" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead">
            <i class="fas fa-align-left"></i>
        </a>
        <a href="<?= $this->url() ?>" class="navbar-brand font-weight-bold text-uppercase text-base">
            FiveM Web-Manager
        </a>
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0"></ul>
    </nav>
</header>

<div class="d-flex align-items-stretch">
    <!-- SIDEBAR -->
    <?php
    if ($this->session('logged_in')) {
        echo '<div id="sidebar" class="sidebar py-3">' . $this->fetch('sidebar') . '</div>';
    }
    ?>

    <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
            <!-- DYNAMIC CONTENT -->
            <?= $this->section('content') ?>
        </div>

        <!-- FOOTER -->
        <footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 text-center text-md-left text-primary">
                        <p class="mb-2 mb-md-0">FiveM Web-Manager &copy; <?= $this->year() ?></p>
                    </div>
                    <div class="col-md-6 text-center text-md-right text-gray-400">
                        <p class="mb-0">
                            Design by <a href="https://bootstrapious.com/admin-templates"
                                         class="external text-gray-400">Bootstrapious</a>
                        </p>
                        <p class="mb-0">
                            Code by <a href="https://github.com/RealPolluX"
                                       class="external text-gray-400">RealPolluX</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<!-- JavaScript files-->
<script src="<?= $this->url() ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= $this->url() ?>vendor/popper.js/umd/popper.min.js"></script>
<script src="<?= $this->url() ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= $this->url() ?>vendor/jquery.cookie/jquery.cookie.js"></script>
<script src="<?= $this->url() ?>vendor/chart.js/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="<?= $this->url() ?>js/charts-home.js"></script>
<script src="<?= $this->url() ?>js/front.js"></script>
</body>
</html>
