<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registration</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        /* Container styling */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Full viewport height */
            background: linear-gradient(to right, #1F1717);
            /* Adjust as needed */
        }

        /* Image styling */
        .center-logo {
            height: 210px;
            /* Adjust height as needed */
        }

        /* Form styling */
        .login-form {
            width: 100%;
            max-width: 400px;
            /* Adjust maximum width as needed */
        }

       /* Custom button color */
    .btn-custom {
        background-color: #820300 !important;
        border-color: #820300 !important;
    }
    
   

        /* Custom font for login page title */
        .login-title {
            font-family: 'Nunito', sans-serif;
            /* Use Nunito font */
            font-size: 24px;
            /* Adjust font size as needed */
            font-weight: bold;
            /* Bold font weight */
            color: #fff;
            /* Text color */
            margin-bottom: 20px;
            /* Bottom margin */
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5 login-form">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <img src="<?= base_url('assets/img/login.jpg');?>" alt="Logo" class="center-logo">
                    </div>
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4 login-title">Registration Page</h1>
                            </div>

                            <form class="user" method="post" action="<?= base_url('welcome/registration') ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" name="name"
                                        placeholder="Username" value="<?= set_value('name');?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>');?> <!--jika name tidak diisi-->
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email"
                                        placeholder="Email Address" value="<?= set_value('email');?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>');?> <!--jika email tidak diisi-->

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password1" name="password1" placeholder="Password">
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>');?> <!--jika password tidak sama-->

                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password2" name="password2" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block btn-custom">
                                    Register Account
                                </button>

                                <hr>
                                
                            </form>
                          
                            <div class="text-center">
                                <!-- <a class="small" href="forgot-password.html">Forgot Password?</a> -->
                            </div>
                            <div class="text-center">
                            <a href="<?= base_url('welcome') ?>" class="small">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>
