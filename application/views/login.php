<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="" rel="icon">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

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
            height: 250px;
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
            background-color: #820300;
            color: #ffffff;
            /* Text color */
        }

        /* Hover effect for custom button */
        .btn-custom:hover {
            background-color: #5e0200;
            /* Darker shade on hover */
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
                        <img src="assets/img/login.jpg" alt="Logo" class="center-logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4 login-title">Login Page</h1> <!-- Apply custom font -->
                        </div>
                        <?= $this->session->flashdata('message'); ?>

                        <div class="text-center">
                            <form class="user" method="post" action="<?= base_url('welcome'); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                </div>
                                <button type="submit" class="btn btn-custom btn-user btn-block">Login</button>
                                <hr>
                            </form>
                            <!-- <div class="text-center">
                                <a href="<?= base_url('welcome/registration') ?>" class="small">Create an Account! Sebagai Admin</a>
                            </div> -->
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
