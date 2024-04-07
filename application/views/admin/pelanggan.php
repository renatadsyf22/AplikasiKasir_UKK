<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>pelanggan</title>
    <link rel="icon" href="assets/img/logo.jpg" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- CKEditor JS -->
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <style>
        .active {
            background-color: #3C63D2;
            /* Dark background color for active link */
            color: #ffffff !important;
            /* Text color for active link */
        }

        /* Style untuk card */
        .card {
            width: 100%; /* Lebar card 100% */
            max-width: 100%; /* Maksimum lebar card */
            border: none; /* Menghapus border card */
            border-radius: 10px; /* Bentuk sudut card */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Efek bayangan card */
            margin: 20px auto; /* Posisi card di tengah dan jarak antara card dengan elemen lainnya */
            padding: 20px; /* Ruang di dalam card */
            background-color: #fff; /* Warna latar card */
        }

        /* Style untuk judul card */
        .card-title {
            font-size: 24px; /* Ukuran font judul */
            margin-bottom: 20px; /* Jarak antara judul dengan isi card */
            color: brown; /* Warna teks judul */
            text-align: center; /* Pusatkan teks */
            margin-top: 0; /* Hapus margin atas */
        }

        /* Style untuk tabel */
        table.dataTable {
            width: 100%;
            margin: 0 auto;
            clear: both;
            border-collapse: collapse;
            border-spacing: 0;
        }

        table.dataTable thead th,
        table.dataTable tfoot th {
            font-weight: bold;
        }

        table.dataTable thead th,
        table.dataTable thead td {
            padding: 10px 18px;
            border-bottom: 1px solid #e5e5e5;
        }

        table.dataTable tfoot th,
        table.dataTable tfoot td {
            padding: 10px 18px 6px 18px;
            border-top: 1px solid #e5e5e5;
        }

        table.dataTable tbody td {
            padding: 10px 18px;
            border-bottom: 1px solid #e5e5e5;
        }

        table.dataTable.no-footer {
            border-bottom: 1px solid #e5e5e5;
        }

        table.dataTable tbody tr:nth-child(odd) td {
            background-color: #f8f8f8;
        }

        table.dataTable tbody tr:hover {
            background-color: #f1f1f1;
        }

        .dataTables_length,
        .dataTables_filter,
        .dataTables_info,
        .dataTables_paginate {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .dataTables_length label {
            font-weight: normal;
            margin-right: 10px;
        }
          /* Style untuk sidebar */
          .sidebar {
            background: linear-gradient(to bottom, #1F1717, #820300, #B80000);

        }
        
    </style>

</head>

<body>

    
           
                    <!-- Topbar Search -->
                    <div class="d-flex justify-content-end mb-2">
                        <form class="form-inline" action="<?= site_url('admin/pelanggan') ?>" method="post">
                            <div class="input-group">
                                <!-- <input type="text" class="form-control" name="txt_cari" placeholder="Cari pelanggan.." aria-label="Cari pelanggan" aria-describedby="button-addon2"> -->
                                <div class="input-group-append">
                                    <!-- <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                  
                   
                    <!-- DataTales Example -->
                    
					<div class="container card-container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-title">
                    DATA PELANGGAN
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pelanggan</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nomor Telepon</th>
                                    <th scope="col">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($DataPelanggan)) {
                                    $no = 1;
                                    foreach ($DataPelanggan as $ReadDS) {
                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $no; ?></th>
                                            <td><?php echo $ReadDS->NamaPelanggan; ?></td>
                                            <td><?php echo $ReadDS->Alamat; ?></td>
                                            <td><?php echo $ReadDS->NomorTelepon; ?></td>
                                            <td><button type="submit" class="btn btn-danger" onclick="return confirmDelete('<?php echo $ReadDS->PelangganID; ?>')">
                                                    <i class="fa fa-times"></i>
                                                </button></td>
                                        </tr>
                                <?php
                                        $no++;
                                    }
                                }
                                ?>
                             </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
  


    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript -->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages -->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        function confirmDelete(PelangganID) {
            Swal.fire({
                title: "Apakah anda yakin ?",
                text: "Anda ingin menghapus data ini ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, data akan di hapus!",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Berhasil !",
                        text: 'Data berhasil di hapus !',
                        icon: "success",
                        showLoaderOnConfirm: true,
                    }).then((result) => {
                        if (result.isConfirmed || result.dismiss === Swal.DismissReason.close) {
                            // Redirect to the delete URL with the correct PelangganID
                            window.location.href = "<?php echo site_url('Admin/deleteDataPelanggan/') ?>" +
                                PelangganID;
                        }
                    });
                }
            });
            return false;
        }
    </script>

</body>

</html>
