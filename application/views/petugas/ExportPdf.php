<!DOCTYPE html>
<html>
<head>
    <title>Laporan Detail Penjualan</title>
    <style>
        /* Tambahkan gaya CSS sesuai kebutuhan Anda */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Laporan Detail Penjualan</h2>
    <p>Periode: <?php echo $startDate; ?> sampai <?php echo $endDate; ?></p>
    <table>
        <thead>
            <tr>
                <th>Detail ID</th>
                <th>Tanggal Transaksi</th>
                <th>Nama Produk</th>
                <th>Jumlah Produk</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detailPenjualan as $detail) { ?>
                <tr>
                    <td><?php echo $detail->DetailID; ?></td>
                    <td><?php echo $detail->PenjualanID; ?></td>
                    <td><?php echo $detail->NmProduk; ?></td>
                    <td><?php echo $detail->JumlahProduk; ?></td>
                    <td><?php echo $detail->Subtotal; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
