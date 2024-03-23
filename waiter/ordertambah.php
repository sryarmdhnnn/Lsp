<?php
require 'functions.php';
$tgl_sekarang = Date('Y-m-d h:i:s');
$invoice   = 'SRDRST' . Date('Ymdsi');
$idmeja = $_GET['idmeja'];
$idmenu = $_GET['idmenu'];
$idpelanggan   = $_GET['idpelanggan'];
$iduser = $_GET['iduser'];

$meja = ambilsatubaris($conn, 'SELECT nomermeja from meja WHERE idmeja = ' . $idmeja);
$menu = ambilsatubaris($conn, 'SELECT namamenu from menu WHERE idmenu = ' . $idmenu);
$pelanggan = ambilsatubaris($conn, 'SELECT namapelanggan from pelanggan WHERE idpelanggan = ' . $idpelanggan);
$user = ambildata($conn, 'SELECT * FROM user WHERE iduser = ' . $iduser);
if (isset($_POST['btn-simpan'])) {
    $kode_invoice = $_POST['kode_invoice'];

    $query = "INSERT INTO pesanan (idpesanan,kode_invoice,idmeja,idpelanggan,jumlah,iduser) VALUES ('$idpesanan','$kode_invoice','$idpelanggan','$jumlah','$iduser')";

    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $idpesanan = $_POST['idpesanan'];
        $jumlah = $_POST['jumlah'];
        $hargapesanan = ambilsatubaris($conn, 'SELECT harga from pesanan WHERE idpesanan = ' . $idpesanan);
        $harga = $hargapesanan['harga'] * $jumlah;
        $transaksi = ambilsatubaris($conn, "SELECT * FROM transaksi WHERE kode_invoice = '" . $kode_invoice . "'");
        $idtransaksi = $transaksi['idtransaksi'];

        $sqlDetail = "INSERT INTO transaksi (idtransaksi,idpesanan,total,bayar) VALUES ('$idtransaksi','$idpesanan','$total','$bayar')";

        $executeDetail = bisa($conn, $sqlDetail);
        if ($executeDetail == 1) {
            header('location: order.php?id=' . $idtransaksi);
        } else {
            echo "Gagal Tambah Data";
        }
    }
}
require 'header.php';
?>
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row  justify-content-center">
                <div class="col-lg-7 ">
                    <div class="p-5 ">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambah Barang</h1>
                        </div>
                        <form class="user" method="post" action="">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Nomer Meja</label>
                                    <select name="nomermeja" class="form-control">
                                        <?php foreach ($data as $menu) : ?>
                                            <option value="<?= $menu['nomermeja'] ?>"><?= htmlspecialchars($menu['nomermeja']); ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Nama Barang</label>
                                    <select name="namamenu" class="form-control">
                                        <?php foreach ($data as $menu) : ?>
                                            <option value="<?= $menu['namamenu'] ?>"><?= htmlspecialchars($menu['namamenu']); ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Nama Pelanggan</label>
                                    <select name="namapelanggan" class="form-control">
                                        <?php foreach ($dataa as $pelanggan) : ?>
                                            <option value="<?= $pelanggan['namapelanggan'] ?>"><?= htmlspecialchars($pelanggan['namapelanggan']); ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class=" col-sm-6">
                                    <label>Harga</label>
                                    <input type="text" name="harga" class="form-control form-control-user" placeholder="Harga">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Petugas</label>
                                    <select name="namauser" class="form-control">
                                        <?php foreach ($dataaa as $user) : ?>
                                            <option value="<?= $user['namauser'] ?>"><?= htmlspecialchars($user['namauser']); ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
                                <button type="submit" name="btn-simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
require 'footer.php';
?>