<?php
$title = 'transaksi';
require 'functions.php';
$query = "SELECT transaksi.*,meja.nomermeja, pelanggan.namapelanggan , pesanan.totalharga FROM transaksi INNER JOIN meja ON meja.idmeja = transaksi.mejaid INNER JOIN pelanggan ON pelanggan.idpelanggan = transaksi.pelangganid INNER JOIN pesanan ON pesanan.transaksiid = transaksi.idtransaksi ";
$data = ambilsatubaris($conn, $query);
if (isset($_POST['btn-simpan'])) {
    $totalbayar = $_POST['totalbayar'];
    if ($totalbayar >= $data['totalharga']) {
        $query = "UPDATE transaksi SET statusbayar = 'Terbayar',tglpembayaran = '" . Date('Y-m-d h:i:s') . "' WHERE idtransaksi = " . $_GET['id'];
        $query2 = "UPDATE pesanan SET totalbayar = '$totalbayar' WHERE transaksiid = " . $_GET['id'];
        $execute = bisa($conn, $query);
        $execute2 = bisa($conn, $query2);
        if ($execute == 1 && $execute2 == 1) {
            echo "<script>alert('OK');</script>";
            header('location:transaksitelahdibayar.php?id=' . $_GET['id']);
        } else {
            echo "Gagal Tambah Data";
        }
    } else {
        $message = "Jumlah Uang Pembayaran Kurang";
        header('location:transaksibayar.php?id=' . $_GET['id'] . '&msg=' . $message);
    }
}
require 'header.php';
?>

<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Edit Data Transaksi</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="transaksi.php" class="btn btn-secondary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <form method="post" action="">
                    <div class="form-group">
                        <label>Kode Pesanan</label>
                        <input type="text" name="kodeinvoice" class="form-control" readonly="" value="<?= $data['kodeinvoice'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Nomer Meja</label>
                        <input type="text" name="nomermeja" class="form-control" readonly="" value="<?= $data['nomermeja'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Pelanggan</label>
                        <input type="text" name="namapelanggan" class="form-control" readonly="" value="<?= $data['namapelanggan'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Total Yang Harus Di Bayar</label>
                        <input type="text" name="totalharga" class="form-control" readonly="" value="<?= $data['totalharga'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Masukan Jumlah Pembayaran</label>
                        <input type="number" name="totalbayar" id="totalbayar" class="form-control">
                        <?php if (isset($_GET['msg'])) : ?>
                            <small class="text-danger"><?= $_GET['msg'] ?></small>
                        <?php endif ?>
                    </div>
                    <div class="text-right">
                        <button type="submit" name="btn-simpan" id="btn-simpan" class="btn btn-primary"><i class="fa fa-money"></i> Bayar</utton>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require 'footer.php';
?>