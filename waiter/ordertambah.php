<?php
require 'functions.php';
$query = 'SELECT * FROM menu ';
$queryy = 'SELECT * FROM pelanggan ';
$queryyy = 'SELECT * FROM user ';
$data = ambildata($conn, $query);
$dataa = ambildata($conn, $queryy);
$dataaa = ambildata($conn, $queryyy);
if (isset($_POST['btn-simpan'])) {
    $nama     = $_POST['namamenu'];
    $namapelanggan = $_POST['namapelanggan'];
    $jumlah = $_POST['jumlah'];
    $namauser = $_POST['namauser'];
    $query = "INSERT INTO pesanan (namamenu,namapelanggan,jumlah,namauser) values ('$nama','$namapelanggan','$jumlah','$namauser)";

    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil menambahkan menu baru';
        $type = 'success';
        header('location: barang.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
    } else {
        echo "Gagal Tambah Data";
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