<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>p</title>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
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
            width: 100%;
            /* Lebar card 100% */
            max-width: 100%;
            /* Maksimum lebar card */
            border: none;
            /* Menghapus border card */
            border-radius: 10px;
            /* Bentuk sudut card */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            /* Efek bayangan card */
            margin: 20px auto;
            /* Posisi card di tengah dan jarak antara card dengan elemen lainnya */
            padding: 20px;
            /* Ruang di dalam card */
            background-color: #fff;
            /* Warna latar card */
        }

        /* Style untuk judul card */
        .card-title {
            font-size: 24px;
            /* Ukuran font judul */
            margin-bottom: 20px;
            /* Jarak antara judul dengan isi card */
            color: brown;
            /* Warna teks judul */
            text-align: center;
            /* Pusatkan teks */
            margin-top: 0;
            /* Hapus margin atas */
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



<!-- DataTales Example -->
<div class="card shadow mb-3">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-danger">DATA PENJUALAN</h4>
    </div>


    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Penjualan</th>
                        <th>Pelanggan</th>
                        <th>Produk</th>
                        <th>Harga</th>

                        <!-- <th>Tools</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($DataPenjualan)) {
                        $no = 1;
                        foreach ($DataPenjualan as $ReadDS) {
                            $PelangganID = $ReadDS->PelangganID;
                            $NamaPelanggan = '';
                            $ProdukID = $ReadDS->ProdukID;
                            $NmProduk = '';


                            // $TanggalPenjualan = date('Y-m-d', strtotime($ReadDS->TanggalPenjualan));
                            // if(isset($_POST['tanggal']) && $_POST['tanggal'] != '' && $TanggalPenjualan != $_POST['tanggal'])
                            //     continue; // Skip data that doesn't match the selected date

                            foreach ($DataPelanggan as $pelanggan) {
                                if ($pelanggan->PelangganID == $PelangganID) {
                                    $NamaPelanggan = $pelanggan->NamaPelanggan;
                                }
                            }
                            foreach ($DataProduk as $produk) {
                                if ($produk->ProdukID == $ProdukID) {
                                    $NmProduk = $produk->NmProduk;
                                    break;
                                }
                            }
                    ?>
                            <tr>
                                <th scope="row"><?php echo $no; ?></th>
                                <td><?php echo $ReadDS->TanggalPenjualan; ?></td>
                                <td><?php echo $ReadDS->NamaPelanggan; ?></td>
                                <td><?php echo $produk->NmProduk; ?></td>
                                <td><?php echo number_format($ReadDS->Harga, 2, ',', '.'); ?></td>
                                <!-- <td><a class="btn btn-danger" href="<?php echo site_url('petugas/export_pdf_penjualan'); ?>" name="bexport">
  <i class="fa fa-file"></i> Export PDF
</a></button>
</td> -->

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
</nav>
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
</script>
</body>

</html>
