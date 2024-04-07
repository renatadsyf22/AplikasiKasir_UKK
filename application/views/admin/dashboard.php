<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Alfagift</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #ff3333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: bold;
        }

        .card-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .card {
            flex: 0 0 calc(33.33% - 20px);
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
        }

        .card-body {
            font-size: 24px;
            font-weight: bold;
            color: #ff3333;
            margin-bottom: 10px;
        }

        .card-footer {
            text-align: right;
            color: #ff3333;
            font-weight: bold;
        }

        .card-footer a {
            text-decoration: none;
            color: #ff3333;
        }

        .card-footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 992px) {
            .card {
                flex: 0 0 calc(50% - 20px);
            }
        }

        @media (max-width: 576px) {
            .card {
                flex: 0 0 calc(100% - 20px);
            }
        }
        .card-img-overlay {
    z-index: -1; /* Atur nilai z-index agar lebih rendah dari menu */
}

.card-img {
  width: 100%;
  height: 300px;
  object-fit: cover; /* Untuk memastikan gambar terisi penuh pada kotak gambar */
}

.carousel-item {
  transition: opacity 0.3s ease; /* Animasi transisi */
}

.carousel-item.active {
  opacity: 1; /* Item yang sedang aktif ditampilkan dengan opacity penuh */
}

.carousel-item-next,
.carousel-item-prev,
.carousel-item.active.carousel-item-right,
.carousel-item.active.carousel-item-left {
  opacity: 0; /* Item yang tidak aktif ditampilkan dengan opacity nol */
}
  /* Style untuk sidebar */
         .sidebar {
            background: linear-gradient(to bottom, #1F1717, #820300, #B80000);

        }

    </style>
</head>

<body>

<div id="slideshow" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/card.jpg" class="card-img" alt="...">
      <div class="carousel-caption">
       
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/img/item.jpg" class="card-img" alt="...">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/img/batu.jpg" class="card-img" alt="...">
      <div class="carousel-caption">
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#slideshow" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#slideshow" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


    <div class="dashboard-container">

        <div class="card-container">
            <!-- Earnings (Monthly) Card Example -->
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah barang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlahProduk; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Annual) Card Example -->
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Stok barang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                // Pastikan $DataProduk sudah didefinisikan sebelumnya
                                if (!empty($DataProduk)) {
                                    // Inisialisasi total stok
                                    $totalStok = 0;
                                    foreach ($DataProduk as $ReadDS) {
                                        // Panggil fungsi getStokProduk dari model MSudi untuk mendapatkan stok produk berdasarkan ProdukID
                                        $stokProduk = $this->MSudi->getStokProduk($ReadDS->ProdukID);
                                        // Tambahkan stok produk ke totalStok
                                        $totalStok += $stokProduk;
                                    }
                                } else {
                                    // Jika $DataProduk kosong, atur totalStok menjadi 0
                                    $totalStok = 0;
                                }
                                ?>
                                <?php echo $totalStok; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Kategori</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <p><?php echo $jumlahKategori; ?></p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bookmark fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="card border-left-danger shadow h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Grafik Penjualan</div>
                <div class="chart-container" style="position: relative; height:80vh; width:80vw;">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div> -->

    <!-- Tambahkan jQuery dan Bootstrap JS Library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Inisialisasi Slideshow -->
 <script>
  $(document).ready(function() {
    // Memulai slideshow
    $('.carousel').carousel();
  });
 
  
//   var ctx = document.getElementById('salesChart').getContext('2d');

// // Data penjualan per bulan (contoh data)
// var salesData = {
//     labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Agst','Sep', 'Okt', 'Nov', 'Des'],
//     datasets: [{
//         label: 'Persentase Penjualan',
//         backgroundColor: 'rgba(255, 99, 132, 0.2)',
//         borderColor: 'rgba(255, 99, 132, 1)',
//         borderWidth: 1,
//         data: [10, 20, 15, 30, 25, 35,], // Persentase penjualan per bulan
//     }]
// };

// // Inisialisasi grafik
// var salesChart = new Chart(ctx, {
//     type: 'bar',
//     data: salesData,
//     options: {
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero: true,
//                     callback: function(value) {
//                         return value + '%'; // Tampilkan persentase pada sumbu Y
//                     }
//                 },
//                 scaleLabel: {
//                     display: true,
//                     labelString: 'Persentase Penjualan'
//                 }
//             }],
//             xAxes: [{
//                 scaleLabel: {
//                     display: true,
//                     labelString: 'Bulan'
//                 }
//             }]
//         }
//     }
// });
</script> 


</body>

</html>
