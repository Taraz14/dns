<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DNS | <?= (isset($title)) ? $title : "Login Page"; ?></title>

    <link href="<?= base_url() ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/admin/css/animate.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/admin/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <h2 class="font-bold">Welcome to DNS</h2>

                <?php if (!empty($this->session->flashdata('message'))) : ?>
                    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                        <span class="badge badge-pill badge-primary"><i class="fa fa-info-circle"></i></span>
                        <?php echo $this->session->flashdata('message'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <div class="ibox-content">
                    <?= form_open(''); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" name="username" required="">
                        <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" required="">
                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div style="margin-left: 10px;" class="g-recaptcha" data-sitekey="6LeTf9wUAAAAAJz_WdxvVnsfJH-LZShuNU_V9zye"></div>
                    <button type="submit" name="btnSignIn" value="true" class="btn btn-primary block full-width m-b" style="margin-top: 20px;">Login</button>
                    <?= form_close(); ?>
                    <a href="<?= site_url('homepage') ?>" class="text-primary"> Back To Home </a>
                    <p class="m-t text-center">
                        <small>Determination of Nutritional Status &copy; 2019</small>
                    </p>
                </div>
            </div>
            <div class="col-md-3"></div>


        </div>
        <hr />
        <div class="row">
            <div class="col-md-6">
                Determination of Nutritional Status
            </div>
            <div class="col-md-6 text-right">
                <small>© 2019-2020</small>
            </div>
        </div>
    </div>
    <script src="<?= base_url() ?>assets/admin/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/bootstrap.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>