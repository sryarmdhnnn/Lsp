<?php
require 'functions.php';
if (isset($_POST['btn-simpan'])) {
    $namapelanggan     = $_POST['namapelanggan'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $query = "INSERT INTO pelanggan (namapelanggan,jeniskelamin,nohp,alamat) values ('$namapelanggan','$jeniskelamin','$nohp','$alamat')";

    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil menambahkan menu baru';
        $type = 'success';
        header('location: pelanggan.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
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
                                    <label>Nama pelanggan</label>
                                    <input type="text" name="namapelanggan" class="form-control form-control-user" placeholder="Nama Pelanggan" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jeniskelamin" class="form-control">
                                        <option value="Laki-Laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>No HP</label>
                                    <input type="text" name="nohp" class="form-control form-control-user" placeholder="No HP" required>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control form-control-user" placeholder="Alamat" required>
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