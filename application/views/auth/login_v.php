<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DNS | <?= (isset($title)) ? $title : "Login Page"; ?></title>

    <link href="<?= base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= base_url()?>assets/admin/css/animate.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/admin/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Welcome to DNS</h2>

                <p>
                    Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                </p>

                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>

                <p>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>

                <p>
                    <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
                </p>

            </div>
            <div class="col-md-6">
                <?php if(!empty($this->session->flashdata('message'))) : ?>
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
                            <?= form_error('username','<small class="text-danger">','</small>') ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password" required="">
                            <?= form_error('password','<small class="text-danger">','</small>') ?>
                        </div>
                        <button type="submit" name="btnSignIn" value="true" class="btn btn-primary block full-width m-b">Login</button>
                    <?= form_close(); ?>
                    <a href="<?= site_url('homepage') ?>" class="text-primary"> Back To Home </a>
                    <p class="m-t text-center">
                        <small>Determination of Nutritional Status &copy; 2019</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Determination of Nutritional Status
            </div>
            <div class="col-md-6 text-right">
               <small>© 2019-2020</small>
            </div>
        </div>
    </div>
    <script src="<?= base_url()?>assets/admin/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url()?>assets/admin/js/popper.min.js"></script>
    <script src="<?= base_url()?>assets/admin/js/bootstrap.min.js"></script>
</body>

</html>
