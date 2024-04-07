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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            background: linear-gradient(to bottom,  #1F1717, #820300, #B80000);
        }
        #btnPrint {
        width: 100px; /* Sesuaikan lebar sesuai kebutuhan Anda */
		}
		.checkout-btn {
			width: auto; /* Atur lebar tombol menjadi otomatis */
			float: right; /* Geser tombol ke kanan */
			margin-left: 10px; /* Tambahkan margin kiri agar ada jarak antara tombol */
		}
		#btnReset {
			display: none;
		}
    </style>
</head>
<body>

    
<form class="form-inline" action="<?= site_url('petugas/keranjang') ?>" method="post">
        <div class="input-group">
            <button type="submit" class="btn btn-warning">
                <i class="fa fa-sync"></i> Refresh
            </button>
        </div>
    </form>
  
 
     <!-- Keranjang Card -->
     <div class="container card-container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-title">
                        <i class="fas fa-fw fa-shopping-cart"></i> KERANJANG
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $totalBelanja = 0;

                                foreach ($DataTransaksi as $transaksi) {
                                    $ProdukID = $transaksi->ProdukID;

                                    $NmProduk = '';
                                    $Harga = 0;

                                    foreach ($DataProduk as $produk) {
                                        if ($produk->ProdukID == $ProdukID) {
                                            $NmProduk = $produk->NmProduk;
                                            $Harga = $produk->Harga;
                                            break;
                                        }
                                    }

                                    $subtotalPerProduk = $transaksi->quantity * $Harga;

                                    echo '<tr>';
										echo '<td>' . $no . '</td>';
										echo '<td>' . $NmProduk . '</td>';
										echo '<td>' . $transaksi->quantity . '</td>';
										echo '<td>' . "Rp. " . number_format($Harga, 2, ',', '.') . '</td>';
										echo '<td>' . number_format($subtotalPerProduk, 2,',','.') . '</td>';
                                        echo '<td><button class="btn btn-danger btn-sm" onclick="return confirmDelete(' . $transaksi->TransaksiID . ')">Batal</button></td>'; // Tombol delete dengan panggilan fungsi confirmDelete()

										echo '</tr>';


                                    $totalBelanja += $subtotalPerProduk;

                                    $no++;
                                }
                                ?>
                                
                            </tbody>
                            <tfoot>
                                <!-- <tr>
                                    <td colspan="4" class="text-right"><strong>Total Belanja</strong></td>
                                    <td><?php echo "Rp. " . number_format($totalBelanja, 2,',','.'); ?></td>
                                </tr>

                               
                          
<br>

<tr>
                                    <td colspan="5" class="text-right">
                                      
                                      
                   
                                    </td>
									
                                </tr> -->

                            </tfoot>
                            
                        </table>
                        
                    </div>
    <!-- Tambahkan input untuk jumlah bayar -->
    <div class="mb-3">
        <label for="TotalBelanja" class="form-label">Total Belanja</label>
        <input type="text" class="form-control" id="TotalBelanja" name="TotalBelanja" value="<?php echo "Rp. " . number_format($totalBelanja, 2, ',', '.'); ?>" readonly>
    </div>
<div class="mb-3">
    <label for="Bayar" class="form-label">Jumlah Bayar</label>
    <input type="number" class="form-control" id="Bayar" name="Bayar" placeholder="Masukkan Jumlah Pembayaran" required>
</div>

<div class="col-sm-6">
    <button type="button" class="btn btn-success mr-2" id="btnPrint" style="margin-right: 10px;">
        <i class="fas fa-money-bill-wave"></i>  BAYAR
    </button>

  
