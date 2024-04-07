<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Detail Penjualan</title>
    <link rel="icon" href="assets/img/logo.jpg" type="image/x-icon">

    <!-- Custom fonts -->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles -->
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
            color: #ffffff !important;
        }

        .card {
            width: 100%;
            max-width: 100%;
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
        }

        .card-title {
            font-size: 24px;
            margin-bottom: 20px;
            color: brown;
            text-align: center;
            margin-top: 0;
        }

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

        .sidebar {
            background: linear-gradient(to bottom, #1F1717, #820300, #B80000);
        }

        #totalHarga {
            font-weight: bold;
            color: black;
        }
    </style>

</head>

<body id="page-top">

    
	
    

    <div class="container card-container">
    <div class="row">
        <div class="col-sm-12">
        <div class="card">
        <h5 class="card-title mt-2">DATA DETAIL PENJUALAN</h5>
<br>
				<h5>CARI LAPORAN PER TANGGAL</h5>
                <hr>
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <label for="startDate">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="startDate">
                </div>
                <div class="col-md-4">
                    <label for="endDate">Tanggal Akhir</label>
                    <input type="date" class="form-control" id="endDate">
                </div>
                
                <div class="col-md-4">
                    <label></label> <!-- empty label for spacing -->
                    <button class="btn btn-primary mt-4" type="button" id="btnFilter">
                        <i class="fa fa-search"></i> Cari
                    </button>
                    <!-- <a href="<?= site_url('petugas/detailpenjualan');?>" class="btn btn-success mt-4">
                        <i class="fa fa-refresh"></i> Refresh
                    </a> -->
                    <!-- <a class="btn btn-danger mt-4" href="<?php echo site_url('petugas/export_pdf_detailpenjualan'); ?>" name="bexport">
                        <i class="fa fa-file"></i> Export PDF
                    </a> -->


                </div>
            </div>
        </form>

<br>
				<!-- <h5>CARI LAPORAN PER BULAN</h5>
                <hr>
    <div class="row">
    <div class="col-md-4">
    <label for="bulan">Bulan</label>
    <select class="form-control" id="bulan">
        <option value="01">Januari</option>
        <option value="02">Februari</option>
        <option value="03">Maret</option>
        <option value="04">April</option>
        <option value="05">Mei</option>
        <option value="06">Juni</option>
        <option value="07">Juli</option>
        <option value="08">Agustus</option>
        <option value="09">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
    </select>
</div>
<div class="col-md-4">
    <label for="tahun">Tahun</label>
    <input type="number" class="form-control" id="tahun" min="2000" max="2100" value="2024">
</div>
<div class="col-md-4">
    <label></label> empty label for spacing -->
    <!-- <button class="btn btn-primary mt-4" type="submit" id="btnFilterBulan">
        <i class="fa fa-search"></i> Filter
    </button> -->
<br>
</div>

    <!-- Markup HTML untuk menampilkan produk terlaris -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-danger" role="alert">
                    <strong>Produk Terlaris:</strong> <span id="mostSoldProduct"></span>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

    <div class="container card-container">
    <div class="row">
        <div class="col-sm-12">
        <div class="card">
		
              

         
		

