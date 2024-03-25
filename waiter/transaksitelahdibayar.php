<?php
$title = 'transaksi';
require 'functions.php';
$query = "SELECT transaksi.*,meja.nomermeja, pelanggan.namapelanggan , pesanan.totalharga, pesanan.totalbayar FROM transaksi INNER JOIN meja ON meja.idmeja = transaksi.mejaid INNER JOIN pelanggan ON pelanggan.idpelanggan = transaksi.pelangganid INNER JOIN pesanan ON pesanan.transaksiid = transaksi.idtransaksi ";
$data = ambilsatubaris($conn, $query);
require 'header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Transaksi</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-center" style="padding-left: 50px;padding-right: 50px;">
                        <div class="bg-success" style="font-size: 125px;border-radius: 20px">
                            <i class="fa fa-check fa-1x text-white"></i>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3>Pesanan Atas Nama <?= $data['namapelanggan'] ?> Berhasil Di Bayar</h3>
                        <strong>Kode Pesanan <?= $data['kodeinvoice'] ?></strong><br><br>
                        <strong>Total Pembayaran Rp.<?= $data['totalharga'] ?></strong><br>
                        <strong>Total Uang Bayar Rp.<?= $data['totalbayar'] ?></strong><br>
                        <strong>Kembalian Rp.<?= $data['totalbayar'] - $data['totalharga'] ?></strong><br><br>
                        <a href="transaksi.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali ke menu utama</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">

    </div>
</div>
<?php
require 'footer.php';
