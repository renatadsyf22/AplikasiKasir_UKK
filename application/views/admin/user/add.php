<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CHASIER</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <!-- <link href="assets/css/sb-admin-2.min.css" rel="stylesheet"> -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

    <style>
    .active {
        background-color: #3C63D2;
        /* Dark background color for active link */
        color: #ffffff !important;
        /* Text color for active link */
    }

    /* Style untuk card */
    .card {
        width: 990px; /* Sesuaikan lebar card sesuai kebutuhan */
        max-width: 100%; /* Membuat card responsif */
        border: 1px solid #ddd; /* Warna border card */
        border-radius: 8px; /* Bentuk sudut card */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan card */
        margin: 20px auto; /* Posisi card di tengah dan jarak antara card dengan elemen lainnya */
        padding: 20px; /* Ruang di dalam card */
        background-color: #fff; /* Warna latar card */
    }

    /* Style untuk judul card */
    .card-title {
        font-size: 24px; /* Ukuran font judul */
        margin-bottom: 25px; /* Jarak antara judul dengan isi card */
        color: brown; /* Warna teks judul */
    }
     
        /* Menambahkan space antara tombol Tambah dan card tabel */
        .table-container {
            margin-top: 20px; /* Sesuaikan dengan kebutuhan ruang antara tombol Tambah dan card tabel */
        }
           /* Style untuk sidebar */
           .sidebar {
            background: linear-gradient(to bottom, #1F1717, #820300, #B80000);

        }
        
    </style>

</head>


<body>

    <!-- Add your navigation bar or header here if needed -->

    <nav class="navbar bg-body-tertiary">
    <div class="col-sm-11 card-container">
                <div class="card card-danger mb-3">
                   <div class="card-header bg-danger text-white">
                        <h5><i class="fas fa-fw fa-user-plus"></i> Add User</h5>
                    </div> 
                
                    <div class="card-body">
                        <div class="box-body">
                            <div class="col">
                                <div class="row-md-4 col-md-offset-4">
                                    <?php echo validation_errors(); ?>
                                    <?php echo form_open_multipart('admin/user/add'); ?>
                                    <form>
                                        <label>Username </label>
                                        <div class="form-group <?= form_error('email') ? 'has-error' : null ?>">
                                            <input type="text" name="name" value="<?= set_value('name') ?>" class="form-control" placeholder="Masukan Nama">
                                            <?= form_error('name') ?>
                                        </div>
                                        <label>Email </label>
                                        <div class="form-group <?= form_error('email') ? 'has-error' : null ?>">
                                            <input type="text" name="email" value="<?= set_value('email') ?>" class="form-control" placeholder="Masukan Email">
                                            <?= form_error('email') ?>
                                        </div>
                                </div>
                                <div class="row-md-4 col-md-offset-4">
                                <label>Password </label>
                                    <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                                        <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control" placeholder="Masukan Password">
                                        <?= form_error('password') ?>
                                    </div>
                                    <div class="form-group">
                                    <label>Role </label>
                                        <select name="role_id" class="form-control">
                                            <option value="1" <?= set_select('role_id', '1') ?>>Admin</option>
                                            <option value="2" <?= set_select('role_id', '2') ?>>Petugas</option>
                                        </select>
                                        <?= form_error('role_id') ?>
                                    </div>
                                </div>
                                <div class="col-md-4 col-md-offset-4">
                                        <!-- <label>Photo</label>    
                                    <div class="form-group">
                                        <input type="file" name="photo" class="form-control">
                                    </div> -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-flat" id="btnSave">
                                            <i class="fa fa-paper-plane"></i> Save
                                        </button>
                                        <!-- <button type="reset" class="btn btn-danger btn-flat">Reset</button> -->
                                    </div>
                                    <div class="box">
                                <div class="box-header">
                                    <div class="pull-right">
                                        <a href="<?= site_url('admin/user/index') ?>" class="btn btn-warning btn-flat">
                                            <i class="fa fa-undo"></i> Back
                                        </a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
       <!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>


<script>
    $(document).ready(function() {
        $('#btnSave').on('click', function(e) {
            e.preventDefault();
            handleFormSubmit();
        });

        function handleFormSubmit() {
            var formData = $('form').serialize();
            $.ajax({
                type: "POST",
                url: $('form').attr("action"),
                data: formData,
                success: function(response) {
                    succesModal("User successfully added.");
                },
                error: function() {
                    alert("An error occurred. Please try again later.");
                }
            });
        }

        function succesModal(msg) {
            Swal.fire({
                title: "Berhasil !",
                text: msg,
                icon: "success",
                showLoaderOnConfirm: true,
            }).then((result) => {
                // Reload the page after the Swal modal is closed
                if (result.isConfirmed || result.dismiss === Swal.DismissReason.close) {
                    location.reload();
                }
            });
        }
    });
</script>

<!-- Include DataTables CSS and JS files -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

</body>

</html>
