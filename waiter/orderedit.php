<?php
require 'functions.php';
$idpesanan = $_GET['id'];
$queryedit = "SELECT * FROM pesanan WHERE idpesanan = '$idpesanan'";
$edit = ambilsatubaris($conn, $queryedit);

if (isset($_POST['btn-simpan'])) {
    $namamenu     = $_POST['namamenu'];
    $namapelanggan = $_POST['namapelanggan'];
    $jumlah     = $_POST['jumlah'];
    $namauser     = $_POST['namauser'];
    $query = "UPDATE pesanan SET namamenu = '$namamenu', namapelanggan = '$namapelanggan', jumlah = '$jumlah', namauser = '$namauser' WHERE idpesanan ='$idpesanan'";

    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil mengubah pelanggan';
        $type = 'success';
        header('location: order.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
    } else {
        echo "Gagal Tambah Data";
    }
}


require 'header.php';
?>
<div class="container">

    <div class="col-md-6 mt-2">
        <a href="barang.php" class="btn btn-secondary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
    </div>
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row  justify-content-center">
                <div class="col-lg-7 ">
                    <div class="p-5 ">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Edit Barang</h1>
                        </div>
                        <form class="user" method="post" action="">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Nama Barang</label>
                                    <input type="text" name="namamenu" class="form-control form-control-user" value="<?= $edit['namamenu'] ?>">
                                </div>
                                <div class=" col-sm-6">
                                    <label>Nama Pelanggan</label>
                                    <select name="namapelanggan" class="form-control">
                                        <?php foreach ($data as $order) : ?>
                                            <?php if ($data['idpelanggan'] == $edit['idpelanggan']) : ?>
                                                <option value="<?= htmlspecialchars($order['idpelanggan']); ?>" selected><?= htmlspecialchars($order['namapelanggan']); ?></option>
                                            <?php endif ?>
                                            <option value="<?= htmlspecialchars($order['idpelanggan']); ?>"><?= htmlspecialchars($order['namapelanggan']); ?></option>
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