<!-- DataTables Example -->

               

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable"  cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal Penjualan</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Jumlah Produk</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Tools</th> <!-- Kolom baru untuk tombol tambahan -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($DataDetailPenjualan)) {
                                        $no = 1;
                                        foreach ($DataDetailPenjualan as $ReadDS) {
                                            $ProdukID = $ReadDS->ProdukID;
                                            $NmProduk = '';

                                            foreach ($DataProduk as $produk) {
                                                if ($produk->ProdukID == $ProdukID) {
                                                    $NmProduk = $produk->NmProduk;
                                                    break;
                                                }
                                            }
                                    ?>
                                            <tr>
                                                <th scope="row"><?php echo $no; ?></th>
                                                <td><?php echo $ReadDS->PenjualanID; ?></td>
                                                <td><?php echo $produk->NmProduk; ?></td>
                                                <td><?php echo $ReadDS->JumlahProduk; ?></td>
                                                <td><?php echo number_format($ReadDS->Subtotal, 2, ',', '.'); ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-danger circle btn-sm" onclick="return confirmDelete('<?php echo $ReadDS->DetailID; ?>')">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                    <?php
                                            $no++;
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
							<div id="totalHarga"></div>
							



                      
                    </div>
                </div>
            </div>
        </div>
        </div>
  
        </div>
       
       
	<div id="mostSoldProduct"></div>
	


    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript -->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts -->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

    <script>
       $(document).ready(function() {
    var dataTable = $('#dataTable').DataTable();
    var totalHarga = 0;

    // Menghitung Total saat dokumen dimuat
    dataTable.rows().every(function() {
        var data = this.data();
        var subtotal = parseFloat(data[4].replace(/[^\d.-]/g, ''));
        totalHarga += subtotal;
    });

    // Menampilkan Total awal dengan 2 digit desimal
    $('#totalHarga').text('Total : ' + formatTotalHarga(totalHarga));

    // Tambahkan event listener untuk tombol filter
    $('#btnFilter').on('click', function() {
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();

        // Lakukan filter berdasarkan tanggal mulai dan tanggal selesai
        dataTable.columns(1).search(startDate + '|' + endDate, true, false).draw();

        // Reset Total saat filter berubah
        totalHarga = 0;

        // Hitung ulang Total berdasarkan subtotal yang terlihat di tabel setelah filter diterapkan
        dataTable.rows({ search: 'applied' }).every(function() {
            var data = this.data();
            var subtotal = parseFloat(data[4].replace(/[^\d.-]/g, ''));
            totalHarga += subtotal;
        });

        // Tampilkan Total yang diperbarui dengan 2 digit desimal
        $('#totalHarga').text('Total : ' + formatTotalHarga(totalHarga));
    });
});

// Fungsi untuk memformat Total dengan 6 digit desimal
function formatTotalHarga(harga) {
        var hargaFormatted = (Math.round(harga * 1000000) / 1000000).toFixed(6);
        return hargaFormatted.replace(/\B(?=(\d{3})+(?!\d))/g, "."); // Tambahkan pemisah ribuan jika diperlukan
    }


        function confirmDelete(DetailID) {
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
                            // Redirect to the delete URL with the correct DetailID
                            window.location.href = "<?php echo site_url('petugas/deleteDetail/')?>" +
                                DetailID;
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

		/////////////////////////////////////////////////////////////////////////////////////
		
		$(document).ready(function() {
    var mostSoldProduct = findMostSoldProduct();
    $('#mostSoldProduct').html(mostSoldProduct.productName + " (Jumlah Terjual: " + mostSoldProduct.productCount + ")");
});

function findMostSoldProduct() {
    var productCounts = {};

    // Menghitung berapa kali setiap produk muncul dalam tabel
    $('#dataTable tbody tr').each(function() {
        var productName = $(this).find('td:nth-child(3)').text().trim();
        var productQuantity = parseInt($(this).find('td:nth-child(4)').text().trim());

        if (productName in productCounts) {
            productCounts[productName] += productQuantity;
        } else {
            productCounts[productName] = productQuantity;
        }
    });
 
    // Mencari produk dengan jumlah penjualan terbanyak
    var mostSoldProductName = "";
    var mostSoldProductCount = 0;
    for (var product in productCounts) {
        if (productCounts.hasOwnProperty(product)) {
            if (productCounts[product] > mostSoldProductCount) {
                mostSoldProductName = product;
                mostSoldProductCount = productCounts[product];
            }
        }
    }

    return { productName: mostSoldProductName, productCount: mostSoldProductCount };
}


///////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
        var dataTable = $('#dataTable').DataTable();

        // Event listener untuk tombol filter
        $('#btnFilter').on('click', function() {
            var startDate = $('#startDate').val();
            var endDate = $('#endDate').val();

            // Lakukan filter berdasarkan tanggal mulai dan tanggal selesai
            dataTable.columns(1).search(startDate + '|' + endDate, true, false).draw();
        });
    });
/////////////////////////#
// Tombol filter bulan
$('#btnFilterBulan').on('click', function() {
    var bulan = $('#bulan').val();
    var tahun = $('#tahun').val();

    // Menghitung tanggal akhir bulan dengan benar
    var lastDay = new Date(tahun, bulan, 0).getDate();

    // Format tanggal dengan dua digit untuk bulan dan tahun
    bulan = bulan.padStart(2, '0'); // Menambahkan '0' di depan jika bulan kurang dari 10
    tahun = tahun.toString();

    var startDate = tahun + '-' + bulan + '-01';
    var endDate = tahun + '-' + bulan + '-' + lastDay;

    // Lakukan filter berdasarkan bulan dan tahun
    dataTable.column(1).search(startDate + '|' + endDate, true, false).draw();
});







    </script>
</body>

</html>
