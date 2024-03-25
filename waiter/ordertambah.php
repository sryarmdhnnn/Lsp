<?php
require 'functions.php';
$tglsekarang = Date('Y-m-d h:i:s');
$empatbelashari   = mktime(0, 0, 0, date("n"), date("j") + 7, date("Y"));
$bataswaktu  = date("Y-m-d h:i:s", $empatbelashari);
$invoice   = 'SRDREST' . Date('Ymdsi');
$mejaid = $_GET['id'];
$userid   = $_SESSION['iduser'];
$menuid = $_GET['id'];
$pelangganid = $_GET['id'];

$meja = ambilsatubaris($conn, 'SELECT nomermeja FROM meja WHERE idmeja = ' . $mejaid);
$menu = ambildata($conn, 'SELECT * FROM menu');
$pelanggan = ambilsatubaris($conn, 'SELECT namapelanggan FROM pelanggan WHERE idpelanggan = ' . $pelangganid);
if (isset($_POST['btn-simpan'])) {
    $kodeinvoice = $_POST['kodeinvoice'];
    $query = "INSERT INTO transaksi (mejaid,kodeinvoice,menuid,pelangganid,tgl,bataswaktu,status,statusbayar,userid) VALUES ('$mejaid','$kodeinvoice','$menuid','$pelangganid','$tglsekarang','$bataswaktu','Baru','Belum','$userid')";

    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $menuid = $_POST['menuid'];
        $jumlah = $_POST['jumlah'];
        $hargamenu = ambilsatubaris($conn, 'SELECT harga FROM menu WHERE idmenu = ' . $menuid);
        $totalharga = $hargamenu['harga'] * $jumlah;
        $kodeinvoice;
        $transaksi = ambilsatubaris($conn, "SELECT * FROM transaksi WHERE kodeinvoice = '" . $kodeinvoice . "'");
        $transaksiid = $transaksi['idtransaksi'];

        $sqlDetail = "INSERT INTO pesanan (transaksiid,menuid,jumlah,totalharga) VALUES ('$transaksiid','$menuid','$jumlah','$totalharga')";

        $executeDetail = bisa($conn, $sqlDetail);
        if ($executeDetail == 1) {
            header('location: transaksisukses.php?id=' . $transaksiid);
        } else {
            echo "Gagal Tambah Data";
        }
    }
}
require 'header.php';
?>
<div class="container">


    <div class="col-md-6 mt-2">
        <a href="transaksicaripelanggan.php" class="btn btn-secondary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
    </div>
    <br>
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row  justify-content-center">
                <div class="col-lg-7 ">
                    <div class="p-5 ">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Entri Order</h1>
                        </div>
                        <form class="user" method="post" action="">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Kode Pesanan</label>
                                    <input type="text" name="kodeinvoice" class="form-control form-control-user" readonly="" value="<?= $invoice ?>">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Nomer Meja</label>
                                    <input type="text" name="nomermeja" class="form-control form-control-user" readonly="" value="<?= $meja['nomermeja'] ?>" required>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Menu</label>
                                    <select name="menuid" class="form-control">
                                        <?php foreach ($menu as $key) : ?>
                                            <option value="<?= $key['idmenu'] ?>"><?= $key['namamenu'];  ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Nama Pelanggan</label>
                                    <input type="text" name="namapelanggan" class="form-control form-control-user" readonly="" value="<?= $pelanggan['namapelanggan'] ?>" required>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Jumlah</label>
                                    <input type="text" name="jumlah" class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="reset" class="btn btn-dark"><i class="fas fa-fw fa-retweet"></i> Reset</button>
                                <button type="submit" name="btn-simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
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