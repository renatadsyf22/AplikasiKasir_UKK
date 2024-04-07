<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>p</title>
    <link rel="icon" href="assets/img/logo.jpg" type="image/x-icon">

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

 
              <body>
                
        
                             <!-- Refresh Button -->
                             <!-- <a href="<?= site_url('admin/produk');?>" class="btn btn-primary ml-2">
                                <i class="fa fa-sync"></i>
                            </a>
                    </div>

                </form>
            </div> -->

                

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
				<div class="modal-body">
                    <form id="createForm" action="<?php echo site_url('admin/addDataProduk'); ?>" method="post"
                        onsubmit="event.preventDefault(); handleFormSubmit(this, 'Data berhasil di tambahkan !')">
                        <!-- <label for="ProdukID" class="form-label" hidden>ID Produk</label> -->
                        <input type="hidden" class="form-control" id="ProdukID" name="ProdukID"
                            placeholder="Masukkan ID Produk">
                        <div class="mb-3">
                            <label for="NmProduk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="NmProduk" name="NmProduk"
                                placeholder="Masukkan Nama Produk" required>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="KategoriID" class="form-label">Pilih Kategori</label>
                            <select class="form-control" id="KategoriID" name="KategoriID" required>
                                <option value="default">Pilih Kategori</option>
                                <?php foreach ($DataKategori as $kategori) : ?>
                                    <option value="<?= $kategori->KategoriID ?>"><?= $kategori->NamaKategori ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div> -->
                        <div class="mb-3">
                            <label for="Harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="Harga" name="Harga"
                                placeholder="Masukkan Harga" required>
                        </div>
                        <div class="mb-3">
                            <label for="Stok" class="form-label">Stok</label>
                            <input type="text" class="form-control" id="Stok" name="Stok"
                                placeholder="Masukkan Stok" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    <div id="pesan" class="alert" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>


 <!-- DataTales Example -->
<div class="container-fluid mb-3">
    <div class="row d-flex justify-content-between align-items-center">
        <!-- Tambah Button (di atas tabel) -->
        <div class="col-auto">
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus"></i> Tambah data produk
            </button>
        </div>

        <!-- Refresh Button -->
        <!-- <div class="col-auto">
            <form class="form-inline" action="<?= site_url('admin/produk') ?>" method="post">
                <div class="input-group">
                    <button type="submit" class="btn btn-warning ml-2">
                        <i class="fa fa-sync"></i> Refresh
                    </button>
                </div>
            </form>
        </div> -->

        

		<div class="col-sm-12">
            <div class="card">
                <div class="card-title">
                    DATA PRODUK
                </div>

				<!-- label untuk search -->
				<input type="search" class="form-control" id="searchInput" placeholder="Cari produk...">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">No</th>
                <!-- <th scope="col">ID Produk</th> -->
                <th scope="col">Nama Produk</th>
                <!-- <th scope="col">Kategori</th> -->
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">TOOLS</th>
            </tr>
        </thead>
        <tbody>
    <?php
    if (!empty($DataProduk)) {
        $no = 1;
        foreach ($DataProduk as $ReadDS) {
            $KategoriID = $kategori->KategoriID;
            $NamaKategori = '';

                                    foreach ($DataKategori as $kategori) {
                                        if ($kategori->KategoriID == $KategoriID) {
                                            $NamaKategori = $kategori->NamaKategori;
                                            break;
                                        }
                                    }

        //Jika stok kurang dari 5 maka baris akan berwarna merah
            $stokClass = ($ReadDS->Stok < 5) ? 'text-danger' : '';

    ?>
    <tr class="<?php echo $stokClass; ?>">
        <th scope="row"><?php echo $no; ?></th>
        <td><?php echo $ReadDS->NmProduk; ?></td>
        <!-- <td><?php echo $NamaKategori; ?></td> -->
		<td><?php echo 'Rp. ' . number_format($ReadDS->Harga, 2, ',', '.'); ?></td>
        <td><?php echo $ReadDS->Stok; ?></td>
        <td>
            <button type="button" class="btn btn-success my-1" data-toggle="modal"
                data-target="#exampleModal_<?php echo $ReadDS->ProdukID; ?>">
                <i class="fas fa-edit"> Edit</i>
            </button>
            <a href="#" class="btn btn-danger"
                onclick="return confirmDelete('<?php echo $ReadDS->ProdukID; ?>')">
                <i class="fas fa-trash-alt"> Hapus</i>
            </a>


                        <div class="modal fade" id="exampleModal_<?php echo $ReadDS->ProdukID; ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <!-- Konten modal -->
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Produk</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= site_url('admin/updateDataProduk')?>"
                                            onsubmit="event.preventDefault(); handleFormSubmit(this, 'Data berhasil di edit !');"
                                            method="post">
                                            <label for="ProdukID" class="form-label" z>ID Produk</label>
                                            <input type="z" class="form-control" id="ProdukID" name="ProdukID" value="<?= $ReadDS->ProdukID; ?>">
                                            <div class="mb-3">
                                            <label for="NmProduk" class="form-label">Nama Produk</label>
                                            <input type="text" class="form-control" id="NmProduk" name="NmProduk"
                                            placeholder="Masukkan Nama Produk" value="<?= $ReadDS->NmProduk; ?>"required>
                                            </div>
                                             <div class="mb-3">
											<!-- <label for="KategoriID" class="form-label">Pilih Kategori</label>
											<select class="form-control" id="KategoriID" name="KategoriID" required>
												<option value="">Pilih Kategori</option>
												<?php foreach ($DataKategori as $kategori) : ?>
																	<?php $selected = ($kategori->KategoriID == $ReadDS->KategoriID) ? 'selected' : ''; ?>
																	<option value="<?= $kategori->KategoriID ?>" <?= $selected ?>><?= $kategori->NamaKategori ?></option>
																<?php endforeach; ?>
											</select>
										</div> -->
                                            <div class="mb-3">
                                            <label for="Harga" class="form-label">Harga</label>
                                            <input type="text" class="form-control" id="Harga" name="Harga"
                                            placeholder="Masukkan Harga" value="<?= $ReadDS->Harga; ?>"required>
                                            </div>
                                            <div class="mb-3">
                                            <label for="Stok" class="form-label">Stok</label>
                                            <input type="text" class="form-control" id="Stok" name="Stok"
                                            placeholder="Masukkan Stok" value="<?= $ReadDS->Stok; ?>"required>
                                            </div>


                                            <button type="submit" class="btn btn-primary">Simpan</button>
											</form>
                                        <!-- Akhir formulir -->
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir konten modal -->

                        </div>
                        <!-- Akhir Modal Edit -->
                    </td>
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
<!-- Bootstrap core JavaScript -->
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript -->
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

<!-- Custom scripts for all pages -->
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

<script>
  $(document).ready(function() {
    var table = $('#dataTable').DataTable({
        dom: 'l<"toolbar">frtip',
        "language": {
            "search": "Cari:",
            "searchPlaceholder": "Masukkan kata kunci"
        }
    });

    $('#searchInput').on('keyup', function() {
        var searchText = $(this).val().trim();
        if (searchText !== '') {
            // Hanya filter nama produk yang dimulai dengan huruf pencarian
            table.column(1).search('^' + searchText, true, false).draw();
        } else {
            // Jika input pencarian kosong, hapus filter
            table.column(1).search('').draw();
        }
    });
});



function confirmDelete(ProdukID) {
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
                    // Redirect to the delete URL with the correct ProdukID
                    window.location.href = "<?php echo site_url('admin/deleteDataProduk/')?>" +
                    ProdukID;
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

 
</body>

</html>