</div>







                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalpetugas" tabindex="-1" role="dialog" aria-labelledby="modalpetugasLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalpetugasLabel">Data Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Isi form petugas di sini -->
                <form id="checkoutForm" action="<?php echo site_url('petugas/simpan_pelanggan'); ?>" method="post">
                    <!-- Form untuk data pelanggan -->
                    <!-- <label for="PelangganID" class="form-label" hidden>ID Pelanggan</label> -->
                    <input type="hidden" class="form-control" id="PelangganID" name="PelangganID" placeholder="Masukkan ID Pelanggan">
                    <div class="mb-3">
                        <label for="NamaPelanggan" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="NamaPelanggan" name="NamaPelanggan" placeholder="Masukkan Nama Pelanggan" required>
                    </div>
                    <!-- Di dalam formulir modal pelanggan -->
                        <div class="mb-3">
                            <label for="Subtotal" class="form-label">Total Belanja</label>
                            <input type="text" class="form-control" id="Subtotal" name="Subtotal" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="KembalianModal" class="form-label">Kembalian</label>
                            <input type="text" class="form-control" id="KembalianModal" name="KembalianModal" readonly>
                        </div>

                    <div class="mb-3">
                        <label for="Alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="Alamat" name="Alamat" placeholder="Masukkan Alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="NomorTelepon" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="NomorTelepon" name="NomorTelepon" placeholder="Masukkan Nomor Telepon" required>
                    </div>
                  
                    <button type="submit" class="btn btn-primary">Checkout</button>
                </form>
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
  
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>



<script>
document.getElementById('btnPrint').addEventListener('click', function() {
    var totalBelanja = <?php echo $totalBelanja; ?>;
    var jumlahBayar = parseFloat(document.getElementById('Bayar').value);
    var kembalian = jumlahBayar - totalBelanja;

    // Simpan nilai subtotal dalam variabel
    var subtotal = totalBelanja.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
    // Set nilai subtotal di modal pelanggan
    document.getElementById('Subtotal').value = subtotal;
    // Set nilai kembalian di modal pelanggan
    document.getElementById('KembalianModal').value = kembalian.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });

    // Jika jumlah pembayaran kurang dari total belanja
    if (kembalian < 0) {
        // Tampilkan alert
        Swal.fire({
            icon: 'error',
            title: 'Maaf...',
            text: 'Jumlah pembayaran kurang dari total belanja. Silakan coba lagi.'
        });
    } else {
        // Jika jumlah pembayaran mencukupi, tampilkan modal pelanggan
        $('#modalpetugas').modal('show');
    }
});

// Wait for the DOM to be fully loaded
$(document).ready(function() {
    // Add an event listener to the checkout form
    $('#checkoutForm').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // AJAX request to submit the form data
        $.ajax({
            url: $(this).attr('action'), // Get the form action URL
            method: $(this).attr('method'), // Get the form method (POST or GET)
            data: $(this).serialize(), // Serialize the form data
            success: function(response) {
                // Event listener untuk alert Swal
                Swal.fire({
                    icon: 'success',
                    title: 'Transaksi Berhasil!',
                    text: 'Terima kasih telah berbelanja.',
                    onClose: function() {
                        // Tampilkan tombol reset setelah alert ditutup
                        $('#btnReset').show();
                    }
                }).then((result) => {
                    // Pastikan tombol reset tetap muncul jika pengguna menekan tombol tutup alert
                    if (result.dismiss === Swal.DismissReason.close) {
                        $('#btnReset').show();
                    }
                });
            },
            error: function(xhr, status, error) {
                // If there's an error in form submission, display an error alert
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi kesalahan saat melakukan transaksi. Silakan coba lagi.'
                });
            }
        });
    });
});

function confirmDelete(TransaksiID) {
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
                    // Redirect to the delete URL with the correct TransaksiID
                    window.location.href = "<?php echo site_url('petugas/deletekeranjang/')?>" +
                    TransaksiID;
                }
            });
        }
    });
    return false;
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

function handleFormSubmit(form, msg) {
    var formData = $(form).serialize();
    console.log(formData);

    $.ajax({
        type: "POST",
        url: $(form).attr("action"),
        data: formData,
        success: function(response) {
            console.log(response);
            // Assuming your server returns a JSON object with a "success" property
            // if (response.success) {
            succesModal(msg);
            // } else {
            //     // Handle the case when the form submission is not successful
            //     // You can display an error message or take other actions
            //     alert("Form submission failed. Please try again.");
            // }
        },
        error: function() {
            // Handle the case when the AJAX request fails
            alert("An error occurred. Please try again later.");
        }
    });

    // Return false to prevent the default form submission
    return false;
}
   


</script>

</script>


</body>

</html>
