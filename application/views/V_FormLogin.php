<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Kinerja Sales</title>
    <link rel=" shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/assets/img/inflynetworks_LogoOnly.png">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- CDN Boostrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Vendors styles-->
    <link href="<?php echo base_url(); ?>assets/vendors/simplebar/css/simplebar.cs" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/vendors/simplebar.css" rel="stylesheet" />
    <!-- Main styles for this application-->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="<?php echo base_url(); ?>assets/css/examples.css" rel="stylesheet" />
</head>

<body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-7 p-4 mb-0">
                            <div class="card-body">
                                <h1>Login</h1>
                                <p class="text-medium-emphasis">Sign In to your account</p>

                                <form action="<?php echo base_url('C_FormLogin'); ?>" method="post">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">
                                            Username
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-envelope-at"></i></span>
                                            <input class="form-control" type="text" id="email_login" name="email_login" placeholder="Enter your username" required>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="password" class="form-label">
                                            Password
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-eye"></i></span>
                                            <input class="form-control" type="password" id="password_login" name="password_login" placeholder="Enter your password" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-primary px-4" type="submit">Login</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="<?php echo base_url(); ?>assets/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/simplebar/js/simplebar.min.js"></script>


</body>

</html>