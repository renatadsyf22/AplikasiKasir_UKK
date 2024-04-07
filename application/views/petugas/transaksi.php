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
            background-color: #f1f1

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
        /* Style untuk notifikasi kecil */
        #cart-notification {
            border-radius: 50%; /* Membuat bentuk bulat */
            min-width: 15px; /* Lebar minimum */
            height: 15px; /* Tinggi */
            line-height: 15px; /* Agar teks berada di tengah */
            text-align: center; /* Posisi teks di tengah */
            background-color: red; /* Warna latar */
            color: white; /* Warna teks */
        }

    </style>
</head>

<body>

    <!-- Header -->




    <!-- Data Produk Card -->
    <div class="container card-container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-title" >
                    <i class="fa fa-list"></i> DAFTAR PRODUK
                    <!-- Notifikasi angka -->
                </div>


                <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="<?= base_url('petugas/keranjang');?>" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-shopping-cart"></i> -->
                                <!-- Counter - Messages -->
                    <!-- Tambahkan id pada elemen span counter -->
                    <!-- <span id="cartCounter" class="badge badge-danger badge-counter">0</span>
                            </a> -->

                    <div class="table-responsive">
                        <table id="tabel-produk" class="table table-bordered">

                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Tambah ke Keranjang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($DataProduk)) {
                                    $no = 1;
                                    foreach ($DataProduk as $produk) {
                                ?>

                                        <!-- jika stok habis, produk tidak ditampilkan -->
                                        <?php if ($produk->Stok > 0) : ?>
                                            <tr>
                                                <th scope="row"><?php echo $no; ?></th>
                                                <td><?php echo $produk->NmProduk; ?></td>
                                                <td><?php echo $produk->Stok; ?></td>
												<td>Rp. <?php echo number_format($produk->Harga, 2, ',', '.'); ?></td>
                                                <td>
												<form id="form_produk_<?php echo $produk->ProdukID; ?>" action="<?php echo site_url('petugas/tambah_ke_transaksi'); ?>" method="post">
                                                <input type="hidden" name="ProdukID" value="<?php echo $produk->ProdukID; ?>">
                                                <input type="hidden" name="NmProduk" value="<?php echo $produk->NmProduk; ?>">
                                                <input type="hidden" name="Harga" value="<?php echo $produk->Harga; ?>">
                                                <label for="Stok">Jumlah:</label>
                                                <!-- Setel nilai awal menjadi 0 -->
                                                <input type="number" name="Stok" value="0" min="0">
												<button type="button" class="btn btn-primary" onclick="tambahKeKeranjang(<?php echo $produk->ProdukID; ?>)">
    <i class="fas fa-shopping-cart"></i> Masukkan Keranjang
</button>




                                            </form>

                                                </td>
                                            </tr>
                                        <?php endif; ?>
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



    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript -->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages -->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabel-produk').DataTable({
                "searching": true // Aktifkan fitur pencarian
            });

        });
        function tambahKeKeranjang(button) {
    var row = $(button).closest('tr');
    var stok = parseInt(row.find('td:nth-child(3)').text());
    var jumlahDipesan = parseInt(row.find('input[name="Stok"]').val());

    if (jumlahDipesan <= 0 || isNaN(jumlahDipesan)) {
        // Jika jumlah yang dimasukkan tidak valid
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan',
            text: 'Jumlah yang dimasukkan harus lebih dari 0!',
            showConfirmButton: false,
            timer: 3000
        });
    } else if (jumlahDipesan > stok) {
        // Jika jumlah yang dimasukkan melebihi stok yang tersedia
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan',
            text: 'Jumlah yang dimasukkan melebihi stok yang tersedia!',
            showConfirmButton: false,
            timer: 3000
        });
    } else {
        // Jika jumlah yang dimasukkan valid
        var produkID = row.find('input[name="ProdukID"]').val();
        var namaProduk = row.find('input[name="NmProduk"]').val();
        var harga = row.find('input[name="Harga"]').val();
        var jumlah = jumlahDipesan;

        // Menambahkan item ke dalam keranjang belanja
        var itemKeranjang = {
            ProdukID: produkID,
            NmProduk: namaProduk,
            Harga: harga,
            Jumlah: jumlah
        };
        keranjangBelanja.push(itemKeranjang); // Menambahkan item ke dalam array keranjang belanja

        // Menampilkan notifikasi bahwa item berhasil ditambahkan ke keranjang
        tambahNotifikasi(); // Tambahkan notifikasi setiap kali produk ditambahkan ke keranjang
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Barang berhasil ditambahkan ke keranjang!',
            showConfirmButton: false,
            timer: 3000
        });
    }
}



// Fungsi untuk menambah notifikasi
function tambahNotifikasi() {
    var jumlahSaatIni = parseInt($('#cartCounter').text());
    jumlahSaatIni++;
    $('#cartCounter').text(jumlahSaatIni);
}

// Memanggil fungsi untuk menambah notifikasi setiap kali tombol keranjang belanja diklik
$(document).on('click', '.btn.btn-primary', function() {
    tambahKeKeranjang(this); // Ubah pemanggilan fungsi dan gunakan 'this' sebagai argumen
});









// Fungsi untuk menambah notifikasi
function tambahNotifikasi() {
    var jumlahSaatIni = parseInt($('#cartCounter').text()); // Mengambil nilai notifikasi saat ini
    jumlahSaatIni++; // Menambah satu pada nilai notifikasi
    $('#cartCounter').text(jumlahSaatIni); // Mengupdate nilai notifikasi
}

// Memanggil fungsi untuk menambah notifikasi setiap kali tombol keranjang belanja diklik
$(document).on('click', '#messagesDropdown', function() {
    tambahNotifikasi(); // Memanggil fungsi untuk menambah notifikasi
});


    </script>
</body>

</html>
