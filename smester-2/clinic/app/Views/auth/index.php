<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pada Mari | <?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('/assets'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('/assets'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('/assets'); ?>/dist/css/adminlte.min.css">

    <style>
        .login-page {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(http://localhost/clinic/public/assets/dist/img/book-bg.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body class="login-page">
    <div class="flash-success" data-success="<?= session()->getFlashdata('success'); ?>"></div>
    <div class="flash-error" data-error="<?= session()->getFlashdata('error'); ?>"></div>
    <div class="flash-warning" data-warning="<?= session()->getFlashdata('warning'); ?>"></div>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline text-light card-warning">
            <div class="card-header border-warning text-center">
                <span class="h1"><b>Pada Mari</b>CLINIC</span>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan Login terlebih dahulu</p>

                <form action="<?= base_url('/login'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="username" class="form-control" name="username" id="username" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-warning btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('/assets'); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('/assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('/assets'); ?>/dist/js/adminlte.min.js"></script>

    <script src="<?= base_url('/assets'); ?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>

    <script src="<?= base_url('/assets'); ?>/dist/js/javascript.js"></script>


</body>

</html>