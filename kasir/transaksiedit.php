<?php
require 'functions.php';
$status = ['Baru', 'Proses', 'Selesai'];
$query = "SELECT transaksi.*,pesanan.*,meja.nomermeja, menu.namamenu, pelanggan.namapelanggan FROM transaksi INNER JOIN meja ON meja.idmeja = transaksi.mejaid INNER JOIN menu ON menu.idmenu = transaksi.menuid INNER JOIN pelanggan ON pelanggan.idpelanggan = transaksi.pelangganid INNER JOIN pesanan ON pesanan.transaksiid = transaksi.idtransaksi ";
$data = ambilsatubaris($conn, $query);
$menu = ambildata($conn, 'SELECT * FROM menu');

if (isset($_POST['btn-simpan'])) {
    $status     = $_POST['status'];
    $query = "UPDATE transaksi SET status = '$status' WHERE idtransaksi = " . $_GET['id'];
    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $menuid = $_POST['menuid'];
        $jumlah = $_POST['jumlah'];
        $hargamenu = ambilsatubaris($conn, 'SELECT harga FROM menu WHERE idmenu = ' . $menuid);
        $totalharga = $hargamenu['harga'] * $jumlah;
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil mengubah status transaksi';
        $type = 'success';
        header('location: transaksi.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
    } else {
        echo "Gagal Tambah Data";
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
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Nama Menu</label>
                        <select name="menuid" class="form-control form-control-user">
                            <?php foreach ($menu as $key) : ?>
                                <option value="<?= $key['idmenu'] ?>"><?= $key['namamenu'];  ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" name="jumlah" class="form-control" value="<?= $data['jumlah'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Total Harga</label>
                        <input readonly="" type="text" name="totalharga" class="form-control" value="<?= $data['totalharga'] ?>">
                    </div>
                    <?php if ($data['totalbayar'] > 0) : ?>
                        <div class="form-group">
                            <label>Total Bayar</label>
                            <input readonly="" type="text" name="totalbayar" class="form-control" value="<?= $data['totalbayar'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Di Bayar Pada Tanggal </label>
                            <input readonly="" type="text" name="tglpembayaran" class="form-control" value="<?= $data['tglpembayaran'] ?>">
                        </div>
                    <?php else : ?>
                        <div class="form-group">
                            <label>Total Bayar</label>
                            <input readonly="" type="text" name="totalbayar" class="form-control" value="Belum Melakukan Pembayaran">
                        </div>
                        <div class="form-group">
                            <label>Batas Waktu Pembayaran</label>
                            <input readonly="" type="text" name="bataswaktu" class="form-control" value="<?= $data['bataswaktu'] ?>">
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label>Status Transaksi</label>
                        <select name="status" class="form-control">
                            <?php foreach ($status as $key) : ?>
                                <?php if ($key == $data['status']) : ?>
                                    <option value="<?= $key ?>" selected><?= $key ?></option>
                                <?php endif ?>
                                <option value="<?= $key ?>"><?= $key ?></option>
                            <?php endforeach ?>
                        </select>
                        <small>Klik Tombol Ubah Untuk Menyimpan Perubahan Transaksi</small>
                    </div>
                    <div class="text-center">
                        <button type="reset" class="btn btn-dark"><i class="fas fa-fw fa-retweet"></i> Reset</button>
                        <button type="submit" name="btn-simpan" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require 'footer.php';
?>