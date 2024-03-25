<?php
require 'functions.php';
if (isset($_POST['btn-simpan'])) {
    $nomermeja     = $_POST['nomermeja'];
    $query = "INSERT INTO meja (nomermeja) values ('$nomermeja')";

    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil menambahkan meja baru';
        $type = 'success';
        header('location: meja.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
    } else {
        echo "Gagal Tambah Data";
    }
}
require 'header.php';
?>
<div class="container">
    <div class="col-md-6 mt-2">
        <a href="meja.php" class="btn btn-secondary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
    </div>
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
                            <div class="form-group row justify-content-center">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Nomer Meja</label>
                                    <input type="text" name="nomermeja" class="form-control form-control-user" placeholder="Nomer Meja">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="reset" class="btn btn-dark"><i class="fas fa-fw fa-retweet"></i> Reset</button>
                                <button type="submit" name="btn-simpan" class="btn btn-success"><i class="fas fa-fw fa-save"></i> Simpan</button>
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