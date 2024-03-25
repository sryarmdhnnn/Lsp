<?php
require 'functions.php';
require 'header.php';
$query = 'SELECT transaksi.*,meja.nomermeja, menu.namamenu, pelanggan.namapelanggan , pesanan.totalharga FROM transaksi INNER JOIN meja ON meja.idmeja = transaksi.mejaid INNER JOIN menu ON menu.idmenu = transaksi.menuid INNER JOIN pelanggan ON pelanggan.idpelanggan = transaksi.pelangganid INNER JOIN pesanan ON pesanan.transaksiid = transaksi.idtransaksi WHERE transaksi.idtransaksi = ' . $_GET['id'];
$data = ambilsatubaris($conn, $query);
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
                        <h3>Pesanan Atas Nama <?= $data['namapelanggan'] ?> Behasil Di Simpan</h3>
                        <strong>Kode Pesanan <?= $data['kodeinvoice'] ?></strong><br>
                        <strong>Total Pembayaran <?= $data['totalharga'] ?></strong><br><br>
                        <a href="transaksi.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali ke halaman</a>
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
