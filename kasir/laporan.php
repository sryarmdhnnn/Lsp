<?php
$title = 'laporan';
require 'functions.php';
require 'header.php';
$hari = ambilsatubaris($conn, "SELECT SUM(totalharga) AS total FROM pesanan INNER JOIN transaksi ON transaksi.idtransaksi = pesanan.transaksiid WHERE statusbayar = 'Terbayar' AND DAY(tglpembayaran) = DAY(NOW())");
$minggu = ambilsatubaris($conn, "SELECT SUM(totalharga) AS total FROM pesanan INNER JOIN transaksi ON transaksi.idtransaksi = pesanan.transaksiid WHERE statusbayar = 'Terbayar' AND WEEK(tglpembayaran) = WEEK(NOW())");
$bulan = ambilsatubaris($conn, "SELECT SUM(totalharga) AS total FROM pesanan INNER JOIN transaksi ON transaksi.idtransaksi = pesanan.transaksiid WHERE statusbayar = 'Terbayar' AND MONTH(tglpembayaran) = MONTH(NOW())");
$tahun = ambilsatubaris($conn, "SELECT SUM(totalharga) AS total FROM pesanan INNER JOIN transaksi ON transaksi.idtransaksi = pesanan.transaksiid WHERE statusbayar = 'Terbayar' AND YEAR(tglpembayaran) = YEAR(NOW())");


$penjualan = ambildata($conn, "SELECT SUM(pesanan.totalharga) AS total, COUNT(pesanan.menuid) as jumlahmenu, menu.namamenu, transaksi.tglpembayaran FROM pesanan
INNER JOIN transaksi ON transaksi.idtransaksi = pesanan.transaksiid
INNER JOIN menu ON menu.idmenu = pesanan.menuid
WHERE transaksi.statusbayar = 'Terbayar' GROUP BY pesanan.menuid");
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Laporan</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Penghasilan Minggu Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><span class="counter text-success"><?= htmlspecialchars($hari['total']); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Penghasilan Minggu Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><span class="counter text-success"><?= htmlspecialchars($minggu['total']); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Penghasilan Bulan Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><span class="counter text-primary"><?= htmlspecialchars($bulan['total']); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Penghasilan Tahun Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><span class="counter text-info"><?= htmlspecialchars($tahun['total']); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Laporan Penjualan Paket</h3>
                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th width="2%">No</th>
                                <th width="25%">Nama Menu</th>
                                <th width="25%">Jumlah Transaksi</th>
                                <th width="25%">Tanggal Transaksi</th>
                                <th width="23%">Total Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($penjualan as $transaksi) : ?>
                                <tr>
                                    <td align="center"><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($transaksi['namamenu']); ?></td>
                                    <td><?= htmlspecialchars($transaksi['jumlahmenu']); ?></td>
                                    <td><?= htmlspecialchars($transaksi['tglpembayaran']); ?></td>
                                    <td><?= htmlspecialchars($transaksi['total']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'footer.php';
?>