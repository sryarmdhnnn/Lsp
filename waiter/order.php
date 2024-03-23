<?php
require 'functions.php';
require 'header.php';
$query = "SELECT pesanan.*, meja.nomermeja, menu.namamenu, pelanggan.namapelanggan, user.namauser FROM pesanan INNER JOIN meja ON meja.idmeja = pesanan.idmeja INNER JOIN menu ON menu.idmenu = pesanan.idmenu INNER JOIN pelanggan ON pelanggan.idpelanggan = pesanan.idpelanggan INNER JOIN user ON user.iduser = pesanan.iduser";
$data = ambildata($conn, $query);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Data Order</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="col-md-6">
                <a href="ordertambah.php" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a>
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Kode Invoice</th>
                        <th>Nomer Meja</th>
                        <th>Nama Menu</th>
                        <th>Nama Pelanggan</th>
                        <th>Jumlah</th>
                        <th>Petugas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $menu) : ?>
                        <tr>
                            <td><?= $menu['idpesanan'] ?></td>
                            <td><?= $menu['kode_invoice'] ?></td>
                            <td><?= $menu['nomermeja'] ?></td>
                            <td><?= $menu['namamenu'] ?></td>
                            <td><?= $menu['namapelanggan'] ?></td>
                            <td><?= $menu['jumlah'] ?></td>
                            <td><?= $menu['namauser'] ?></td>
                            <td align="center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="orderedit.php?id=<?= $menu['idpesanan']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="orderhapus.php?id=<?= $menu['idpesanan']; ?>" onclick="return confirm('Yakin hapus data ? ');" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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