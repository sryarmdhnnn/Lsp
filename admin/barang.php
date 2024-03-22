<?php
require 'functions.php';
require 'header.php';
$query = 'SELECT * FROM menu';
$data = ambildata($conn, $query);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Data Barang</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="col-md-6">
                <a href="barangtambah.php" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a>
            </div>
            <br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $barang) : ?>
                        <tr>
                            <td><?= $barang['idmenu'] ?></td>
                            <td><?= $barang['namamenu'] ?></td>
                            <td><?= $barang['harga'] ?></td>
                            <td align="center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="barangedit.php?id=<?= $barang['idmenu']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="baranghapus.php?id=<?= $barang['idmenu']; ?>" onclick="return confirm('Yakin hapus data ? ');" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require 'footer.php';
?>